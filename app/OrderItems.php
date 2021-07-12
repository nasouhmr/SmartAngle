<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    protected $with = ['products'];

    //
    protected $fillable = [
        'product_id', 'order_id', 'qtn'
    ];

    protected $hidden = [
        'created_at','updated_at','product_id', 'order_id'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
