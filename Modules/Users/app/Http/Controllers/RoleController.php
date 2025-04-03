<?php

namespace Modules\Users\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Modules\Users\App\Models\ProfileRole;
use Modules\Service\App\Models\MedicalType;
use Modules\Service\App\Models\ServiceCategory;
use Modules\Users\App\Models\Company;

class RoleController extends Controller
{
    public function index()
    {
        // Get all roles using Spatie's Role model
        $roles = Role::all();
        return view('users::roles.index', compact('roles'));
    }

    public function create()
    {
        // Get distinct profile roles for creating new role
        $profileroles = ProfileRole::select('profile_name')->distinct()->get();
        return view('users::roles.create', compact('profileroles'));
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'guard_name' => 'required|string|max:255',
            'profile_name' => 'required|string|max:255',
            'permissions' => 'required|array',  // Permissions for the role
        ]);

        DB::beginTransaction();

        try {
            // Create the role using Spatie's Role model
            $role = Role::create([
                'name' => $request->name,
                'guard_name' => $request->guard_name,
                'profile_name' => $request->profile_name,
            ]);

            // Assign permissions to the role
            $role->givePermissionTo($request->permissions);

            DB::commit();
            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('roles.index')->with('error', 'Error creating role.');
        }
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $profileroles = ProfileRole::distinct()->get(['profile_name']);
        $permissions = Permission::all(); // Fetch all permissions for the form
        return view('users::roles.edit', compact('role', 'profileroles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'guard_name' => 'required|string|max:255',
            'profile_name' => 'required|string|exists:profile_role,profile_name',
            'permissions' => 'required|array',  // Permissions for the role
        ]);

        // Find the role by ID
        $role = Role::findOrFail($id);

        // Update the role with the new data
        $role->name = $request->input('name');
        $role->guard_name = $request->input('guard_name');
        $role->profile_name = $request->input('profile_name');
        $role->save();

        // Sync the permissions to ensure they are updated
        $role->syncPermissions($request->permissions);

        // Redirect back to the roles index with a success message
        return redirect()->route('roles.index')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        // Find the role by ID
        $role = Role::findOrFail($id);

        // Check the profile name and delete from the respective table
        if ($role->profile_name === 'medical type') {
            $type = MedicalType::where('name', $role->name);
            $type->delete();
            $this->updateVerticalMenuJson();
        } elseif ($role->profile_name === 'company type') {
            $comp = Company::where('company_type', $role->name);
            $comp->delete();
        }

        // Delete the role and its permissions
        $role->delete();

        // Redirect back to the roles index with a success message
        return redirect()->route('roles.index')->with('success', 'Role and associated records deleted successfully.');
    }

    private function updateVerticalMenuJson()
    {
        $menuPath = base_path('resources/menu/verticalMenu.json');

        $menuContents = File::get($menuPath);
        $menuData = json_decode($menuContents, true);

        $medicalTypes = MedicalType::all();

        // Create an array for dynamic medical types
        $dynamicMedicalTypes = [];

        // Loop through all medical types to add them to the dynamic array
        foreach ($medicalTypes as $medicalType) {
            $dynamicMedicalTypes[] = [
                'url' => "/medical-team/show/{$medicalType->slug}",
                'name' => $medicalType->name,
                'slug' => "medical-team-{$medicalType->slug}",
            ];
        }

        // Find the index of the "Medical Types" button in the menu
        $medicalTypesIndex = array_search('Medical Types', array_column($menuData['menu'], 'name'));

        if ($medicalTypesIndex !== false) {
            // If "Medical Types" exists, update its submenu
            $menuData['menu'][$medicalTypesIndex]['submenu'] = $dynamicMedicalTypes;
        } else {
            // If "Medical Types" doesn't exist, add it to the end of the menu
            $menuData['menu'][] = [
                'url' => "/dynamic-medical-type",
                'name' => 'Medical Types',
                'icon' => 'menu-icon tf-icons mdi mdi-medical-bag',
                'slug' => 'dynamic-medical-types',
                'submenu' => $dynamicMedicalTypes
            ];
        }

        // Write the updated JSON file
        File::put($menuPath, json_encode($menuData, JSON_PRETTY_PRINT));
    }

    public function show($id)
    {
        // Find the role by ID
        $role = Role::findOrFail($id);

        // Get all profile roles associated with the profile_name of the role
        $profileRoles = ProfileRole::where('profile_name', $role->profile_name)->get();

        // Pass the role and associated profile roles to the view
        return view('users::roles.show', compact('role', 'profileRoles'));
    }
}
