<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MenuFood</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
     
        <?php
       require_once(__DIR__ . '/../assets/css/detailFood.css.php');
        ?>
    </head>

    <body>
        <?php
        require_once("app/components/header.php");
        ?>
        <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
            <img src="\app\assets\img\Shop List.png " alt="Menu Banner" class="w-100 h-100 banner-image">
            <h1 class="position-absolute text-light text-center banner-title">FOOD DETAIL</h1>
        </div>
        <div class="overdetail">
            <div class="detail-container container py-3 pt-4">
                <?php if (isset($fooddetail) && is_array($fooddetail) && !empty($fooddetail)): ?>
                    <div class="row">
                        <div class="col-md-6 text-center">
                            <img src="<?php echo $fooddetail['foodImg'] ?>"
                                alt=" Food Image" class="img-fluid rounded">
                        </div>
                        <div class="col-md-6">
                            <div class="food-name"><?php echo $fooddetail['foodName'] ?></div>
                            <div class="food-description">
                                <?php echo $fooddetail['detail'] ?>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                                <div class="price me-3"><?php echo $fooddetail['price'] ?></div>
                                <div class="quantity-buttons">
                                    <button class="btn-decrement" onclick="decrement()">-</button>
                                    <input id="quantity" value="1" min="1">
                                    <button class="btn-increment" onclick="increment()">+</button>
                                </div>
                            </div>
                            <div class="food-category mt-4">Category: <strong class="text-dark"><?php echo $fooddetail['categoryName'] ?></strong></div>
                            <button class="btn-add-to-cart mt-5">Add to cart</button>
                        </div>
                    </div>
                    <div class="description mt-5">
                        <div class="Desc-title">Description</div>
                        <div class="md-desc pt-2">
                            <?php echo $fooddetail['description'] ?>
                        </div>
</div>
                    <div class="food-relevant mt-5 mb-4">Relevant Food</div>
                    <div class="relevant-food">
                        <div class="row g-4">
                            <div class="col-md-4 col-sm-6 mb-4">
                                <a class="text-decoration-none" href="#">
                                    <img src="https://down-vn.img.susercontent.com/vn-11134513-7r98o-lsvbm31j10nt...s576x330" class="img-fluid rounded shadow-sm relevant-img" alt="Food Image 1">
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a class="text-decoration-none" href="#">
                                    <img src="https://down-vn.img.susercontent.com/vn-11134513-7r98o-lsvbm31j10nt...s576x330" class="img-fluid rounded shadow-sm relevant-img" alt="Food Image 2">
                                </a>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <a class="text-decoration-none" href="#">
                                    <img src="https://down-vn.img.susercontent.com/vn-11134513-7r98o-lsvbm31j10nt...s576x330" class="img-fluid rounded shadow-sm relevant-img" alt="Food Image 3">
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <script>
                function increment() {
                    let quantityInput = document.getElementById("quantity");
                    let currentValue = parseInt(quantityInput.value);
                    quantityInput.value = currentValue + 1;
                }

                function decrement() {
                    let quantityInput = document.getElementById("quantity");
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                }
            </script>
            <?php
            include_once("app/components/footer.php");
            ?>
    </body>

    </html>