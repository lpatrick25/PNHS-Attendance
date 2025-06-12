<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $primaryKey = 'logs_id';

    protected $fillable = [
        'rfid_no',
        'time',
        'date',
        'status',
    ];
}
