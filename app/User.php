<?php

namespace App;

use App\Models\BusinessContact;
use App\Models\UserDetail;
use App\Models\UserDocument;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','username', 'email','password','create_time','firstname','lastname','gender',
        'phone_number','otp','dob','address','is_contacted_person','active','remember_token','last_login',
        'is_business','avatar','is_approve_store','is_store','google_id','facebook_id','apple_id','device_token','is_deleted'
    
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function businessDetails()
    {
        return $this->hasOne(UserDetail::class,'user_id');
    }
    public function contactPerson()
    {
        return $this->hasOne(BusinessContact::class,'user_id');
    }
    public function documents()
    {
        return $this->hasMany(UserDocument::class,'user_id');
    }
}
