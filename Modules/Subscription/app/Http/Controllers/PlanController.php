<?php

namespace Modules\Subscription\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Subscription\App\Models\Plan;
use Modules\Subscription\App\Models\Feature;
use Modules\Subscription\App\Services\PlanService;
use Modules\Permission\App\Models\Role;
use Modules\International\App\Models\Tax;

class PlanController extends Controller
{
    protected $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index()
    {
        $plans = Plan::with(['features', 'role'])->get();
        return view('subscription::plans.index', compact('plans'));
    }

    public function create()
    {
        $features = Feature::all();
        $roles = Role::all();
        $taxes = Tax::all();

        return view('subscription::plans.create', compact('features', 'roles', 'taxes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'grace_days' => 'required|integer',
            'price_HT' => 'required|numeric',
            'price' => 'required|numeric',
            'periodicity' => 'required',
            'assigned_role' => 'required|exists:roles,id',
            'features' => 'array',
            'feature_values' => 'array',
            'currency' => 'required|string|max:3',
            'status' => 'nullable|boolean',
        ]);

        $this->planService->create($validated);

        return redirect()->route('plans.index')->with('success', 'Plan ajouté avec succès.');
    }

    public function edit($id)
    {
        $plan = Plan::with('features')->findOrFail($id);
        $features = Feature::all();
        $roles = Role::all();
        $taxes = Tax::all();
        $featureValues = $plan->features->pluck('pivot.charges', 'id')->toArray();

        return view('subscription::plans.edit', compact('plan', 'features', 'roles', 'taxes', 'featureValues'));
    }

    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'grace_days' => 'required|integer',
            'price_HT' => 'required|numeric',
            'price' => 'required|numeric',
            'periodicity' => 'required',
            'assigned_role' => 'required|exists:roles,id',
            'features' => 'array',
            'feature_values' => 'array',
            'currency' => 'required|string|max:3',
            'status' => 'nullable|boolean',
        ]);

        $this->planService->update($plan, $validated);

        return redirect()->route('plans.index')->with('success', 'Plan mis à jour avec succès.');
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return redirect()->route('plans.index')->with('success', 'Plan supprimé avec succès.');
    }

    public function show($id)
    {
        $plan = Plan::with(['features', 'role'])->findOrFail($id);
        return view('subscription::plans.show', compact('plan'));
    }
}
