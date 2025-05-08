<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\International\App\Models\Country;
use Modules\International\App\Models\City;
use Modules\International\App\Models\State;
use Modules\Service\App\Models\ServiceCategory;
use Modules\Users\App\Models\MedicalType;

class AutocompleteController extends Controller
{
    public function index()
    {
        return view('autocomplete.search');
    }

    public function fetch(Request $request)
    {
        $data = Country::where('name', 'LIKE', '%' . $request->get('query') . '%')->pluck('name');
        return response()->json($data);
    }

    public function fetchCities(Request $request)
    {
        $data = City::where('name', 'LIKE', '%' . $request->get('query') . '%')->pluck('name');
        return response()->json($data);
    }

    public function fetchStates(Request $request)
    {
        $data = State::where('name', 'LIKE', '%' . $request->get('query') . '%')->pluck('name');
        return response()->json($data);
    }

    public function fetchDependencies(Request $request)
    {
        $stateId = $request->get('state_id');
        $cities = City::where('state_id', $stateId)->pluck('name');
        return response()->json($cities);
    }

    public function fetchCategories(Request $request)
    {
        $data = ServiceCategory::where('name', 'LIKE', '%' . $request->get('query') . '%')->pluck('name');
        return response()->json($data);
    }

    public function fetchMedicalTypes(Request $request)
    {
        $data = MedicalType::where('name', 'LIKE', '%' . $request->get('query') . '%')->pluck('name');
        return response()->json($data);
    }
}
