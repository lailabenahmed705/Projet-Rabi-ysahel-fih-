<?php

namespace Modules\Permission\app\Models;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    protected $guarded = [];
    protected $fillable = ['name', 'guard_name'];
}
