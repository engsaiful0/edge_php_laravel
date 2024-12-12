@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Place an Order</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="orderForm" class="card p-4 shadow-sm">
                <div class="mb-3">
                    <label for="amount" class="form-label">Order Amount:</label>
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter amount" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Place Order</button>
            </form>
        </div>
    </div>

    <h2 class="text-center mt-5">Order Status</h2>
    <p id="status" class="text-center text-muted">No order placed yet.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('orderForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const amount = document.getElementById('amount').value;

        // Place order
        axios.post('/orders', { amount })
            .then(response => {
                const orderId = response.data.order_id;
                document.getElementById('status').textContent = 'Order placed! Checking status...';

                // Poll for status updates
                const interval = setInterval(() => {
                    axios.get(`/orders/${orderId}/status`)
                        .then(res => {
                            const status = res.data.status;
                            document.getElementById('status').textContent = `Order status: ${status}`;

                            if (status === 'completed') {
                                clearInterval(interval);
                            }
                        });
                }, 2000);
            })
            .catch(error => {
                console.error(error);
                document.getElementById('status').textContent = 'Error placing order.';
            });
    });
</script>
@endsection
