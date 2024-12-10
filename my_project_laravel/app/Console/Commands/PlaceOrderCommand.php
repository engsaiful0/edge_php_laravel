<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class PlaceOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:place {user_id} {amount}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Place an order for a specific user with the given amount';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        // Retrieve arguments
        $userId = $this->argument('user_id');
        $amount = $this->argument('amount');

        // Perform order creation
        $order = Order::create([
            'user_id' => $userId,
            'amount' => $amount,
            'status' => 'pending',
        ]);

        // Output success message
        $this->info("Order placed successfully for User ID: {$userId} with Amount: {$amount}.");
    }
}

