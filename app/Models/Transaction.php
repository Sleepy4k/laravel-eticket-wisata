<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, LogsActivity;

    protected static $logAttributes = ['tiket_number', 'time', 'amount', 'status', 'price', 'package_id', 'user_id'];

    protected static $logOnlyDirty = true;

    protected static $logName = 'Transaction';

    public function getDescriptionForEvent(string $eventName): string
    {
        return "model Transaction successfully {$eventName}";
    }

    protected $table = "transactions";
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'tiket_number', 'time', 'amount', 'status', 'price', 'package_id', 'user_id'];
}
