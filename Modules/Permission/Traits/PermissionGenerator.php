<?php

namespace Modules\Permission\Traits;

use Spatie\Permission\Models\Permission;

trait PermissionGenerator
{
  /**
   * Génère les permissions CRUD pour une entité donnée.
   *
   * Exemple :
   *   $this->generateCrudPermissionsFor('hotel');
   *   $this->generateCrudPermissionsFor('room', ['view', 'update']);
   *
   * Résultat :
   *   - hotel.create, hotel.read, hotel.update, hotel.delete
   *   - room.view, room.update
   *
   * @param string $modelName Nom logique de l'entité (ex: 'hotel', 'room')
   * @param array|null $actions Liste des actions (par défaut : CRUD)
   */
  public function generateCrudPermissionsFor(string $modelName, array $actions = null): void
  {
    $actions = $actions ?? ['create', 'read', 'update', 'delete'];

    foreach ($actions as $action) {
      $permissionName = "$modelName.$action";

      Permission::firstOrCreate([
        'name' => $permissionName,
        'guard_name' => 'web',
      ]);
    }
  }
}
