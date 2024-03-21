<?php

namespace App\Models\R1Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'hrms_r1_reservations';
    protected $fillable = [
        'name',
        'email',
        'tel_number',
        'res_date',
        'table_id',
        'guest_number',
        'location',
        'payment_status'
    ];
}
