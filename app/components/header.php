<!-- code base -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/header.css">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="/Home">
                    <img src="../assets/img/logoFinal.png" alt="Logo" width="30" height="24" class="d-inline-block logo">
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <div class=navbar1>
                        <ul class="navbar-nav ms-5 ps-5">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/Home">Home</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a class="nav-link" href="#">
                                <Menu></Menu>
                            </a>
                        </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="/Blog">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Booking">Booking</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/About">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Shop">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/Contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="navbar2 ms-5">
                        <ul class="navbar-nav">
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-user"></i></a></li>
                            <li class="nav-item"><a class="nav-link" href="#"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Banner -->
    <!-- <div class="banner-container bg-dark">


        <script>
            const slider = document.querySelector('.slider');
            const items = document.querySelectorAll('.item');
            let index = 0;

            document.querySelector('.prev').addEventListener('click', () => {
                index = (index > 0) ? index - 1 : items.length - 1;
                slider.style.transform = `translateX(-${index * 100}%)`;
            });

            document.querySelector('.next').addEventListener('click', () => {
                index = (index < items.length - 1) ? index + 1 : 0;
                slider.style.transform = `translateX(-${index * 100}%)`;
            });
        </script> -->
</body>

</html>