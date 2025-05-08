<?php

namespace Modules\International\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\International\app\Models\Country;
use Modules\International\app\Models\City;
use Modules\International\app\Models\State;
use Modules\International\app\Models\Currency;
use Modules\International\app\Models\Dependency;

class LocationController extends Controller
{
  public function index()
  {
    $countries = Country::all();
    return view('international::locations.countries.index', compact('countries'));
  }

  public function editCountry(Country $country)
  {
    $currencies = Currency::all();
    return view('international::locations.countries.edit', compact('country', 'currencies'));
  }

  public function createCountry()
  {
    $currencies = Currency::all();
    return view('international::locations.countries.create', compact('currencies'));
  }

  public function storeCountry(Request $request)
{
    $request->validate([
        'name' => 'required|string|unique:countries,name',
        'iso3' => 'required|string|unique:countries,iso3',
        'numeric_code' => 'required|string|unique:countries,numeric_code',
        'phone_code' => 'required|string|unique:countries,phone_code',
        'currency_name' => 'required|string',
        'region' => 'required|string',
        'status' => 'required|in:active,inactive',
    ], [
        'name.unique' => 'This country name already exists.',
        'iso3.unique' => 'This ISO3 code already exists.',
        'numeric_code.unique' => 'This numeric code already exists.',
        'phone_code.unique' => 'This phone code already exists.',
    ]);

    Country::create($request->all());

    return redirect()
      ->route('locations.countries.index')
      ->with('success', 'Country created successfully.');
}
public function destroyCountry(Country $country)
{
    $country->delete();

    return redirect()
        ->route('locations.countries.index')
        ->with('success', 'Country deleted successfully.');
}



  public function updateCountry(Request $request, Country $country)
  {
    $request->validate([
      'status' => 'required|in:active,inactive',
    ]);

    $country->update(['status' => $request->status]);

    return redirect()
      ->route('locations.countries.index')
      ->with('success', 'Country status updated successfully');
  }

  public function showStates()
  {
    $states = State::all();
    return view('international::locations.states.index', compact('states'));
  }

  public function createState()
  {
    $countries = Country::all();
    return view('international::locations.states.create', compact('countries'));
  }

  public function storeState(Request $request)
  {
      $request->validate([
          'name' => 'required|string|unique:states,name',
          'iso_code' => 'required|string|unique:states,iso_code',
          'country_id' => 'required|exists:countries,id',
          'status' => 'required|in:active,inactive',
      ], [
          'name.unique' => 'This state name already exists.',
          'iso_code.unique' => 'This ISO code already exists.',
      ]);
  
      State::create($request->all());
  
      return redirect()
          ->route('locations.states.index')
          ->with('success', 'State created successfully.');
  }
  
  public function editState(State $state)
  {
    $countries = Country::all();
    return view('international::locations.states.edit', compact('state', 'countries'));
  }
  public function updateState(Request $request, State $state)
  {
    $request->validate([
      'name' => 'required|string',
      'iso_code' => 'required|string',
      'country_id' => 'required|exists:countries,id',
      'status' => 'required|in:active,inactive',
    ]);

    $state->update([
      'name' => $request->name,
      'iso_code' => $request->iso_code,
      'country_id' => $request->country_id,
      'status' => $request->status,
    ]);

    return redirect()
      ->route('locations.states.index')
      ->with('success', 'State updated successfully.');
  }

  public function destroy($id)
{
    $state = State::findOrFail($id);
    $state->delete();

    return redirect()
        ->route('locations.states.index') // adapte ce nom selon ta route
        ->with('success', 'State deleted successfully.');
}

  public function showCities()
  {
    $cities = City::all();
    return view('international::locations.cities.index', compact('cities'));
  }

  public function createCity()
  {
    $states = State::all();
    return view('international::locations.cities.create', compact('states'));
  }

  public function storeCity(Request $request)
  {
      $request->validate([
          'name' => 'required|string|unique:cities,name',
          'postal_code' => 'required|string|unique:cities,postal_code',
          'state_id' => 'required|exists:states,id',
          'status' => 'required|in:active,inactive',
      ], [
          'name.unique' => 'This city name already exists.',
          'postal_code.unique' => 'This postal code already exists.',
      ]);
  
      City::create([
          'name' => $request->name,
          'postal_code' => $request->postal_code,
          'state_id' => $request->state_id,
          'status' => $request->status ?? 'inactive',
      ]);
  
      return redirect()
          ->route('locations.cities.index')
          ->with('success', 'City created successfully.');
  }
  
  public function editCity(City $city)
  {
    $states = State::all(); // Ajoute cette ligne pour récupérer les États
    return view('international::locations.cities.edit', compact('city', 'states'));
  }

  public function updateCity(Request $request, City $city)
  {
    $request->validate([
      'status' => 'required|in:active,inactive',
    ]);

    $city->update(['status' => $request->status]);

    return redirect()
      ->route('locations.cities.index')
      ->with('success', 'City status updated successfully');
  }

  public function destroyCity(City $city)
  {
    $city->delete();

    return redirect()
      ->route('locations.cities.index')
      ->with('success', 'La ville a été supprimée avec succès.');
  }
  public function editDependency(dependency $dependency)
  {
      return view('international::dependencies.dependencies.edit', compact('dependency'));
  }

  public function updateDependency(Request $request, Dependency $dependency)
  {
      $dependency->update([
          'status' => $request->has('status') ? 'active' : 'inactive',
      ]);

      return redirect()->route('locations.dependencies.index')->with('success', 'dependency status updated successfully');
  }
  public function showDependencies()
  {
      // Logique pour afficher la liste des dépendances
      $dependencies = Dependency::all(); // Assurez-vous que votre modèle Dependency est correctement importé
      return view('international::locations.dependencies.index', compact('dependencies'));
  }
  public function destroyDependency(Dependency $dependency)
  {
      $dependency->delete();

      return redirect()->route('locations.dependencies.index')->with('success', 'La dépendance a été supprimée avec succès.');
  }

}
