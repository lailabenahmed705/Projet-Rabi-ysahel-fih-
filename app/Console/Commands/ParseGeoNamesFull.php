<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;



class ParseGeoNamesFull extends Command
{
    protected $signature = 'geonames:parse-full {filename=TN.txt}';
    protected $description = 'Parse a GeoNames TXT file and generate full location hierarchy JSON';


   


    public function handle()
    {
        

        $filename = $this->argument('filename');
        $filePath = storage_path('app/geonames/' . $filename);
        $outputFile = storage_path('app/geonames/' . pathinfo($filename, PATHINFO_FILENAME) . '_structure.json');

        if (!file_exists($filePath)) {
            $this->error("❌ Fichier introuvable : $filePath");
            return;
        }

        $lines = file($filePath);
        $structure = [];

        foreach ($lines as $line) {
            $cols = explode("\t", $line);
            if (count($cols) < 12) continue;

            [$country, $postal, $place, $admin1, $code1, $admin2, $code2, $admin3, $code3, $lat, $lng, $accuracy] = $cols;

            $country = trim($country);
            $admin1 = trim($admin1);
            $admin2 = trim($admin2);
            $admin3 = trim($admin3) ?: trim($place);
            $postal = trim($postal);

            $structure[$country][$admin1][$admin2][$admin3] = [
                'postal_code' => $postal,
                'latitude' => trim($lat),
                'longitude' => trim($lng),
                'accuracy' => trim($accuracy)
            ];
        }

        file_put_contents($outputFile, json_encode($structure, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        $this->info("✅ Fichier JSON généré : $outputFile");
    }
}
