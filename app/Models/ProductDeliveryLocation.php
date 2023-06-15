<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDeliveryLocation extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','district_id'];
    public function distrctList()
    {
        return $this->belongsTo('App\Models\District','district_id','district_id');
    }
}
