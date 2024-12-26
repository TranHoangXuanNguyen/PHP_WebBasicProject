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
        <div id="pending">
            <div class="cart-header d-flex border-bottom pb-2">
                <div class="product-info"><strong>Product</strong></div>
                <div class="price"><strong>Price</strong></div>
                <div class="quantity-control me-4"><strong>Quantity</strong></div>
                <div class="total"><strong>Total</strong></div>
                <div class="remove-btn"><strong>Remove</strong></div>
            </div>
            <?php if (isset($data['orderItems']) && !empty($data['orderItems'])  && is_array($data['orderItems'])): ?>
                <?php foreach ($data['orderItems'] as $orderItem): ?>
                    <div class="cart-item d-flex align-items-center mt-4">
                        <div class="product-info d-flex align-items-center">
                            <img src="<?= htmlspecialchars($orderItem['foodImg']) ?>" alt="" class="image">
                            <span class="ms-3"><?= htmlspecialchars($orderItem['foodName']) ?></span>

                        </div>
                        <div class="price-<?= $orderItem['foodId'] ?> me-4"><?= number_format($orderItem['price'], 0, ',', '.') ?> VND</div>
                        <div class="quantity-control">
                            <button class="btn btn-sm" onclick="decrement(<?= $orderItem['foodId'] ?>)">-</button>
                            <input id="quantity-<?= $orderItem['foodId'] ?>" type="text" value="<?= htmlspecialchars($orderItem['quantity']) ?>" class="form-control mx-2">
                            <button class="btn btn-sm" onclick="increment(<?= $orderItem['foodId'] ?>)">+</button>
                        </div>
                        <div class="subtotal-<?= $orderItem['foodId'] ?>"><?= number_format($orderItem['total_price'], 0, ',', '.') ?> VND</div>
                        <button class="remove-btn" data-id="<?= htmlspecialchars($orderItem['order_item_id']) ?>"><i class="fa fa-trash"></i></button>
                    </div>
                <?php endforeach; ?>

                <div class="cart-summary mt-4">
                    <div class="d-flex justify-content-between mt-2" id="total">
                        <strong>Total</strong>
                        <span><?= number_format($data['total_amount'], 0, ',', '.') ?> VND</span>
                    </div>
                    <button class="btn-checkout mt-3 mb-4" onclick="gotocheckout()">GO TO CHECKOUT</button>

                </div>
            <?php else: ?>
            <div class="alert alert-warning text-center mt-4">Cart is empty!</div>
            <?php endif; ?>
        </div>
    </div>

            <!-- Processing -->
            <div id="processing">
                <div class="cart-content m-5">
                    <div class="cart-header d-flex border-bottom pb-2">
                        <div class="OrderId"><strong>Order ID</strong></div>
                        <div class="userId"><strong>User Id</strong></div>
                        <div class="total"><strong>Total Amount</strong></div>
                        <div class="remove-btn"><strong>CanCel</strong></div>

                    </div>
            <?php if (isset($data['processingOrder']) && !empty($data['processingOrder'])): ?>
                    <?php foreach ($data['processingOrder'] as $orderProcessing): ?>
                        <div class="cart-item d-flex align-items-center mt-4 border-bottom">
                            <div class="OrderId d-flex align-items-center justify-content-center"><?= $orderProcessing['order_id'] ?></div>
                            <div class="userId me-4"> <?= $orderProcessing['userId'] ?></div>
                            <div class="total"><?= number_format($orderProcessing['total_amount'], 0, ',', '.') ?> VND</div>
                            <button class="remove-btn"><i class="fa fa-times"></i></button>
                        </div>
                    <?php endforeach; ?>
                    <?php else: ?>
            <div class="alert alert-warning text-center mt-4">Cart is empty!</div>

            <?php endif; ?>
                </div>
            </div>


            <!-- Completed -->
            <div id="completed">
                <div class="cart-content m-5">
                    <div class="cart-header d-flex border-bottom pb-2">
                        <div class="OrderId"><strong>Order ID</strong></div>
                        <div class="userId"><strong>User Id</strong></div>
                        <div class="total"><strong>Total Amount</strong></div>

                    </div>
            <?php if (isset($data['completedOrder']) && !empty($data['completedOrder'])): ?>
                    <?php foreach ($data['completedOrder'] as $orderComplete): ?>
                        <div class="cart-item d-flex align-items-center mt-4 border-bottom">
                            <div class="OrderId d-flex align-items-center justify-content-center"><?= $orderComplete['order_id'] ?></div>
                            <div class="userId me-4"> <?= $orderComplete['userId'] ?></div>
                            <div class="total"><?= number_format($orderComplete['total_amount'], 0, ',', '.') ?> VND</div>
                        </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                 <div class="alert alert-warning text-center">Cart is empty!</div>

            <?php endif; ?>

                </div>
            </div>
            <!-- Cancel -->
            <div id="canceled">
                <div class="cart-content m-5">
                    <div class="cart-header d-flex border-bottom pb-2">
                        <div class="OrderId"><strong>Order ID</strong></div>
                        <div class="userId"><strong>User Id</strong></div>
                        <div class="total"><strong>Total Amount</strong></div>

                    </div>
            <?php if (isset($data['canceledOrder']) && !empty($data['canceledOrder'])): ?>
                    <?php foreach ($data['canceledOrder'] as $orderCancel): ?>
                        <div class="cart-item d-flex align-items-center mt-4 border-bottom">
                            <div class="OrderId d-flex align-items-center justify-content-center"><?= $orderCancel['order_id'] ?></div>
                            <div class="userId me-4"> <?= $orderCancel['userId'] ?></div>
                            <div class="total"><?= number_format($orderCancel['total_amount'], 0, ',', '.') ?> VND</div>
                        </div>
                    <?php endforeach; ?>
                    <?php else: ?>
                <div class="alert alert-warning text-center mt-4">Cart is empty!</div>
            <?php endif; ?>

                </div>
            </div>

            <script>
                const pendingDiv = document.querySelector('#pending')
                const processingDiv = document.querySelector('#processing')
                const completedDiv = document.querySelector('#completed')
                const canceledDiv = document.querySelector('#canceled')

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

                function increment(foodId) {
                    const quantityInput = document.getElementById(`quantity-${foodId}`);
                    let currentValue = parseInt(quantityInput.value);
                    if (!isNaN(currentValue) && currentValue >= 0) {
                        quantityInput.value = currentValue + 1;
                        fetch(`/menu/updateQuantity/${foodId}/${quantityInput.value}`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    foodId: foodId,
                                    quantity: quantityInput.value
                                })
                            })
                            .catch(error => {
                                console.error('Lỗi khi cập nhật', error);
                                alert("Lỗi kết nối, vui lòng thử lại.");
                            });
                    } else {
                        console.error('Số lượng không hợp lệ');
                        alert("Số lượng không hợp lệ.");
                    }
                }

                function decrement(foodId) {
                    const quantityInput = document.getElementById(`quantity-${foodId}`);
                    let currentValue = parseInt(quantityInput.value);
                    if (!isNaN(currentValue) && currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                }

                // hàm remove
                document.addEventListener('DOMContentLoaded', function() {
                    // Lấy tất cả các nút xóa
                    const removeButtons = document.querySelectorAll('.remove-btn');

                    removeButtons.forEach(button => {
                        button.addEventListener('click', function(e) {
                            e.preventDefault();
                            const orderItemId = this.getAttribute('data-order_item_id');
                            fetch('/user/removeItem', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded',
                                    },
                                    body: new URLSearchParams({
                                        orderItemId: orderItemId,
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        const cartItem = this.closest('.cart-item');
                                        cartItem.remove();

                                        // Cập nhật tổng tiền trong giỏ hàng
                                        const totalElement = document.getElementById('total');
                                        totalElement.textContent = data.totalAmount; // Giả sử server trả về tổng tiền mới
                                    } else {
                                        alert(data.message); // Nếu thất bại, hiển thị thông báo lỗi
                                    }
                                })
                                .catch(error => {
                                    console.error('Có lỗi xảy ra khi gửi request', error);
                                    alert("An error occurred. Please try again.");
                                });
        const updateTotalAmount = () => {
            var total = 0;
            var totalElement = document.querySelector('.totalAmount');
            var priceEachFoodItems = document.querySelectorAll('.subtotal');
            priceEachFoodItems.forEach(function(subtotal) {
                var priceText = subtotal.textContent || subtotal.innerText;
                priceText = priceText.replace(' VND', '')
                priceText = priceText.replace(/\./g, '');
                var priceNumber = parseInt(priceText);
                console.log(priceText);
                total = total + priceNumber


            });
            totalElement.innerHTML = new Intl.NumberFormat('de-DE').format(total) + ' VND';

        };


        function increment(foodId) {
            const quantityInput = document.getElementById(`quantity-${foodId}`);
            const priceElement = document.querySelector(`.price-${foodId}`);
            const totalPrice = document.querySelector(`.subtotal-${foodId}`);

            var priceText = priceElement.textContent || priceElement.innerText;
            priceText = priceText.replace(' VND', '')
            priceText = priceText.replace(/\./g, '');

            var priceNumber = parseInt(priceText);

            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue >= 0) {
                quantityInput.value = currentValue + 1;

                totalPrice.innerHTML = new Intl.NumberFormat('de-DE').format(priceNumber * quantityInput.value) + ' VND';
                fetch(`/menu/updateQuantity/${foodId}/${quantityInput.value}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            foodId: foodId,
                            quantity: quantityInput.value
                        })
                    })
                    .catch(error => {
                        console.error('Lỗi khi cập nhật', error);
                        alert("Lỗi kết nối, vui lòng thử lại.");
                    });
            } else {
                console.error('Số lượng không hợp lệ');
                alert("Số lượng không hợp lệ.");
            }
            updateTotalAmount();
        }

        function decrement(foodId) {


            const quantityInput = document.getElementById(`quantity-${foodId}`);
            const priceElement = document.querySelector(`.price-${foodId}`);
            const totalPrice = document.querySelector(`.subtotal-${foodId}`);

            var priceText = priceElement.textContent || priceElement.innerText;
            priceText = priceText.replace(' VND', '')
            priceText = priceText.replace(/\./g, '');

            var priceNumber = parseInt(priceText);

            let currentValue = parseInt(quantityInput.value);
            if (!isNaN(currentValue) && currentValue > 1) {
                quantityInput.value = currentValue - 1;

                totalPrice.innerHTML = new Intl.NumberFormat('de-DE').format(priceNumber * quantityInput.value) + ' VND';
                fetch(`/menu/updateQuantity/${foodId}/${quantityInput.value}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            foodId: foodId,
                            quantity: quantityInput.value
                        })
                    })
                    .catch(error => {
                        console.error('Lỗi khi cập nhật', error);
                        alert("Lỗi kết nối, vui lòng thử lại.");
                    });
            } else {
                console.error('Số lượng không hợp lệ');
                alert("Số lượng không hợp lệ.");
            }
            updateTotalAmount();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const removeButtons = document.querySelectorAll('.remove-btn');

            removeButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();

                    const orderItemId = this.getAttribute('data-id');
                    if (!orderItemId) {
                        console.error("Item ID not found.");
                        return;
                    }

                    const itemDiv = document.querySelector(`#itemId-${orderItemId}`);
                    if (!itemDiv) {
                        console.error("Item div not found.");
                        return;
                    }

                    fetch(`/user/removeItem/${orderItemId}`, {
                            method: 'DELETE'
                        })
                        .then(response => {
                            if (response.ok) {
                                console.log('Mục đã được xóa thành công');
                                itemDiv.style.display = 'none';
                            } else {
                                return Promise.reject('Lỗi khi xóa: ' + response.statusText);
                            }
                        })
                        .catch(error => {
                            console.error('Have an error:', error);
                            alert("Có lỗi xảy ra, vui lòng thử lại sau.");
                        });
                    });
                });
            </script>
            <?php
            include_once("app/components/footer.php");
            ?>
</body>

</html>