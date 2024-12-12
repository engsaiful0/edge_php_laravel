<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placement</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <h1>Place an Order</h1>
    <form id="orderForm">
        <label for="amount">Order Amount:</label>
        <input type="number" id="amount" name="amount" required>
        <button type="submit">Place Order</button>
    </form>

    <h2>Order Status</h2>
    <p id="status">No order placed yet.</p>

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
</body>
</html>
