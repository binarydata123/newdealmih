<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBackup extends Model
{
    //
    protected $fillable = [
        "name",
        "image",
        "price",
        "manufacture_name",
        "manufacture_brand",
    ];

    const PRICES = [
        'Less than 50',
        'From 50 to 100',
        'From 100 to 500',
        'More than 500',
    ];

    // public function list()
    // {
    //     return $this->belongsTo(List::class());
    // }

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function filters($query)
    {
        return $query->when(count(request()->input('prices', [])), function ($query) {
            $query->where(function ($query) {
                $query->when(in_array(0, request()->input('prices')), function ($query) {
                    $query->orWhere('price', '<', '5000');
                })
                    ->when(in_array(1, request()->input('prices')), function ($query) {
                        $query->orWhere('price', ['5000', '10000']);
                    })
                    ->when(in_array(2, request()->input('prices')), function ($query) {
                        $query->orWhere('price', ['10000', '50000']);
                    })
                    ->when(in_array(3, request()->input('prices')), function ($query) {
                        $query->orWhere('price', '>', '50000');
                    });
            });
        });
    }
}
