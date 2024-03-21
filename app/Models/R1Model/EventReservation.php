<?php

namespace App\Models\R1Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReservation extends Model
{
    use HasFactory;
    protected $table = 'hrms_r1_events';
    protected $fillable = [
        'name',
        'email',
        'tel_number',
        'res_date',
        'guest_number',
        'event_type',
        'other_request',
        'payment_status',
        'downpayment'
    ];
}
