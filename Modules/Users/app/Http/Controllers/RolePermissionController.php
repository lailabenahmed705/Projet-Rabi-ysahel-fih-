<?php

namespace Modules\Users\App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('users::role_permissions.index', compact('roles', 'permissions'));
    }
    public function create()
    {
    $permissions = Permission::all();
    return view('users::role_permissions.create', compact('permissions'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
            'permissions' => 'nullable|array',
        ]);

        $role = Role::findOrFail($request->role_id);

        // Synchronisation des permissions pour le rôle
        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        } else {
            $role->syncPermissions([]); // Supprime toutes les permissions si aucune sélectionnée
        }

        return back()->with('success', 'Permissions updated successfully.');
    }
}
