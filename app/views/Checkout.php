<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Out</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    require_once(__DIR__ . '/../assets/css/checkout.css.php');
    ?>
</head>

<body>

    <?php
    require_once("app/components/header.php");
    ?>

    <!-- Banner -->
    <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
        <img src="\app\assets\img\Shop List.png" alt="Menu Banner" class="w-100 h-100 banner-image">
        <h1 class="position-absolute text-light text-center banner-title">CHECK OUT</h1>
    </div>

    <div class="container mt-5">
        <div class="row">
            <!-- Shipping Address -->
            <div class="col-md-6">
                <h4 style="margin-bottom:15px"><strong>Shipping Address</strong></h4>
                <form>
                    <div class="mb-3">
                        <label for="fullName" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="fullName" placeholder="Enter your name">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" placeholder="Enter your address">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter your phone number">
                    </div>
                    <button type="button" class="btn btn-warning payment-button" style="background-color:orange; color:white;"><i class="fa-solid fa-arrow-left"></i> Back to cart</button>
                </form>
            </div>

            <!-- Order Summary -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <!-- Item List -->
                        <?php if (isset($items) && is_array($items) && !empty($items)) : ?>
                            <?php foreach ($items as $order): ?>
                                <div class="card-food d-flex mb-3">
                                    <img src="<?php echo  $order['foodImg']; ?>" class="foodselect" alt="Food Image" style="width: 80px; height: 80px; object-fit: cover; margin-right: 15px;">
                                    <div class="card-body food-order">
                                        <h6 class="card-title" style="font-weight:bold;"><?php echo $order['foodName']; ?></h6>
                                        <p class="card-text orderprice"><small class="text-body-secondary"><?php echo number_format($order['price'], 0, ',', '.'); ?> VNĐ</small></p>
                                        <p class="card-text orderquantity"><small class="text-body-secondary">Quantity: <?php echo  $order['quantity'] ?></small></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <span>Sub-total</span>
                                <span><?php echo number_format($subtotal, 0, ',', '.'); ?> VNĐ</span>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <span>Payment Method</span>
                                <select class="form-select payment-method" id="payment-method">
                                    <option value="1">COD</option>
                                    <option value="2">MOMO</option>
                                </select>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong><?php echo number_format($subtotal, 0, ',', '.'); ?></strong>
                            </div>
                            <button class="btn btn-warning w-100 mt-3" style="background-color:orange; color:white " id="place-order">Place an order <i class="fa-solid fa-arrow-right"></i></button>
                        <?php else: ?>
                            <p>No items in the cart.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    </div>

    <div class="mt-5">
        <?php
        include_once("app/components/footer.php");
        ?>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let paymentMethod = '1';

            document.getElementById('payment-method').addEventListener('change', function() {
                paymentMethod = this.value;
                if (paymentMethod === '1') {
                    alert('Bạn đã chọn phương thức thanh toán COD.');
                } else if (paymentMethod === '2') {
                    alert('Bạn đã chọn phương thức thanh toán MOMO.');
                }
            });

            document.getElementById('place-order').addEventListener('click', function() {
                if (paymentMethod === '1') {
                    window.location.href = '/user/confirmOrder';
                } else if (paymentMethod === '2') {
                    window.location.href = '/user/confirm_momo';
                }
            });
        });
    </script>
</body>

</html>