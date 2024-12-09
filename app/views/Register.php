<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!-- Bootstrap Core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <link rel="stylesheet" href="/app/assets/css/Register.css">
</head>
<body>
    <div class="fluid-container">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6" id="layout">
                <div class="text-center mb-0>
                    <h4 class="text-black"><strong>Welcome to</strong></h4>
                    <h4 class="text-warning"><strong>MaMa's Kitchen</strong></h4>
                </div>
                <form action="register-back.php" method="POST">
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user-circle"></i></span>
                            <input type="text" class="form-control" name="fullname" placeholder="Enter your full name" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-phone"></i></span>
                            <input type="text" class="form-control" name="phone" placeholder="Enter your phone number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength="9" maxlength="11" required />
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="password" placeholder="Enter your password" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock"></i></span>
                            <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm password" required />
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                            <input type="date" class="form-control" name="dob" placeholder="Enter your birth date" required />
                        </div>
                    </div>

                    <div class="mb-3 text-center">
                        <div class="input-group">
                            <button type="button" class="btn btn-google btn-lg w-100">
                                <img src="/app/assets/img/Logogg.png" alt="Google Logo" width="20"> Sign up with Google
                            </button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <button type="submit" class="btn btn-warning btn-lg w-100">Sign up</button>
                        </div>
                    </div>


                    <div class="text-center text-final">
                        Already have an account? <a href="#">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>