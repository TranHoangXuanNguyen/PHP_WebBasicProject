<?php
require_once './app/assets/css/header.css.php';
require_once './app/assets/css/bootstrap.php';
?>
<!-- Navigation -->

<header>

    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/Home">
                <img src='./app/assets/img/logoFinal.png' alt="Logo" width="30" height="24" class="d-inline-block logo">

            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar1">
                    <ul class="navbar-nav ms-5 ps-5">
                        <li class="nav-item ">
                            <a class="nav-link active " aria-current="page" href="/Home">Home</a>
                        </li>
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
                            <a class="nav-link" href="/Menu">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Contact">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar2 ms-5">
                    <ul class="navbar-nav">
                        <?php
                        if (!isset($_SESSION['isLogin']) || $_SESSION['isLogin'] != 'true') {
                            echo '<li class="nav-item"><a class="nav-link" href="/Login"><i class="fa fa-user"></i></a></li>';
                        } else {
                            if (isset($_SESSION['role']) && $_SESSION['role'] != 'user') {
                                echo '<li class="nav-item"><a class="nav-link" href="/Profile"><i class="fa fa-user"></i></a></li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" href="/Admin"><i class="fa fa-user"></i></a></li>';
                            }
                        }
                        ?>

                        <li class="nav-item"><a class="nav-link" href=""><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

</header>