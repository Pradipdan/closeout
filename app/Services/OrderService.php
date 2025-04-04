<?php
namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;

class OrderService

{
    protected OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getAll(){
        $orders = $this->orderRepository->getAll();
        return $orders;
    }

    public function destroy($id)
    {
        $product = $this->orderRepository->destroy($id);
        return $product;
    }
}
