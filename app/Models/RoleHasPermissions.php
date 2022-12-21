<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class RoleHasPermissions extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['permission_id', 'role_id'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'role';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model role_has_permissions successfully {$eventName}";
    }

    protected $table = "role_has_permissions";
    protected $fillable = ['permission_id', 'role_id'];
}
