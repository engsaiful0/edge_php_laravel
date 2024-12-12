<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class ProcessOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function handle()
    {
        // Update order status to "processing"
        $this->order->update(['status' => 'processing']);

        // Simulate processing
        sleep(5); // Simulate a delay

        // Update order status to "completed"
        $this->order->update(['status' => 'completed']);

        logger("Order processed: {$this->order->id}");
    }
}
