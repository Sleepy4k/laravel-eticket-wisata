<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Page extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['name', 'label', 'page_url'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Page';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model Page successfully {$eventName}";
    }

    protected $table = "pages";
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'label', 'page_url'];
    protected $guarded = 'id';
}