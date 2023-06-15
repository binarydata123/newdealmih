<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','product_id','quantity','price','purchase_price','nabil_bank_sessionId','nabil_bank_orderId'];
    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function orderList()
    {
        return $this->belongsTo('App\Models\Order','order_id','id');
    }
}
