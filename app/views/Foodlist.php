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
        body{
            /* font-family:Arial, Helvetica, sans-serif; */
        }
        .search-food{
            display:flex;
            justify-content:flex-end;
        }
        .search-pd{
            border-right: 0px;
            border-radius: 3px;
            
        }
        .search-box{
            position: relative;
            display: flex;
            align-items: center; /* Căn giữa icon và input theo chiều dọc */
            margin: 1px 11px;
        }
        
        .search-box input {
            height: 35px;
            padding-left: 70px; /* Chừa khoảng trống để không bị icon che */
            border:1px solid #DDDD;
            border-radius: 5px; /* Góc bo tròn bên phải */
            text-align: left;
            background-color: #fdf0da;
            }
        .research-icon{
            width: 35px;
            height: 35px;
            background-color: orange;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: absolute;
            right: 0px; /* Icon sát mép trái */
            border-radius: 0px 5px 5px 0px;
        }
        .food-item{
            border:none !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            border-radius: 10px;
            /* max-width: 335px; */
            min-height: 420px;
        }
        .food-item img{
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            object-fit: cover;
            height: 300px; 
        }
        .food-item:hover {
            transform: scale(1.05); 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .food-title{
            font-weight: bold;
            margin-bottom: 0px;
        
        }
        .food-title,.price{
            text-align: left;
            margin-left: 10px;
            display: block;
            /* text-decoration: none; */
        }
        .food-title:hover{
            color:black !important;
            text-decoration: none;
        }
        .price{
            color:#FF9F0D;
            margin-top: 0px;
        }
        .food{
            border:none !important;
            padding:0px;
            margin-top: 10px;
            text-align: center;
            margin-bottom: 15px;
        }
        .mb-4, .my-4 {
            margin-bottom: 2.5rem !important;
        }
        .price:hover{
            color:#FF9F0D !important;
            text-decoration: none !important;
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
                <input type="text" placeholder="Search Product..." name="search">
                <i class="fa fa-search research-icon"></i>
            </div>
        </div>
        
        <?php if (!empty($data['items'])): ?>
            <div class="row">
                <?php foreach ($data['items'] as $food): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card food-item">
                            <img src="<?php echo $food['foodImg']; ?>" class="card-img-top" alt="Food Image">
                            <div class="card-body">
                                <a href=<?php echo '/detail/show/' . $food['foodId'] ?> class="food-title"><?php echo $food['foodName']; ?></a>
                                <a href=<?php echo '/detail/show/' . $food['foodId'] ?> class="price"><?php echo $food['price']; ?> VNĐ</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="text-center">Không có món ăn nào được tìm thấy.</p>
        <?php endif; ?>
    </div>
    <?php
  require_once("app/components/footer.php");
  ?>
</body>
</html>