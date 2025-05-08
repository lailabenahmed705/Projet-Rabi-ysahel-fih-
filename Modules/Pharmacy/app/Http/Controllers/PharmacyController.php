<?php
// Modules/Pharmacy/App/Http/Controllers/PharmacyController.php

namespace Modules\Pharmacy\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Pharmacy\App\Models\Pharmacy;
use Modules\International\App\Models\City;
use Modules\International\App\Models\State;
use Modules\International\App\Models\Country;

class PharmacyController extends Controller
{
    public function index()
    {
        $pharmacies = Pharmacy::with('city', 'state', 'country')->get();
        return view('pharmacy::index', compact('pharmacies'));
    }

    public function createForm()
    {
        $countries = Country::pluck('name', 'id');
        $states = State::pluck('name', 'id');
        $cities = City::all();
        return view('pharmacy::create', compact('countries', 'states', 'cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
        ]);

        Pharmacy::create($request->all());

        return redirect()->route('pharmacy.pharmacy')->with('success', 'Pharmacy added successfully.');
    }

    public function edit($id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $countries = Country::pluck('name', 'id');
        $states = State::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        return view('pharmacy::edit', compact('pharmacy', 'countries', 'states', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $pharmacy = Pharmacy::findOrFail($id);
        $pharmacy->update($request->all());
        return redirect()->route('pharmacy.pharmacy')->with('success', 'Pharmacy updated.');
    }

    public function destroy($id)
    {
        Pharmacy::destroy($id);
        return redirect()->route('pharmacy.pharmacy')->with('success', 'Pharmacy deleted.');
    }
}
