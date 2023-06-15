<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','payment_option','order_status','if_cancelled',
    'if_delivered','delivery_date','nabil_bank_orderId','nabil_bank_sessionId',
    'payment_reponse_xmlout','get_order_request','get_order_response'];
   
    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class,'order_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function orderProductSum()
    {
        return $this->hasMany(OrderProduct::class,'order_id')->sum('purchase_price');
    }
}
