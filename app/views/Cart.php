<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <?php
    require_once(__DIR__ . '/../assets/css/cart.css.php');
    ?>
</head>

<body onload="showpending()">
    <?php
    require_once("app/components/header.php");
    ?>

    <div class="cart-content m-5">
        <div class="status d-flex justify-content-end mb-3">
            <nav aria-label="Order Status">
                <ul class="pagination pagination-sm status-pagination">
                    <li class="page-item active pendingBtn" onclick="showpending()" aria-current="page">
                        <span class="page-link">
                            <i class="fas fa-hourglass-half"></i> Pending
                        </span>
                    </li>
                    <li class="page-item processingBtn" onclick="showprocessing()">
                        <a class="page-link" href="#">
                            <i class="fas fa-cogs"></i> Processing
                        </a>
                    </li>
                    <li class="page-item completedBtn" onclick="showcompleted()">
                        <a class="page-link" href="#">
                            <i class="fas fa-check-circle"></i> Completed
                        </a>
                    </li>
                    <li class="page-item canceledBtn" onclick="showcanceled()">
                        <a class="page-link" href="#">
                            <i class="fas fa-times-circle"></i> Canceled
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Pending -->
        <div id="pending">
            <div class="cart-header d-flex border-bottom pb-2">
                <div class="product-info"><strong>Product</strong></div>
                <div class="price"><strong>Price</strong></div>
                <div class="quantity-control me-4"><strong>Quantity</strong></div>
                <div class="total"><strong>Total</strong></div>
                <div class="remove-btn"><strong>Remove</strong></div>
            </div>
            <?php if (isset($data['orderItems']) && !empty($data['orderItems']) && is_array($data['orderItems'])): ?>
                <?php foreach ($data['orderItems'] as $orderItem): ?>
                    <div id="itemId-<?= $orderItem['order_item_id'] ?>">
                        <div class="cart-item d-flex align-items-center mt-4">
                            <div class="product-info d-flex align-items-center">
                                <img src="<?= $orderItem['foodImg'] ?>" alt="" class="image">
                                <span class="ms-3"><?= $orderItem['foodName'] ?></span>
                            </div>
                            <div class="price-<?= $orderItem['foodId'] ?> me-4"><?= number_format($orderItem['price'], 0, ',', '.') ?> VND</div>
                            <div class="quantity-control">
                                <button class="btn btn-sm" onclick="decrement(<?= $orderItem['foodId'] ?>)">-</button>
                                <input id="quantity-<?= $orderItem['foodId'] ?>" type="text" value="<?= $orderItem['quantity'] ?>" class="form-control mx-2">
                                <button class="btn btn-sm" onclick="increment(<?= $orderItem['foodId'] ?>)">+</button>
                            </div>
                            <div class="subtotal-<?= $orderItem['foodId'] ?> subtotal"><?= number_format($orderItem['total_price'], 0, ',', '.') ?> VND</div>
                            <button class="remove-btn" data-id="<?php echo $orderItem['order_item_id']; ?>"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>
                <?php endforeach; ?>

                <div class="cart-summary mt-4">
                    <div class="d-flex justify-content-between mt-2" id="total">
                        <strong>Total</strong>
                        <span class="totalAmount"><?= number_format($data['total_amount'], 0, ',', '.') ?> VND<span>
                    </div>
                    <button class="btn-checkout mt-3 mb-4" onclick="gotocheckout()">GO TO CHECKOUT</button>
                </div>
            <?php else: ?>
                <div class="alert alert-warning text-center mt-4">Cart is empty!</div>
            <?php endif; ?>
        </div>



        <div id="processing">
            <div class="cart-header d-flex border-bottom pb-2">
                <div class="product-info"><strong>Order ID</strong></div>
                <div class="price"><strong>User ID</strong></div>
                <div class="total"><strong>Total Amount</strong></div>
                <div class="remove-btn"><strong>Create At</strong></div>
            </div>
            <?php if (isset($data['processingOrder']) && !empty($data['processingOrder']) && is_array($data['processingOrder'])): ?>
                <?php foreach ($data['processingOrder'] as $orderItem): ?>
                    <div class="cart-item d-flex align-items-center mt-4">
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['order_id'] ?></span>
                        </div>
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['userId'] ?></span>
                        </div>
                        <div><?= number_format($orderItem['total_amount'], 0, ',', '.') ?> VND</div>
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['created_at'] ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>


            <?php else: ?>
                <div class="alert alert-warning text-center mt-4">Cart is empty!</div>
            <?php endif; ?>
        </div>


        <div id="completed">
            <div class="cart-header d-flex border-bottom pb-2">
                <div class="product-info"><strong>Order ID</strong></div>
                <div class="price"><strong>User ID</strong></div>
                <div class="total"><strong>Total Amount</strong></div>
                <div class="remove-btn"><strong>Create At</strong></div>
            </div>
            <?php if (isset($data['completedOrder']) && !empty($data['processingOrder']) && is_array($data['processingOrder'])): ?>
                <?php foreach ($data['processingOrder'] as $orderItem): ?>
                    <div class="cart-item d-flex align-items-center mt-4">
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['order_id'] ?></span>
                        </div>
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['userId'] ?></span>
                        </div>
                        <div><?= number_format($orderItem['total_amount'], 0, ',', '.') ?> VND</div>
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['created_at'] ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>


            <?php else: ?>
                <div class="alert alert-warning text-center mt-4">Cart is empty!</div>
            <?php endif; ?>
        </div>




        <div id="canceled">
            <div class="cart-header d-flex border-bottom pb-2">
                <div class="product-info"><strong>Order ID</strong></div>
                <div class="price"><strong>User ID</strong></div>
                <div class="total"><strong>Total Amount</strong></div>
                <div class="remove-btn"><strong>Create At</strong></div>
            </div>
            <?php if (isset($data['canceledOrder']) && !empty($data['processingOrder']) && is_array($data['processingOrder'])): ?>
                <?php foreach ($data['processingOrder'] as $orderItem): ?>
                    <div class="cart-item d-flex align-items-center mt-4">
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['order_id'] ?></span>
                        </div>
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['userId'] ?></span>
                        </div>
                        <div><?= number_format($orderItem['total_amount'], 0, ',', '.') ?> VND</div>
                        <div class="product-info d-flex ">
                            <span class="ms-3"><?= $orderItem['created_at'] ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>


            <?php else: ?>
                <div class="alert alert-warning text-center mt-4">Cart is empty!</div>
            <?php endif; ?>
        </div>




        <!-- Processing, Completed, and Canceled sections should be similar as "pending" -->

        <script>
            const pendingDiv = document.querySelector('#pending');
            const processingDiv = document.querySelector('#processing');
            const completedDiv = document.querySelector('#completed');
            const canceledDiv = document.querySelector('#canceled');

            const showpending = () => {
                pendingDiv.style.display = 'block';
                processingDiv.style.display = 'none';
                completedDiv.style.display = 'none';
                canceledDiv.style.display = 'none';
            }

            const showprocessing = () => {
                pendingDiv.style.display = 'none';
                processingDiv.style.display = 'block';
                completedDiv.style.display = 'none';
                canceledDiv.style.display = 'none';
            }

            const showcompleted = () => {
                pendingDiv.style.display = 'none';
                processingDiv.style.display = 'none';
                completedDiv.style.display = 'block';
                canceledDiv.style.display = 'none';
            }

            const showcanceled = () => {
                pendingDiv.style.display = 'none';
                processingDiv.style.display = 'none';
                completedDiv.style.display = 'none';
                canceledDiv.style.display = 'block';
            }

            document.querySelectorAll('.page-item').forEach(function(pageItem) {
                pageItem.addEventListener('click', function() {
                    document.querySelectorAll('.page-item').forEach(function(item) {
                        item.classList.remove('active');
                    });
                    pageItem.classList.add('active');
                });
            });

            const gotocheckout = () => {
                window.location.href = '/user/checkout';
            }

            const updateTotalAmount = () => {
                let total = 0;
                document.querySelectorAll('.subtotal').forEach(function(subtotal) {
                    let priceText = subtotal.textContent.replace(' VND', '').replace(/\./g, '');
                    total += parseInt(priceText);
                    console.log(priceText);
                });
                document.querySelector('.totalAmount').innerHTML = new Intl.NumberFormat('de-DE').format(total) + ' VND';
            };

            function increment(foodId) {
                const quantityInput = document.getElementById(`quantity-${foodId}`);
                const totalPrice = document.querySelector(`.subtotal-${foodId}`);
                const priceNumber = parseInt(document.querySelector(`.price-${foodId}`).textContent.replace(' VND', '').replace(/\./g, ''));
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue >= 0) {
                    quantityInput.value = currentValue + 1;
                    totalPrice.innerHTML = new Intl.NumberFormat('de-DE').format(priceNumber * quantityInput.value) + ' VND';
                    updateTotalAmount();
                    fetch(`/menu/updateQuantity/${foodId}/${quantityInput.value}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            foodId,
                            quantity: quantityInput.value
                        })
                    }).catch(error => {
                        console.error('Lỗi khi cập nhật', error);
                        alert("Lỗi kết nối, vui lòng thử lại.");
                    });
                }
            }

            function decrement(foodId) {
                const quantityInput = document.getElementById(`quantity-${foodId}`);
                const totalPrice = document.querySelector(`.subtotal-${foodId}`);
                const priceNumber = parseInt(document.querySelector(`.price-${foodId}`).textContent.replace(' VND', '').replace(/\./g, ''));
                let currentValue = parseInt(quantityInput.value);
                if (!isNaN(currentValue) && currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                    totalPrice.innerHTML = new Intl.NumberFormat('de-DE').format(priceNumber * quantityInput.value) + ' VND';
                    updateTotalAmount();
                    fetch(`/menu/updateQuantity/${foodId}/${quantityInput.value}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            foodId,
                            quantity: quantityInput.value
                        })
                    }).catch(error => {
                        console.error('Lỗi khi cập nhật', error);
                        alert("Lỗi kết nối, vui lòng thử lại.");
                    });
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const removeButtons = document.querySelectorAll('.remove-btn');
                removeButtons.forEach(button => {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        const orderItemId = this.getAttribute('data-id');
                        if (orderItemId) {
                            const itemDiv = document.querySelector(`#itemId-${orderItemId}`);
                            fetch(`/user/removeItem/${orderItemId}`, {
                                    method: 'DELETE'
                                })
                                .then(response => {
                                    if (response.ok) {
                                        itemDiv.style.display = 'none';
                                        itemDiv.remove();
                                        updateTotalAmount()
                                    } else {
                                        console.error('Lỗi khi xóa:', response.statusText);
                                    }
                                })
                                .catch(error => {
                                    console.error('Có lỗi xảy ra:', error);
                                    alert("Có lỗi xảy ra, vui lòng thử lại sau.");
                                });
                        }
                    });
                });
            });
        </script>

        <?php
        include_once("app/components/footer.php");
        ?>
</body>

</html>