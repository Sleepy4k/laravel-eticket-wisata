<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'description', 'latitude', 'longitude', 'contact', 'responsible', 'address', 'user_id'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Tour';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model Tour successfully {$eventName}";
    }

    protected $table = "tours";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'description', 'latitude', 'longitude', 'contact', 'responsible', 'address', 'user_id'];
}