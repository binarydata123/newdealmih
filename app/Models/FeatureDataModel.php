<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureDataModel extends Model
{
    use HasFactory;
    protected $table = 'feature_data_models';
    protected $fillable = ['feature_data_id','model_name'];
    public function featureModel()
    {
        return $this->belongsTo(Feature::class,'feature_data_id');
    }
}
