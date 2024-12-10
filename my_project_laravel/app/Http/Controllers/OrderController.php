<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OrderService;

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

        return response()->json(['message' => 'Order placed successfully, processing in the background.']);
    }
}
