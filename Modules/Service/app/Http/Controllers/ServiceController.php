<?php

namespace Modules\Service\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Modules\Service\app\Models\Service;
use Modules\Service\app\Models\ServiceCategory;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('service::service\service', compact('services'));
    }

    public function createForm()
    {
        $serviceCategories = ServiceCategory::all();
        return view('service::service.createService', compact('serviceCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('services')->where('service_category_id', $request->input('service_category_id')),
            ],
        ]);

        Service::create([
            'service_category_id' => $request->input('service_category_id'),
            'name' => $request->input('name'),
        ]);

        return redirect()->route('service.index')->with('success', 'Service added successfully.');
    }

    public function edit($id)
    {
        // Logique pour récupérer les données de la sous-catégorie de service à éditer
        $service = Service::findOrFail($id);

        // Passez les données à la vue d'édition
        return view('service.edit', compact('service'));
    }


    public function update(Request $request, $id)
    {
        // Logique de mise à jour ici
        $request->validate([
          'name' => 'required|string|max:255',
          // Autres règles de validation si nécessaire
      ]);

      $services = Service::find($id);

      if (!$services) {
          return redirect()->route('service.index')->with('error', 'Service not found.');
      }

      // Effectuez la mise à jour en fonction des données du formulaire
      $services->update([
          'name' => $request->input('name'),
          // Autres champs à mettre à jour
      ]);

        return redirect()->route('service.index')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('service.index')->with('success', 'Service deleted successfully.');
    }
}
