<?php

namespace App\Models;

use App\Models\User;
use App\Models\GuestDetails;
use App\Models\CartPaymentInformation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentInformation extends Model
{
    use HasFactory;

    protected $table = 'hrms_r3_payment_info';
    protected $fillable = [
        'acc_id',
        'invoice_no',
        'customer_name',
        'customer_email',
        'payment_method',
        'payment_status',
        'room_no',
        'status'
    ];

    public function cartPayments(){
        return $this->hasMany(CartPaymentInformation::class, 'payment_id', 'id');
    }

    public function userPayments(){
        return $this->belongsTo(User::class, 'acc_id', 'id');
    }
}
