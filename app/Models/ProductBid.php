<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBid extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','user_id','price'];
    public function bidUser()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
