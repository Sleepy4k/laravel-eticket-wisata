<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'price', 'description', 'tour_id'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Package';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model Package successfully {$eventName}";
    }

    protected $table = "packages";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'description', 'tour_id'];
    protected $guarded = 'id';
}