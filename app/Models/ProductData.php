<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductData extends Model
{
    use HasFactory;
    protected $fillable =['input_type','feature_data_id','feature_data_text','product_id'];
    protected $table = 'product_datas';
    public function featureData()
    {
        return $this->belongsTo(FeatureData::class,'feature_data_id');
    }
    
}
