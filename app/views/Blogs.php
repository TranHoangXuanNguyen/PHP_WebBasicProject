<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
</head>
    <?php
    require_once(__DIR__ . '/../assets/css/blog.css.php');
    ?>
<body>
    <?php
    require_once("app/components/header.php");
    ?>

    <!-- Menu Banner -->
    <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
        <img src="\app\assets\img\Shop List.png" alt="Blog Banner" class="banner-image">
        <h1 class="position-absolute text-light text-center">Blogs</h1>
    </div>

    <div class="blogs" id="rss-feed">
        <!-- Featured Blog Section -->
        <div class="first-content row mb-4">
            <div class="col-md-6">
                <div class="">
                    <div class="lg-image">
                        <img src="https://pinchofyum.com/wp-content/uploads/SOS-Fall-2024-Intro-Post-Featured.jpg" alt="Featured Blog">
                    </div>
                    <div class="text">
                        <div class="datetime">Jan 1, 2025</div>
                        <div class="blog-title"><a href="" title="Click here to read more">Welcome to the Mama's kitchen Series</a></div>
                        <div class="subcontent">
                        What do you do when you need to make dinner, but you have a million other things that are dinging, pulling at you, and driving you bonkers? We’ve got you covered with easy, low-stress recipes that are a lifeline on busy nights.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row g-4">
                    <div class="d-flex">
                        <div class="sm-image">
                            <img src="https://pinchofyum.com/wp-content/uploads/July-Coffee-Date-1-6-1200x1200.jpg" alt="Blog Post">
                        </div>
                        <div class="text ms-3">
                            <div class="datetime">July 29, 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/how-you-should-be-doing-oat-bran-for-breakfast" title="Click here to read more">14 Things I Bought For Summer That I Can’t Live Without</a></div>
                            <div class="subcontent">
                            High protein, high fiber – I love this oat bran for breakfast! Creamy and soothing + quick and easy to make!
                            </div>
                        </div>
                    </div>
                    <div class=" d-flex">
                        <div class="sm-image">
                            <img src="https://pinchofyum.com/wp-content/uploads/Pickled-Onions-Square.png" alt="Blog Post">
                        </div>
                        <div class="text ms-3">
                            <div class="datetime">April 3, 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/33-things-you-absolutely-need-to-be-buying-at-trader-joes" title="Click here to read more">My Go-To Pickled Red Onions</a></div>
                            <div class="subcontent">
                            From drinks, to snacks, to dinner hacks, sauces, and everything in-between – these are the products I love right now at Trader Joe’s!
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
                    <img src="https://pinchofyum.com/wp-content/uploads/Summer-Recipe-Bingo-Recap-Image-02-1200x1200.jpg" alt="Middle Blog">
                </div>
            </div>
            <div class="col-md-6">
                <div class="text d-flex flex-column justify-content-between">
                    <div class="datetime">Jan 1, 2024</div>
                    <div class="blog-title"><a href="https://pinchofyum.com/5-reasons-i-love-this-healthy-nonstick-ceramic-cookware" title="Click here to read more">Summer Recipe Bingo: Recap 2024</a></div>
                    <div class="sub-content">
                    Say hello to my favorite healthy nonstick cookware! This Basalt Ceramic Nonstick Cookware is my go-to. PFAS-free, made in the USA, and super versatile!</div>
                </div>
            </div>
        </div>

        <!-- All Blogs Section -->
        <h3 class="mt-5 mb-4 fw-bold">All Blog Posts</h3>
        <div class="last-content row g-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://pinchofyum.com/wp-content/uploads/Tomato-Soup-3-1-960x1437.jpg" alt="Blog Post">
                        </div>
                        <div class="text">
                            <div class="datetime">Oct 23, 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/5-ingredient-tomato-soup" title="Click here to read more" class="text-decoration-none ">5 Ingredient Tomato Soup</a></div>
                            <div class="subcontent">
                            A simple 5 ingredient tomato soup made with butter, onion, and canned San Marzano tomatoes. Based on the Marcella Hazan tomato sauce recipe. This hits the cozy vibes just right.                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://pinchofyum.com/wp-content/uploads/Really-Good-Non-Alcoholic-Margarita-Square.png" alt="Blog Post">
                        </div>
                        <div class="text">
                            <div class="datetime">Dec 30, 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/my-go-to-pickled-red-onions" title="Click here to read more" class="text-decoration-none ">My Go-To Pickled Red Onions</a></div>
                            <div class="subcontent">
                            This is my go-to method for making pickled red onions! Takes 5 minutes and no heating necessary.</div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://pinchofyum.com/wp-content/uploads/Garlic-Shrimp-and-Tomatoes-Square.png" alt="Blog Post">
                        </div>
                        <div class="text">
                            <div class="datetime">Aug 1, 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/garlic-shrimp-and-tomatoes-on-parmesan-orzo" title="Click here to read more" class="text-decoration-none ">Garlic Shrimp and Tomatoes with Parmesan Orzo</a></div>
                            <div class="subcontent">
                            That’s a wrap on our first-ever Summer Recipe Bingo! Check out this list for a recap of all the fun and a list of our winners.                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://pinchofyum.com/wp-content/uploads/Basil-Sauce-Square.png" alt="Blog Post">
                        </div>
                        <div class="text">
                            <div class="datetime">Jul 31, 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/very-incredible-basil-sauce" title="Click here to read more" class="text-decoration-none ">Very Incredible Basil Sauce</a></div>
                            <div class="subcontent">
                            Punchy, salty, bright green sauce packed with fresh basil, chives, garlic, and a bit of oregano. This sauce can be poured out just about anything!                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://pinchofyum.com/wp-content/uploads/Salmon-with-Basil-Sauce-Square-1.png" alt="Blog Post">
                        </div>
                        <div class="text">
                            <div class="datetime">June 26, 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/salmon-with-basil-sauce-and-tomato-salad" title="Click here to read more" class="text-decoration-none ">Salmon with Basil Sauce and Tomato Salad</a></div>
                            <div class="subcontent">
                            We’re making a summery salmon with a beautiful, big-flavored basil sauce that is so good, you’re going to want to just drink it. Perfectly-spiced, fresh, and a dinner for everyone!                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="image">
                            <img src="https://pinchofyum.com/wp-content/uploads/Trader-Joes-Sun-Dried-Tomato-Focaccia-Turkey-Sandwich-Square.png" alt="Blog Post">
                        </div>
                        <div class="text">
                            <div class="datetime">Sunday, 1 Jan 2024</div>
                            <div class="blog-title"><a href="https://pinchofyum.com/14-things-i-bought-for-summer-that-i-cant-live-without" title="Click here to read more" class="text-decoration-none ">Trader Joe’s Sun-Dried Tomato Focaccia Turkey Sandwich
                            </a></div>
                            <div class="subcontent">
                            Let’s go on a summer shopping spree! These are the 14 things I now cannot live without for summer and I’m excited to tell you about them.</div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <?php
    include_once("app/components/footer.php");
    ?>
</body>

</html>