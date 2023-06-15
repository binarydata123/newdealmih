<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureData extends Model
{
    use HasFactory;
    protected $table = 'feature_dataes';
    protected $fillable = ['feature_id','data_name'];
    public function feature()
    {
        return $this->belongsTo(Feature::class,'feature_id');
    }
}
