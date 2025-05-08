<?php

namespace Modules\Subscription\app\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\app\Models\Feature; 

class FeatureController extends Controller
{
    /**
     * Display a listing of the features.
     *@param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
   
    
    
    public function index()
    {
        $features = Feature::all();
        return view('subscription::features.index', compact('features'));
    }

    /**
     * Show the form for creating a new feature.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('subscription::features.create');
    }

    /**
     * Store a newly created feature in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'consumable' => 'required|boolean',
            'periodicity' => 'nullable|integer',
            'periodicity_type' => 'nullable|string',
            'quota' => 'required|boolean',
            'postpaid' => 'required|boolean',
        ]);

        Feature::create($request->all());

        return redirect()->route('features.index')->with('success', 'Feature added successfully.');
    }
    
   
}
