<?php

namespace Modules\International\Permission;

use Modules\Permission\Traits\PermissionGenerator;

class PatientPermissionRegistrar
{
  use PermissionGenerator;

  public function registerPermissions()
  {
    $this->generateCrudPermissionsFor('patient'); // CRUD complet
    
  }
}