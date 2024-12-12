<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;
use App\Models\Order;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function placeOrder(Request $request)
    {
        $order = $this->orderService->placeOrder(auth()->id(), $request->input('amount'));

        return response()->json([
            'message' => 'Order placed successfully, processing in the background.',
            'order_id' => $order->id,
        ]);
    }

    public function getOrderStatus($id)
    {
        $order = Order::findOrFail($id);

        return response()->json(data: [
            'status' => $order->status,
        ]);
    }
}
