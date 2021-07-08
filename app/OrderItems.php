<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    //
    protected $fillable = [
        'product_id', 'order_id', 'qtn'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
