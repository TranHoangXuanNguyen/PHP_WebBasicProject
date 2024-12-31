<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .menu-banner {
            position: relative;
            width: 100%;
            height: 50vh;
            margin-bottom: 20px;
        }

        .menu-banner img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .menu-banner h1 {
            font-size: 3rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .blogs {
            width: 100%;
            padding: 30px;
        }

        .middle-content {
            display: flex !important;
        }

        .image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover img {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }


        .first-content .lg-image img {
            width: 590px;
            height: 300px;

        }

        .first-content .sm-image img {
            width: 300px;
            height: 200px;

        }

        .middle-content .lg-image img {
            width: 590px;
            height: 300px;

        }

        .first-content.text {
            width: 300px;
        }

        .card {
            border: none1px solid grey;
            margin-bottom: 20px;
        }
        .blog-title a {
            font-size: 1.25rem;
            color: rgb(248, 136, 7);
            margin-top: 10px;
            text-decoration: none;
        }

        .subcontent {
            font-size: 1rem;
            margin-top: 5px;
            text-align: left;
        }

        .text .datetime {
            font-size: 0.85rem;
            color: #6c757d;
            margin: 10px;
        }

        .first-content .text,
        .middle-content .text {
            padding: 10px 0;
        }

        .last-content .image img {
            height: 180px;
        }

        .last-content .blog-title {
            font-size: 18px;
            margin: 10px;
        }

        .last-content .subcontent {
            font-size: 16px;
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>

    <!-- Menu Banner -->
    <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
        <img src="\app\assets\img\Shop List.png" alt="Blog Banner" class="banner-image">
        <h1 class="position-absolute text-light text-center">Blogs</h1>
    </div>

    <div class="blogs" id="rss-feed" >
        <!-- Featured Blog Section -->
        <div class="first-content row mb-4">
            <div class="col-md-6">
                <div class="">
                    <div class="lg-image">
                        <img src="https://img.pikbest.com/origin/09/19/03/61zpIkbEsTGjk.jpg!w700wp" alt="Featured Blog">
                    </div>
                    <div class="text">
                        <div class="datetime">Sunday, 1 Jan 2024</div>
                        <div class="blog-title"><a href="" title="Click here to read more">Flavors of Home: Authentic Taste in Every Dish</a></div>
                        <div class="subcontent">
                            Rediscover the essence of home cooking with timeless recipes. Each dish tells a story of love and tradition.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-4">
                    <div class="d-flex">
                        <div class="sm-image">
                            <img src="https://img.pikbest.com/origin/09/19/03/61zpIkbEsTGjk.jpg!w700wp" alt="Blog Post">
                        </div>
                        <div class="text ms-3">
                            <div class="datetime">Sunday, 1 Jan 2024</div>
                            <div class="blog-title"><a href="" title="Click here to read more">Quick Recipes for a Busy Life</a></div>
                            <div class="subcontent">
                                Simplify your meals without compromising flavor. Perfect for busy weekdays.
                            </div>
                        </div>
                    </div>
                    <div class=" d-flex">
                        <div class="sm-image">
                            <img src="https://img.pikbest.com/origin/09/19/03/61zpIkbEsTGjk.jpg!w700wp" alt="Blog Post">
                        </div>
                        <div class="text ms-3">
                            <div class="datetime">Sunday, 1 Jan 2024</div>
                            <div class="blog-title"><a href="" title="Click here to read more">Healthy Meals for the Family</a></div>
                            <div class="subcontent">
                                Nourishing recipes to keep your family happy and healthy.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Middle Blog Section -->
        <div class="middle-content d-flex row g-4">
            <div class="col-md-6">
                <div class="lg-image">
                    <img src="https://img.pikbest.com/origin/09/19/03/61zpIkbEsTGjk.jpg!w700wp" alt="Middle Blog">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text d-flex flex-column justify-content-between">
                    <div class="datetime">Sunday, 1 Jan 2024</div>
                    <div class="blog-title"><a href=""title="Click here to read more">Seasonal Delights: Taste the Freshness</a></div>
                    <div class="subcontent">
                        Discover the joy of cooking with simple yet flavorful recipes perfect for your busy days.
                        These easy-to-follow dishes use everyday ingredients to create meals the whole family will love.
                        From quick breakfasts to hearty dinners, transform your kitchen into a hub of delicious creativity.
                        Save time and enjoy stress-free cooking without compromising on taste! </div>
                </div>
            </div>
        </div>

        <!-- All Blogs Section -->
        <h3 class="mt-5 mb-4 fw-bold">All Blog Posts</h3>
        <div class="last-content row g-4">
            <?php for ($i = 0; $i < 6; $i++) { ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://img.pikbest.com/origin/09/19/03/61zpIkbEsTGjk.jpg!w700wp" alt="Blog Post">
                        </div>
                        <div class="text">
                            <div class="datetime">Sunday, 1 Jan 2024</div>
                            <div class="blog-title"><a href="#" title="Click here to read more" class="text-decoration-none ">Flavors of Home: Authentic Taste in Every Dish</a></div>
                            <div class="subcontent">
                                Rediscover the essence of home cooking with timeless recipes. Each dish tells a story of love and tradition.
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script>
       fetch('')
       .then(response =>{
        return réponse . json()
        console.log(' >>> check data: ', data1)
       })
       .then (data =>{
        console.log(' >>> check data: ', data)
       })
    </script>

    <?php
    include_once("app/components/footer.php");
    ?>
</body>

</html>