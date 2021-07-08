<?php

namespace App;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id' ,'order_number'
    ];

    protected $hidden = [
        'user_id' ,'created_at','updated_at'
    ];

    public function customer()
    {
        return $this->hasOne(Customer::class,'id','user_id');
    }  

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
    
 
}
