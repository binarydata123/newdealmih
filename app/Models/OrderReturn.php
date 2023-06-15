<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderReturn extends Model
{
    use HasFactory;
    protected $fillable = ['order_id','user_id','product_id','return_name','return_email','return_phone','return_street_address_1','return_street_address_2','return_city','return_state','return_zipcode','return_order_number','return_request_type','return_reason','return_description'];
}
