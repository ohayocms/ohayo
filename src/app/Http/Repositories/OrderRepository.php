<?php

namespace App\Http\Repositories;

use App\Models\Order;

class OrderRepository implements Interfaces\OrderRepositoryInterface
{

    public function getAll()
    {
        return Order::all();
    }

    public function getById(int $id)
    {
        return Order::findOrFail($id);
    }
}
