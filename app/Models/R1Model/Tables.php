<?php

namespace App\Models\R1Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tables extends Model
{
    use HasFactory;
    protected $table = 'hrms_r1_tables';
    protected $fillable = [
        'name', 
        'status', 
        'guest_number',
        'price',
    ];
}
