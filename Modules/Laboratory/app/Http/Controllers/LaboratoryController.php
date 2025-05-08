<?php

namespace Modules\Laboratory\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Laboratory\App\Models\Laboratory;
use Modules\International\App\Models\City;
use Modules\International\App\Models\Country;

class LaboratoryController extends Controller
{
    public function index()
    {
        $laboratories = Laboratory::with(['address.country', 'address.city'])->get();

        return view('laboratory::index', compact('laboratories'));
    }

    public function createForm()
    {
        $countries = Country::all();
        $cities = City::all();
        //$states = State::all();

        return view('laboratory::createForm', compact('cities', 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        $laboratory = Laboratory::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        
        $laboratory->address()->create([
            'address' => $request->address,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
        ]);
        

        return redirect()->route('laboratory.index')->with('success', 'Laboratory created successfully!');
    }

    public function edit($id)
    {
        $laboratory = Laboratory::findOrFail($id);
        //$cities = City::all();
        $countries = Country::pluck('name', 'id');
       // $states = State::pluck('name', 'id');
        $cities = City::pluck('name', 'id');
        return view('laboratory::edit', compact('laboratory', 'countries', 'cities'));

    }

    public function update(Request $request, $id)
    {
        $laboratory = Laboratory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
        ]);

        $laboratory->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        
        // ✅ Update ou create address morphée
        $laboratory->address()->updateOrCreate(
            [], // ← condition vide = sur morphOne
            [
                'address' => $request->address,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
            ]
        );
        

        return redirect()->route('laboratory.index')->with('success', 'Laboratory updated successfully!');
    }

    public function destroy($id)
    {
        Laboratory::destroy($id);
        return redirect()->route('laboratory.index')->with('success', 'Laboratory deleted successfully!');
    }
}
