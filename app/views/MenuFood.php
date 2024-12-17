<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
        .menufood-container {
            padding-left: 120px;
            padding-top: 50px;
        }

        .category {
            font-size: 24px;
            font-weight: bold;
        }

        .category a {
            text-decoration: none;
            color: black;
        }

        .category:hover a {
            color: #ff9f0d;
        }

        .item {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .price {
            font-size: 20px;
            text-align: right;
            color: #ff9f0d;
        }

        .row-content {
            padding: 8px 0px;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .image-container img {
            object-fit: contain;
            max-height: 300px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px;
        }

        .image-container:hover img {
            max-height: 320px;

        }

        .nameFood {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-top: 8px;
            gap: 20px;
        }

        .row-content {
            padding: 4px 0;
        }

        .row-content a {
            text-decoration: none;
            color: black
        }

        .row-content:hover a {
            color: #ff9f0d;
        }
    </style>
</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>
    <div class="menufood-container container">
        <!-- Row 1 -->
        <div class="row mb-5 ">
            <div class="col-sm-4 image-container">
                <img src="https://images.immediate.co.uk/production/volatile/sites/2/2024/05/GurdeepBacalhausaltCodFrittersSaffron-076-f07f1be.gif?quality=90&webp=true&resize=375,341" alt="Check Icon">
            </div>
            <div class="col-sm-6 ms-5">
                <div class="category"><a href="">STARTER MENU</a></div>
                <div class="nameFood">
                    <div class="row-content d-flex justify-content-between">
                        <div class="item"><a href="">Fish Cake Rolled In Green Rice</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Dumplings</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Grilled Spring Rolls</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Vegetable Salad</a></div>
                        <div class="price">$10</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row mb-5 ">
            <div class="col-sm-4 image-container">
                <img src="https://images.immediate.co.uk/production/volatile/sites/2/2024/05/GurdeepBacalhausaltCodFrittersSaffron-076-f07f1be.gif?quality=90&webp=true&resize=375,341" alt="Check Icon">
            </div>
            <div class="col-sm-6 ms-5">
                <div class="category"><a href="">MAIN COURSE</a></div>
                <div class="nameFood">
                    <div class="row-content d-flex justify-content-between">
                        <div class="item"><a href="">Fish Cake Rolled In Green Rice</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Dumplings</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Grilled Spring Rolls</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Vegetable Salad</a></div>
                        <div class="price">$10</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="row mb-5 ">
            <div class="col-sm-4 image-container">
                <img src="https://images.immediate.co.uk/production/volatile/sites/2/2024/05/GurdeepBacalhausaltCodFrittersSaffron-076-f07f1be.gif?quality=90&webp=true&resize=375,341" alt="Check Icon">
            </div>
            <div class="col-sm-6 ms-5">
                <div class="category"><a href="">DESSERT</a></div>
                <div class="nameFood">
                    <div class="row-content d-flex justify-content-between">
                        <div class="item"><a href="">Fish Cake Rolled In Green Rice</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Dumplings</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Grilled Spring Rolls</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Vegetable Salad</a></div>
                        <div class="price">$10</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row 4 -->
        <div class="row mb-5 ">
            <div class="col-sm-4 image-container">
                <img src="https://images.immediate.co.uk/production/volatile/sites/2/2024/05/GurdeepBacalhausaltCodFrittersSaffron-076-f07f1be.gif?quality=90&webp=true&resize=375,341" alt="Check Icon">
            </div>
            <div class="col-sm-6 ms-5">
                <div class="category"><a href="">DRINK MENU</a></div>
                <div class="nameFood">
                    <div class="row-content d-flex justify-content-between">
                        <div class="item"><a href="">Fish Cake Rolled In Green Rice</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Dumplings</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Grilled Spring Rolls</a></div>
                        <div class="price">$10</div>
                    </div>
                    <div class="row-content d-flex justify-content-between align-items-center">
                        <div class="item"><a href="">Vegetable Salad</a></div>
                        <div class="price">$10</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include_once("app/components/footer.php");
?>

</html>