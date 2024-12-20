<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    require_once(__DIR__ . '/../assets/css/aboutUs.css.php');
    ?>
</head>

<body id="body-aboutus">

<?php
    require_once("app/components/header.php");
    ?>
    <!-- Banner -->
    <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
        <img src="\app\assets\img\Shop List.png" alt="Menu Banner" class="w-100 h-100 banner-image">
        <h1 class="position-absolute text-light text-center banner-title">ABOUT US</h1>
    </div>

    <!-- Content -->
    <div class="container text-center">
            <div class="row aboutus">
                    <div class="col-6 about-foodimage">
                            <div class="row  image-grid">
                                    <div class="col-6 img1">
                                        <img src="<?php echo($foodItems[0]['image_url']) ?>" class="img-fluid imagefood1" alt="Food 1">
                                    </div>
                                    <div class="col-6 img1">
                                        <img src="<?php echo($foodItems[1]['image_url']) ?>" class="img-fluid imagefood2" alt="Food 2">
                                        <img src="<?php echo($foodItems[2]['image_url']) ?>" class="img-fluid imagefood3" alt="Food 3">
                                    </div>
                            </div>
                                
                        </div>
                    <div class="col-4 about-text">
                            <h6 style="color:orange">About Us</h6>
                            <h2 class="title-food"><strong>Food is an important part Of a balanced Diet</strong></h2>
                            <p class="intro-foodtitle">Welcome to our restaurant. Experience the familiar and cherished dishes that make every meal feel like a moment of togetherness.</p>
                            <h2 class="wh-question">Why Choose us</h2>
                            <div class="why-choose">
                                <button class="btn btn-warning show-button">Show More</button>
                                <div class="watch-video-button" >
                                        <i class="fa fa-play-circle" style="font-size:52px;color:orange; cursor: pointer;" id="watch-video"></i>
                                        <p>Watch Video</p>
                                </div>
                                <!-- Hiển thị Video -->
                                <div class="video-overlay" id="video-overlay" style="display: none;">
                                    <div class="video-popup">
                                        <button class="close-video" id="close-video">X</button>
                                        <iframe 
                                            width="100%" 
                                            height="315" 
                                            src="https://www.youtube.com/embed/XxMmFaZHQ4w?si=Y8yWv88vGtanqA2w" 
                                            title="YouTube video player" 
                                            frameborder="0" 
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>
                            </div>
                    </div>
            </div>

        <!-- Featured Image -->
        <div class="row mt-5">
            <div class="col hotfood-image">
                <img src="https://beptueu.vn/hinhanh/tintuc/top-15-hinh-anh-mon-an-ngon-viet-nam-khien-ban-khong-the-roi-mat-1.jpg" class="img-fluid w-100 rounded" alt="Featured Dish">
            </div>
        </div>

        <!-- Features Section -->
        <div class="row feature-icons mt-4 describe-text">
            <div class="col-md-4">
                <i class="fa-solid fa-user-graduate" style="font-size:28px"></i>
                <h5>Best Chef</h5>
                <p>With a team of experienced chefs, I believe the restaurant will bring you the most familiar flavors.</p>
            </div>
            <div class="col-md-4">
                <i class="fa-solid fa-mug-hot" style="font-size:28px"></i>
                <h5><?php echo($totalFoodItems); ?> Item Food</h5>
                <p>With the diverse menu at the restaurant, we believe it will meet all the needs of our customers.</p>
            </div>
            <div class="col-md-4">
                <i class="fa-solid fa-person" style="font-size:28px"></i>
                <h5>Clean Environment</h5>
                <p>Apart from the flavors, our restaurant pays great attention to food safety.</p>
            </div>
        </div>
    </div>

    <script>
            const watchVideoButton = document.getElementById("watch-video");
            const closeVideoButton = document.getElementById("close-video");
            const videoOverlay = document.getElementById("video-overlay");
            const bodyabouts=document.getElementById("body-aboutus");

            watchVideoButton.addEventListener("click", () => {
                videoOverlay.style.display = "block";
            });

            closeVideoButton.addEventListener("click", () => {
                videoOverlay.style.display = "none";
            });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    </div>
    <div class="mt-5">
    <?php
    include_once("app/components/footer.php");
    ?>
    </div>

</body>
</html>