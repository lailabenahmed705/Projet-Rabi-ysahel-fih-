<?php

namespace Modules\Pathologies\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pathologies\App\Models\Pathology;

class PathologyTeamController extends Controller
{
    public function index()
    {
        $pathologies = Pathology::all();
        return view('pathologies::pathologies.index', compact('pathologies'));
    }

    public function createForm()
    {
        return view('pathologies::pathologies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pathologies,name',
            'description' => 'nullable|string',
        ]);

        Pathology::create($request->only(['name', 'description']));

        return redirect()->route('pathology-team.pathology-team')->with('success', 'Pathology created successfully.');
    }

    public function show($id)
    {
        $pathology = Pathology::findOrFail($id);
        return view('pathologies::pathologies.show', compact('pathology'));
    }

    public function edit($id)
    {
        $pathology = Pathology::findOrFail($id);
        return view('pathologies::pathologies.edit', compact('pathology'));
    }

    public function update(Request $request, $id)
    {
        $pathology = Pathology::findOrFail($id);
        $request->validate([
            'name' => 'required|unique:pathologies,name,' . $id,
            'description' => 'nullable|string',
        ]);

        $pathology->update($request->only(['name', 'description']));

        return redirect()->route('pathology-team.pathology-team')->with('success', 'Pathology updated successfully.');
    }

    public function destroy($id)
    {
        Pathology::destroy($id);
        return redirect()->route('pathology-team.pathology-team')->with('success', 'Pathology deleted.');
    }
}