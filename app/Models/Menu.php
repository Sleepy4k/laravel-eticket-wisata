<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'icon', 'permission', 'category', 'page_id'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Menu';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model Menu successfully {$eventName}";
    }

    protected $table = "menus";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'icon', 'permission', 'category', 'page_id'];
    protected $guarded = 'id';
}