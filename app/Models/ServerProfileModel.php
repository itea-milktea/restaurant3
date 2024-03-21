<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerProfileModel extends Model
{
    use HasFactory;
    protected $table='hrms_r3_server_profiles';
    protected $fillable = [
        'code',
        'firstname',
        'lastname',
        'middle_name',
        'age',
        'contact',
        'birthday',
        'email',
        'address',
        'position',
        'ratings',
        'reviews',
        'status',
    ];
}
