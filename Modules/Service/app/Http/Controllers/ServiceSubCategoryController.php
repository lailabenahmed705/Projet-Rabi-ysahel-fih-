<?php

namespace Modules\Service\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Service\app\Models\ServiceSubCategory;
use Modules\Service\app\Models\ServiceCategory;

class ServiceSubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = ServiceSubCategory::with('category')->get();
        return view('service::service_subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('service::service_subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
        ]);

        ServiceSubCategory::create($request->all());

        return redirect()->route('service-subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    public function edit(ServiceSubCategory $serviceSubCategory)
    {
        $categories = ServiceCategory::all();
        return view('service::service_subcategories.edit', compact('serviceSubCategory', 'categories'));
    }

    public function update(Request $request, ServiceSubCategory $serviceSubCategory)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => 'required|string|max:255',
        ]);

        $serviceSubCategory->update($request->all());

        return redirect()->route('service-subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(ServiceSubCategory $serviceSubCategory)
    {
        $serviceSubCategory->delete();
        return redirect()->route('service-subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}