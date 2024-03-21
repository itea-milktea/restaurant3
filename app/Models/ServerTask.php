<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerTask extends Model
{
    use HasFactory;
    protected $table = 'hrms_r3_server_task';
    protected $fillable = [
        'task_type',
        'server_name',
        'client_invoice',
        'room_no',
        'status'
    ];
}
