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
        <img src="\app\assets\img\Shop List.png" alt="Menu Banner" class="w-100 h-100 banner-image">
        <h1 class="position-absolute text-light text-center banner-title">FOOD DETAIL</h1>
    </div>
    <div class="overdetail">
        <div class="detail-container container py-3 pt-4">
            <?php if (isset($fooddetail) && is_array($fooddetail) && !empty($fooddetail)) : ?>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <img src="<?php echo htmlspecialchars($fooddetail['foodImg']); ?>" alt="Food Image" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <div class="food-name"><?php echo htmlspecialchars($fooddetail['foodName']); ?></div>
                        <div class="food-description">
                            <?php echo htmlspecialchars($fooddetail['detail']); ?>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                            <div class="price me-3"><?php echo htmlspecialchars($fooddetail['price']); ?> VNĐ</div>
                            <div class="quantity-buttons">
                                <button class="btn-decrement" onclick="decrement()">-</button>
                                <input id="quantity" type="text" value="1" readonly>
                                <button class="btn-increment" onclick="increment()">+</button>
                            </div>
                        </div>
                        <div class="food-category mt-4">Category: <strong class="text-dark"><?php echo htmlspecialchars($fooddetail['categoryName']); ?></strong></div>
                        <button class="btn-add-to-cart mt-4">Add to cart</button>
                    </div>
                </div>
                <div class="description mt-5">
                    <div class="Desc-title">Description</div>
                    <div class="md-desc pt-2">
                        <?php echo htmlspecialchars($fooddetail['description']); ?>
                    </div>
                </div>
                <div class="food-relevant mt-5 mb-4">Relevant Food</div>
                <div class="relevant-food">
                    <?php if (!empty($relevantfood)) : ?>
                        <div class="row g-4">
                            <?php foreach ($relevantfood as $relevantitem): ?>
                                <div class="col-md-4 mb-3">
                                    <div class="card food-item">
                                        <img src="<?php echo $relevantitem['foodImg']; ?>" class="img-fluid rounded relevant-img" alt="Food Image">
                                        <div class="card-body">
                                            <a href=<?php echo '/detail/show/' . $relevantitem['foodId'] ?> class="food-title text-decoration-none text-dark"><?php echo $relevantitem['foodName']; ?></a>
                                            <a href=<?php echo '/detail/show/' . $relevantitem['foodId'] ?> class="price text-decoration-none ms-5"><?php echo $relevantitem['price']; ?> VNĐ</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
    </div>
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