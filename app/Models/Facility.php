<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'description', 'tour_id'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Facility';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model Facility successfully {$eventName}";
    }

    protected $table = "Facilities";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description', 'tour_id'];
}