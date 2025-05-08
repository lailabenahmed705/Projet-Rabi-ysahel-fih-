<?php

namespace Modules\Appointments\database\seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class AppointmentsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        $permissions = [
            'appointments.create',
            'appointments.view',
            'appointments.update',
            'appointments.delete',
        ];
    
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
    }

