<?php

namespace Modules\Permission\app\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    protected $guarded = [];
    protected $fillable = ['name', 'guard_name'];
}
