<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'permission'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Category';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model Category successfully {$eventName}";
    }

    protected $table = "categories";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'permission'];
}