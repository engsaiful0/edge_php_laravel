<?php

namespace App\Services;

use App\Models\Order;
use App\Jobs\ProcessOrder;

class OrderService
{
    /**
     * Place a new order and dispatch the processing job.
     *
     * @param int $userId
     * @param float $amount
     * @return Order
     */
    public function placeOrder(int $userId, float $amount): Order
    {
        // Create a new order
        $order = Order::create([
            'user_id' => $userId,
            'amount' => $amount,
            'status' => 'pending',
        ]);

        // Dispatch a background job to process the order
        ProcessOrder::dispatch($order);

        return $order;
    }
}
