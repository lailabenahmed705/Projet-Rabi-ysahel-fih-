<?php

namespace Modules\Appointments\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Création des rôles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $doctor = Role::firstOrCreate(['name' => 'doctor']);
        $patient = Role::firstOrCreate(['name' => 'patient']);

        // Assigner des permissions aux rôles
        $admin->givePermissionTo(Permission::all());
        $doctor->givePermissionTo(['appointments.view', 'appointments.create', 'appointments.update']);
        $patient->givePermissionTo(['appointments.view']);
    }
}
