<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="./app/assets/css/log-in.css">
    <title>Log in</title>
</head>
<body>
    <div class="container">
            <h1>Hi</h1>
            <h2 style="color:orange">Welcome back!</h2>
            <form action="/Login" method="POST">
                    
            <?php    
                    // Hiển thị thông báo lỗi (nếu có)
                    if (!empty($_SESSION['error_message'])) {
                        echo "<div class=message><p>" . $_SESSION['error_message'] . "</p></div>";
                        unset($_SESSION['error_message']); 
                    }
                  
                    ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                <div class="input-wrapper">
                                    <i class="fa fa-envelope email-icon"></i>
                                    <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" placeholder="Enter your email" name="email" required>

                                </div>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <div class="input-wrapper">
                                <i class="fas fa-key key-icon"></i> <!-- Icon hình chìa khóa -->
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your password" name="passWord" required>
                                <!-- <i  class='fas eyse-icon'>&#xf070;</i> -->
                        </div>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-login" name="login">Log in</button>
           

             
                    <hr>
                    <button type="button" class="btn btn-outline-danger social-login-btn posisionrelative"><img class="_icon_1fnot_21" src="data:image/svg+xml,%3csvg%20width='20b'%20height='25'%20viewBox='0%200%2018%2018'%20xmlns='http://www.w3.org/2000/svg'%3e%3cg%20transform=''%3e%3cg%20fill-rule='evenodd'%3e%3cpath%20d='m17.64%209.2a10.341%2010.341%200%200%200%20-.164-1.841h-8.476v3.481h4.844a4.14%204.14%200%200%201%20-1.8%202.716v2.264h2.909a8.777%208.777%200%200%200%202.687-6.62z'%20fill='%234285f4'/%3e%3cpath%20d='m9%2018a8.592%208.592%200%200%200%205.956-2.18l-2.909-2.258a5.43%205.43%200%200%201%20-8.083-2.852h-3.007v2.332a9%209%200%200%200%208.043%204.958z'%20fill='%2334a853'/%3e%3cpath%20d='m3.964%2010.71a5.321%205.321%200%200%201%200-3.42v-2.332h-3.007a9.011%209.011%200%200%200%200%208.084z'%20fill='%23fbbc05'/%3e%3cpath%20d='m9%203.58a4.862%204.862%200%200%201%203.44%201.346l2.581-2.581a8.649%208.649%200%200%200%20-6.021-2.345%209%209%200%200%200%20-8.043%204.958l3.007%202.332a5.364%205.364%200%200%201%205.036-3.71z'%20fill='%23ea4335'/%3e%3c/g%3e%3cpath%20d='m0%200h18v18h-18z'%20fill='none'/%3e%3c/g%3e%3c/svg%3e">
                    Login with Google</button>
                    
                    <button type="button" class="btn btn-outline-primary social-login-btn posisionrelative"><img class="_icon_1fnot_21" src="data:image/svg+xml,%3csvg%20width='23'%20height='25'%20viewBox='0%200%2018%2018'%20xmlns='http://www.w3.org/2000/svg'%3e%3cpath%20d='m17.007%200h-16.014a.993.993%200%200%200%20-.993.993v16.014a.993.993%200%200%200%20.993.993h8.628v-6.961h-2.343v-2.725h2.343v-2a3.274%203.274%200%200%201%203.494-3.591%2019.925%2019.925%200%200%201%202.092.106v2.43h-1.428c-1.13%200-1.35.534-1.35%201.322v1.73h2.7l-.351%202.725h-2.364v6.964h4.593a.993.993%200%200%200%20.993-.993v-16.014a.993.993%200%200%200%20-.993-.993z'%20fill='%234267b2'%20/%3e%3cpath%20d='m28.586%2024.041v-6.961h2.349l.351-2.725h-2.7v-1.734c0-.788.22-1.322%201.35-1.322h1.443v-2.434a19.924%2019.924%200%200%200%20-2.095-.106%203.27%203.27%200%200%200%20-3.491%203.591v2h-2.343v2.73h2.343v6.961z'%20fill='%23fff'%20transform='translate(-16.172%20-6.041)'%20/%3e%3c/svg%3e">Login with Facebook</button>
                    <div class="footer-text">
                           <p>Don't have an account? <a href="#">Sign Up</a></p>
                    </div>
            </form>
                
    </div>
    
</body>
</html>