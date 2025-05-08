<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Users\App\Models\User;
use Modules\Permission\App\Models\Role;
use Modules\Users\App\Models\MedicalType;
use Modules\International\App\Models\Address;
use Modules\Users\App\Models\MedicalService;
use Modules\Users\App\Models\Company;
use Modules\Users\App\Models\MedicalTeam;
use Modules\International\App\Models\Country;
use Modules\International\App\Models\State;
use Modules\International\App\Models\City;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\VerifyMail;

class InscriptionController extends Controller
{
    public function afficherFormulaire()
    {
        $companyTypes = Company::select('company_type')->distinct()->get();
        $countries = Country::all();
        return view('auth.Inscr', compact('countries', 'companyTypes'));
    }

    public function getStateList(Request $request)
    {
        $states = State::where('country_id', $request->country_id)->pluck('name', 'id');
        return response()->json($states);
    }

    public function getDependencyList(Request $request)
    {
        $dependencies = Dependency::where('state_id', $request->state_id)->pluck('name', 'id');
        return response()->json($dependencies);
    }

    public function inscription(Request $request)
    {
        try {
            // Form data validation
            $validatedData = $request->validate([
                'email' => 'required|string|email|max:255|unique:users',
                'Phone' => 'required|string|max:255|unique:users',
                'address_complete' => 'required|string|max:255',
                'gender' => 'required|string|in:male,female,other',
                'dob' => 'required|date',
                'FirstName' => 'required|string|max:255',
                'LastName' => 'required|string|max:255',
                'country_id' => 'required|exists:countries,id',
                'state_id' => 'required|exists:states,id',
                'dependency_id' => 'required|exists:dependencies,id',
                'city_id' => 'required|exists:cities,id',
                'password' => 'required|string|min:8',
                'language' => 'required|in:en,fr',
                'start_as' => 'required|string|in:medicalteam,company',
                'medical_type_id' => 'required_if:start_as,medicalteam|exists:medical_types,id',
                'company_type' => 'required_if:start_as,company|string',
                'establishment' => 'required_if:start_as,company|string|max:255',
                'responsible' => 'required_if:start_as,company|string|max:255',
            ]);

            // Determine role based on start_as
            $role = null;
            if ($request->start_as === 'medicalteam') {
                $medicalTypeId = $request->input('medical_type_id');
                $medicalType = MedicalType::findOrFail($medicalTypeId);
                $role = Role::where('name', $medicalType->name)->first();
                if (!$role) {
                    return view('error', ['msg' => 'Role not found for medical type.']);
                }
            } elseif ($request->start_as === 'company') {
                $companyType = $request->input('company_type');
                $role = Role::where('name', $companyType)->first();
                if (!$role) {
                    return view('error', ['msg' => 'Role not found for company type.']);
                }
            }

            if ($role) {
                // Create user without role_id first
                $user = User::create([
                    'name' => $validatedData['FirstName'] . ' ' . $validatedData['LastName'],
                    'email' => $validatedData['email'],
                    'Phone' => $validatedData['Phone'],
                    'password' => Hash::make($validatedData['password']),
                    'dob' => $validatedData['dob'],
                    'gender' => $validatedData['gender'],
                    // Generate verification code
                ]);

                // Assign role_id after creation and save again
                $user->role_id = $role->id;
                $user->verification_code = Str::random(6);
                $user->save();

                // Send verification email
                $mailData = [
                    'verification_code' => $user->verification_code
                ];
                Mail::to($user->email)->send(new VerifyMail($mailData));

                // Create role-specific data
                if ($request->start_as === 'medicalteam') {
                    $medicalAddress = MedicalAddress::create([
                        'address_complete' => $request->address_complete,
                        'dependency_id' => $request->dependency_id,
                        'currency_id' => 1, // Assuming a default currency id
                        'state_id' => $request->state_id,
                        'country_id' => $request->country_id,
                        'city_id' => $request->city_id,
                    ]);

                    $medicalService = MedicalService::create([
                        'language' => $request->language,
                        'experience' => 0, // Default experience
                        'appointment_fees' => 0.00, // Default fees
                    ]);

                    MedicalTeam::create([
                        'user_id' => $user->id,
                        'medical_type_id' => $request->medical_type_id,
                        'medical_address_id' => $medicalAddress->id,
                        'medical_service_id' => $medicalService->id,
                    ]);
                } elseif ($request->start_as === 'company') {
                  $companiesAddress = CompanyAddress::create([
                    'address_complete' => $request->address_complete,
                    'dependency_id' => $request->dependency_id,
                    'currency_id' => 1, // Assuming a default currency id
                    'state_id' => $request->state_id,
                    'country_id' => $request->country_id,
                    'city_id' => $request->city_id,
                ]);

                    Company::create([
                        'company_name' => $request->establishment,
                        'company_type' => $request->company_type,
                        'user_id' => $user->id,
                        'email' => $request->email,
                        'manager' => $request->responsible,
                        'address_id' => $companiesAddress->id,
                    ]);
                }

                return view('email')->with('message' ,'Verification email sent.');

        }




        }catch (\Exception $e) {
          return response()->json(['error' => 'Role determination failed.'], 400);
    }

} }
