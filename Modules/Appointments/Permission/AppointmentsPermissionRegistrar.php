<?php

namespace Modules\Appointments\Permission;

use Modules\Permission\Traits\PermissionGenerator;

class AppointmentsPermissionRegistrar
{
    use PermissionGenerator;

    public function registerPermissions()
    {
        // On se base uniquement sur les modèles que tu possèdes réellement
        $this->generateCrudPermissionsFor('Appointment');
        $this->generateCrudPermissionsFor('Availibility');
        $this->generateCrudPermissionsFor('AvailibilitySetting');
        

    }
}
