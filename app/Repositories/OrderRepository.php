<?php
namespace App\Repositories;

use App\Models\Order;
use App\Models\Category;
use App\Models\User;

class OrderRepository
{

    public function getAll()
    {
        return Order::orderBy('created_at', 'desc')->get();
    }

    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return $order;

    }
}
