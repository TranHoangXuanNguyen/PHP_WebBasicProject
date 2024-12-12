<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: arial;

        }

        .profile-contain {
            max-width: 1200px;
            margin: 20px auto;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
        }

        .pf-edit {
            box-shadow: 0 0 10px #f8f9fa;
        }

        .profile-header {
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 1px solid grey;

        }

        .profile-header img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .view,
        .edit {
            display: flex;
            right: 0;
            margin-left: auto;
        }

        .view:hover {
            color: orange;
            cursor: pointer;
        }

        .edit:hover {
            color: orange;
            cursor: pointer;
        }

        .profile {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .big-box {

            padding: 0px;

        }

        .text {
            width: 90px;
            margin-left: 10px;
        }

        .btn-save {
            background-color: #ff6600;
            color: white;
            margin-bottom: 15px;
        }

        .btn-save:hover {
            background-color: orange;
        }

        .view-profile {
            border-radius: 10px;
            font-size: 15px;
            color: black;
        }

        .px-5 {
            padding: 0px !important;
        }

        .header-vie {
            padding: 10px;
            margin-left: 350px;
        }

        .form {
            padding: 0px !important;
        }

        .pf-edit {
            display: none;
        }

        .view-profile {
            margin-top: 0px !important;
        }

        .sign-button:hover {
            background-color: orange;
            border: 1px solid white;
        }
    </style>
</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>
    <!-- Edit Profile -->
    <div class="container mt-5 profile-contain">
        <!-- Header -->
        <div class="profile-header">    
            <div class="d-flex align-items-center header-inf">
                <div class="img_upload">
                    <?php if (!empty($_SESSION['avataImg'])): ?>
                        <img src="<?php echo htmlspecialchars($_SESSION['avataImg']); ?>" alt="User Avatar">
                    <?php else: ?>
                        <img src="https://i.pinimg.com/236x/e6/60/85/e66085932a4b3b411854aff54574ecd6.jpg">
                    <?php endif; ?>
                </div>
                <div class="ms-3">
                    <h5 class="mb-0"><?php echo isset($_SESSION['fullName']) ? htmlspecialchars($_SESSION['fullName']) : ''; ?>" </h5>
                    <p class="text-muted mb-0"><?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" </p>
                </div>
            </div>
            <button class="btn btn-outline-secondary btn-md sign-button">Sign out</button>
        </div>

        <div class="row px-5 big-box edit-box">
            <div class="col-sm-7 form">
                <!-- Form -->
                <div class="pf-edit">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter your address">
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="dob">
                        </div>
                        <button type="submit" class="btn btn-save">Save</button>
                    </form>
                </div>
                <div class="container mt-5 view-profile">
                    <div class="row px-5 big-box ">
                        <div class="col-sm-7 form">
                            <h3>Personal information </h3>
                            <p><span>Full Name: <?php echo isset($_SESSION['fullName']) ? htmlspecialchars($_SESSION['fullName']) : ''; ?>" </span></p>
                            <p><span>Email: <?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?>" </span></p>
                            <p><span>Phone Number:<?php echo isset($_SESSION['phoneNum']) ? htmlspecialchars($_SESSION['phoneNum']) : ''; ?>" </span></p>
                            <p><span>Date of Birth<?php echo isset($_SESSION['dob']) ? htmlspecialchars($_SESSION['dob']) : ''; ?>" </span></p>
                            <p><span>Address: <?php echo isset($_SESSION['address']) ? htmlspecialchars($_SESSION['address']) : ''; ?>" </span></p>
                            <p><span></span></p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-sm-5">
                <div class="profile">
                    <div class="view">
                        <i style="font-size:24px;" class="fa">&#xf2be;</i>
                        <p class="text" id="viewBtn">View Profile</p>
                    </div>
                    <div class="edit">
                        <i class="fa-solid fa-pencil"></i>
                        <p class="text" id="editBtn"> Edit profile</p>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php
    include_once("app/components/footer.php");
    ?>


    <!-- View Profile -->


    <script>
        const viewBtn = document.getElementById("viewBtn");
        const editBtn = document.getElementById("editBtn");

        const viewSession = document.querySelector(".view-profile");
        const editSession = document.querySelector(".pf-edit");

        viewBtn.addEventListener("click", () => {
            viewSession.style.display = 'block';
            editSession.style.display = 'none';
        });

        editBtn.addEventListener("click", () => {
            viewSession.style.display = 'none';
            editSession.style.display = 'block';
        });
    </script>





</body>

</html>