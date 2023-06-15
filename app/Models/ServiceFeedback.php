<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFeedback extends Model
{
    use HasFactory;
    protected $table = 'service_feedbackes';
    protected $fillable = ['product_id','title','rating','review','submitted_user'];
    public function user()
    {
        return $this->hasOne(User::class,'id','submitted_user');
    }
}
