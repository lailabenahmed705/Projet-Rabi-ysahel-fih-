<?php

namespace Modules\Permission\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Permission\app\Models\Role;
use Modules\Permission\app\Models\Permission;

class RoleController extends Controller
{
    // 🔹 GET /admin/roles
    // Display a list of all roles
    public function index()
    {
        $roles = Role::with('permissions')->get();
        return view('permission::roles.index', compact('roles'));
    }

    // 🔹 GET /admin/roles/create
    // Show a form to create a new role
    public function create()
    {
        $permissions = Permission::all(); // List all permissions to assign
        return view('permission::roles.create', compact('permissions'));
    }

    // 🔹 POST /admin/roles
    // Handle form submission to create a new role
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:roles,name',
            'permissions' => 'array'
        ]);

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role created successfully.');
    }

    // 🔹 GET /admin/roles/{id}
    // Display a single role and its permissions
    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return view('permission::roles.show', compact('role'));
    }

    // 🔹 GET /admin/roles/{id}/edit
    // Show a form to edit a role
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();

        return view('permission::roles.edit', compact('role', 'permissions'));
    }

    // 🔹 PUT/PATCH /admin/roles/{id}
    // Handle form submission to update a role
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => "required|string|unique:roles,name,$id",
            'permissions' => 'array'
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
            'guard_name' => 'web' // force consistent guard
        ]);
        
        $role->syncPermissions($request->permissions);

        return redirect()->route('roles.index')->with('success', 'Role updated.');
    }

    // 🔹 DELETE /admin/roles/{id}
    // Delete a role
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted.');
    }
}
