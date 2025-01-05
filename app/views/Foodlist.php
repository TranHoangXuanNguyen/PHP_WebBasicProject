<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu</title>
    <!-- Link CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            /* font-family:Arial, Helvetica, sans-serif; */
        }

        .search-food {
            display: flex;
            justify-content: flex-end;
        }

        .search-pd {
            border-right: 0px;
            border-radius: 3px;

        }

        .search-box {
            position: relative;
            display: flex;
            align-items: center;
            margin: 1px 11px;
        }

        .search-box i {
            text-align: center;
        }

        .search-box input {
            height: 35px;
            padding-left: 70px;
            /* Chừa khoảng trống để không bị icon che */
            border: 1px solid #DDDD;
            border-radius: 5px;
            /* Góc bo tròn bên phải */
            text-align: left;
            background-color: #fdf0da;
        }

        .research-icon {
            width: 35px;
            height: 35px;
            background-color: orange;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: absolute;
            right: 0px;
            /* Icon sát mép trái */
            border-radius: 0px 5px 5px 0px;
            border: none;
        }

        .food-item {
            border: none !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-radius: 10px;
            /* max-width: 335px; */
            min-height: 420px;
        }

        .food-item img {
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            object-fit: cover;
            height: 300px;
        }

        .food-item:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }

        .food-title {
            font-weight: bold;
            margin-bottom: 0px;

        }

        .food-title,
        .price {
            text-align: left;
            margin-left: 10px;
            display: block;
            /* text-decoration: none; */
        }

        .food-title:hover {
            color: black !important;
            text-decoration: none;
        }

        .price {
            color: #FF9F0D;
            margin-top: 0px;
        }

        .food {
            border: none !important;
            padding: 0px;
            margin-top: 10px;
            text-align: center;
            margin-bottom: 15px;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 2.5rem !important;
        }

        .price:hover {
            color: #FF9F0D !important;
            text-decoration: none !important;
        }

        .search {
            margin-top: 40px !important;
        }
   
    .pagination {
    display: flex;
    justify-content: center; 
    list-style: none; 
    padding: 0;
    margin: 0;
}

.page-item {
    margin: 0 5px; 
}

.page-link {
    display: inline-block;
    color: white; 
    background-color: orange;
    padding: 10px 15px; 
    border: 1px solid orange; 
    border-radius: 5px; 
    font-size: 16px; 
}

.page-link:hover {
    background-color: darkorange; 
    color:white;
}
.page-item.disabled .page-link {
    cursor: not-allowed; 
}


    </style>
</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>
    <div class="container py-5">
        <!-- Ô tìm kiếm -->
        <div class="row mb-4 search-food">
            <div class="search-box">
                <form action="/menu/search" class="search-box" method="GET">
                    <input type="text" placeholder="Search Product..." name="search" required>
                    <button type="submit" class="research-icon">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

            </div>
            <!-- Hiển thị sản phẩm tìm kiếm -->
            <div class="search">
                <?php if (!empty($foodSearch)): ?>
                    <div class="row">
                        <?php foreach ($foodSearch as $food): ?>
                            <div class="col-md-4 mb-4">
                                <div class="card food-item">
                                    <img src="<?php echo $food['foodImg']; ?>" class="card-img-top" alt="Food Image">
                                    <div class="card-body">
                                        <a href="/menu/show/<?php echo $food['foodId']; ?>" class="food-title">
                                            <?php echo $food['foodName']; ?>
                                        </a>
                                        <a href="/menu/show/<?php echo $food['foodId']; ?>" class="price">
                                            <?php echo number_format($food['price'], 0, ',', '.'); ?> VNĐ
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php elseif (!empty($message)): ?>
                    <p class="text-center"><?php echo $message; ?></p>
                <?php endif; ?>

            </div>

        </div>
        <!-- Hiển thị tất cả sản phẩm có trong menu-->
        <?php if (!empty($data['items'])): ?>
            <div class="row">
                <?php foreach ($data['items'] as $food): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card food-item">
                            <img src="<?php echo $food['foodImg']; ?>" class="card-img-top" alt="Food Image">
                            <div class="card-body">
                                <a href="<?php echo  "/menu/show/" . $food['foodId'] ?>" class="food-title"><?php echo $food['foodName']; ?></a>
                                <a href="<?php echo  "/menu/show/" . $food['foodId'] ?>" class="price"><?php echo number_format($food['price'], 0, ',', '.'); ?> VNĐ</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($totalPages) && $totalPages > 0): ?>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <!-- Nút Previous -->
            <li class="page-item <?= $currentPage <= 1 ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $currentPage - 1 ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <!-- Các số trang -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php endfor; ?>

            <!-- Nút Next -->
            <li class="page-item <?= $currentPage >= $totalPages ? 'disabled' : '' ?>">
                <a class="page-link" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
<?php else: ?>
    <p>No data available for pagination.</p>
<?php endif; ?>


    </div>
    <?php
    require_once("app/components/footer.php");
    ?>
</body>

</html>