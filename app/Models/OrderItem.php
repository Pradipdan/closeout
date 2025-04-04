<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['order_id', 'product_id', 'product_name', 'price', 'quantity','subtotal'];

    // public function order()
    // {
    //     return $this->belongsTo(Order::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Define relationship with Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Define relationship with Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
   

}
