<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = ['name','slug','categories_id','features_id','feature_data_id','status','input_type','order_no'];

    public function parantFeature()
        {
            return $this->belongsTo(Feature::class,'features_id');
        }
    public function category()
        {
            return $this->belongsTo(Category::class,'categories_id');
        }
    public function featureData()
    {
        return $this->hasMany(FeatureData::class,'feature_id');
    }
    public function featureDataModel()
    {
        return $this->hasMany(FeatureDataModel::class,'feature_data_id');
    }
}
