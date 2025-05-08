<?php

namespace Modules\Appointments\app\Http\Controllers;
use Illuminate\Routing\Controller;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class SMSController extends Controller
{
    const SERVER = "http://smsmee.atwebpages.com";
    const API_KEY = "0d98944d5775926ff4db9a075606d59d2f8955f0";

    public static function sendSingleMessage($number, $message, $device = 0, $schedule = null, $isMMS = false, $attachments = null, $prioritize = false)
    {
        $url = self::SERVER . "/services/send.php";
        $postData = array(
            'number' => $number,
            'message' => $message,
            'schedule' => $schedule,
            'key' => self::API_KEY,
            'devices' => $device,
            'type' => $isMMS ? "mms" : "sms",
            'attachments' => $attachments,
            'prioritize' => $prioritize ? 1 : 0
        );

        Log::info('Sending SMS with data: ' . json_encode($postData));

        try {
            $response = self::sendRequest($url, $postData);
            Log::info('SMS Response: ' . json_encode($response));
            return $response["messages"][0];
        } catch (Exception $e) {
            Log::error('SMS Sending Error: ' . $e->getMessage());
            throw $e;
        }
    }

    private static function sendRequest($url, $postData)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if (curl_errno($ch)) {
            Log::error('cURL Error: ' . curl_error($ch));
            throw new Exception(curl_error($ch));
        }
        curl_close($ch);

        Log::info('HTTP Code: ' . $httpCode . ' Response: ' . $response);

        if ($httpCode == 200) {
            $json = json_decode($response, true);
            if ($json == false) {
                if (empty($response)) {
                    Log::error('Missing data in request. Response: ' . $response);
                    throw new Exception("Missing data in request. Please provide all the required information to send messages.");
                } else {
                    Log::error('Invalid response: ' . $response);
                    throw new Exception($response);
                }
            } else {
                if ($json["success"]) {
                    return $json["data"];
                } else {
                    Log::error('SMS API Error: ' . $json["error"]["message"]);
                    throw new Exception($json["error"]["message"]);
                }
            }
        } else {
            Log::error('HTTP Error Code : ' . $httpCode);
            throw new Exception("HTTP Error Code : {$httpCode}");
        }
    }
}
