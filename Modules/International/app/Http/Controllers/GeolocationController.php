<?php

namespace Modules\International\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View; 
use Modules\International\app\Models\Geolocation;
use Modules\International\app\Http\Requests\GeolocationRequest;



class GeolocationController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index(Request $request): View
  {
    $geolocations = Geolocation::paginate();

    return view('international::geolocation.index', compact('geolocations'))->with(
      'i',
      ($request->input('page', 1) - 1) * $geolocations->perPage()
    );
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create(): View
  {
    $geolocation = new Geolocation();

    return view('international::geolocation.create', compact('geolocation'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(GeolocationRequest $request): RedirectResponse
  {
    Geolocation::create($request->validated());

    return Redirect::route('geolocations.index')->with('success', 'Geolocation created successfully.');
  }

  /**
   * Display the specified resource.
   */
  public function show($id): View
  {
      $geolocation = Geolocation::find($id);
  
      if (!$geolocation) {
          return abort(404, "Geolocation not found");
      }
  
      return view('international::geolocation.show', compact('geolocation'));
  }
  

  /**
   * Show the form for editing the specified resource.
   */
  public function edit($id): View
  {
    $geolocation = Geolocation::find($id);

    return view('international::geolocation.edit', compact('geolocation'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(GeolocationRequest $request, Geolocation $geolocation): RedirectResponse
  {
    $geolocation->update($request->validated());

    return Redirect::route('geolocations.index')->with('success', 'Geolocation updated successfully');
  }

  public function destroy($id): RedirectResponse
  {
    Geolocation::find($id)->delete();

    return Redirect::route('geolocations.index')->with('success', 'Geolocation deleted successfully');
  }
}
