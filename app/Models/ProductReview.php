<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','title','rating','review','submitted_user','product_id'];
    public function user()
    {
        return $this->hasOne(User::class,'id','submitted_user');
    }
}
