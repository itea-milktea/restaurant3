<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\GuestDetails;
use Laravel\Sanctum\HasApiTokens;
use App\Models\PaymentInformation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table ='hrms_users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function addCart(){
        return $this->hasMany(UserCart::class, 'acc_id', 'id');
    }

    public function userDetails()
    {
        return $this->hasOne(GuestDetails::class, 'user_id');
    }

    public function userPayments()
    {
        return $this->hasMany(PaymentInformation::class, 'acc_id');
    }
}
