<?php

namespace Modules\Permission\app\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Permission\app\Models\Permission;

class PermissionController extends Controller
{
    // GET /admin/permissions
    public function index()
    {
        $permissions = Permission::all();
        return view('permission::permissions.index', compact('permissions'));
    }

    // GET /admin/permissions/{id}
    public function show($id)
    {
        $permission = Permission::with('roles')->findOrFail($id);
        return view('permission::permissions.show', compact('permission'));
    }
}
