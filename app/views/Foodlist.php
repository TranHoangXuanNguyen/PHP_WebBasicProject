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
            max-width: 335px;
        }
        .food-item img{
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            object-fit: cover;
            height: 300px; 
        }
        .food-item:hover {
            transform: scale(1.1); 
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .food-title{
            font-weight: bold;
            margin-bottom: 0px;
        
        }
        .food-title,.price{
            text-align: left;
            margin-left: 10px;
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

    </style>
</head>
<body>

        <div class="container py-5 menu-list">
            <!--  Ô tìm kiếm-->
             <div class="row mb-4 search-food">
                    <div class="input-wrapper search-box">
                        <input type="text" class="search-pd"placeholder="Search Product" name="search" >
                        <i class="fa fa-search research-icon"></i> <!-- Icon hình chìa khóa -->
                 </div>
             </div>
             <!--  -->
             <div class="row food-list">
                        <!-- Food Item 1 -->
                        <div class="col-md-4 mb-4 ">
                                <div class="card h-100 food-item">
                                    <img src="https://encrypted-tbn1.gstatic.com/images?q=tbn:ANd9GcTU2jj4SVOuplodXhMcbhOpSOgSgGGKV08QjfB6A8j7ATOc0kuA" class="card-img-top" alt="Beef Jerky">
                                    <div class="card-body food">
                                        <p class="food-title">Beef Jerky</p>
                                        <p class="price">30.000</p>
                                    </div>
                                </div>
                            </div>
                        <!-- Food Item 2 -->
                        <div class="col-md-4 mb-4">
                                <div class="card h-100 food-item">
                                    <img src="https://images.immediate.co.uk/production/volatile/sites/2/2024/05/GurdeepBacalhausaltCodFrittersSaffron-076-f07f1be.gif?quality=90&webp=true&resize=375,341" class="card-img-top" alt="Bread Pan">
                                    <div class="card-body food">
                                        <p class="food-title">Bread Pan</p>
                                        <p class="price">21.000</p>
                                    </div>
                                </div>
                            </div>
                        <!-- Food Item 3 -->
                        <div class="col-md-4 mb-4">
                                <div class="card h-100 food-item">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                <div class="card-body food">
                                        <p class="food-title">Bread Pan</p>
                                        <p class="price">21.000</p>
                                    </div>
                                </div>
                        </div>
                        <!-- Food Item 4 -->
                        <div class="col-md-4 mb-4">
                                <div class="card h-100 food-item">
                                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                    <div class="card-body food">
                                        <p class="food-title">Bread Pan</p>
                                        <p class="price">21.000</p>
                                    </div>
                                </div>
                        </div>
                 
                             <!-- Food Item 5 -->
                             <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                                </div>
                            <!-- Food Item 6-->
                            <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                            </div>
                            <!-- Food Item 7-->
                            <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                                </div>
                            <!-- Food Item 8-->
                            <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                                </div>
             
                            <!-- Food Item 9-->
                            <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                            </div>
                            <!-- Food Item 10-->
                            <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                                </div>
                            <!-- Food Item 11-->
                            <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                                </div>
                            <!-- Food Item 12-->
                            <div class="col-md-4 mb-4">
                                    <div class="card h-100 food-item">
                                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQA6ZyFcSW30W1KDFKgxlx6umg9H1qe_EIqcQ&s" class="card-img-top" alt="Bread Pan">
                                        <div class="card-body food">
                                            <p class="food-title">Bread Pan</p>
                                            <p class="price">21.000</p>
                                        </div>
                                    </div>
                                </div>
                            
            </div>

        </div>
       
<?php
  require_once("app/components/footer.php");
  ?>
</body>
</html>