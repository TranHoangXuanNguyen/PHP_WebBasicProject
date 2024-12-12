<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" >
        <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family:arial;
            /* background-color: #f8f9fa; */
        }
        .pf-edit{
            /* display:none; */
            box-shadow: 0 0 10px #f8f9fa;
             /* background-color: #f8f9fa; */
        }
        .profile-header {
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 1px solid grey;
            /* box-shadow: 0 0 10px #F5E1BD; */
        }
        .profile-header img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .view, .edit{
            display: flex;
            right: 0;
            margin-left: auto;     
           }
           .view:hover{
            color:orange;
           }
           .edit:hover{
            color:orange;
           }
        .profile{
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }
        .big-box{

            padding:0px;

        }
        .text{
            width:90px;
            margin-left: 10px;
        }

        .btn-save {
            background-color: #ff6600;
            color: white;
            margin-bottom: 15px;
        }
        .btn-save:hover {
            background-color: #cc5200;
        } 


        /* View Profile */
        .view-profile {
            /* background-color: #f8f9fa; */
            border-radius: 10px;
            /* box-shadow: 0 0 7px #F5E1BD; */
            font-size: 15px;
            color:black;
            

        }
        .profile-header_view{
            /* background-color: #f8f9fa; */
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
            border-bottom: 1px solid grey; 
            box-shadow: 0 0 10px #F9F4EE;
        }
        .header-vie img{
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-left: 30px;
            border:2px solid #DFA8A4;
        }
        .header-vie {
            padding:10px;
            margin-left: 350px;
      
        }
        
        
    </style>
</head>
<body>
    <!-- Edit Profile -->
    <div class="container mt-5 pf-edit">
            <!-- Header -->
            <div class="profile-header">
                <div class="d-flex align-items-center header-inf">
                    <img src="https://i.pinimg.com/736x/c0/b2/6b/c0b26bc673d7e709a42b87f96268bf32.jpg" alt="Profile Picture">
                    <div class="ms-3">
                        <h5 class="mb-0">Hồ Thị Duyên Hà</h5>
                        <p class="text-muted mb-0" >hothiduyenha2005@gmail.com</p>
                    </div>
                </div>
                <button class="btn btn-outline-secondary btn-md">Sign out</button>
            </div>

            <div class="row px-5 big-box " style="padding:0px">
                <div class="col-sm-7">
                            <!-- Form -->
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
        
                <div class="col-sm-5">
                        <div class="profile">
                                <div class="view">
                                        <i style="font-size:24px;" class="fa">&#xf2be;</i> 
                                        <p class="text">View Profile</p>
                                </div>
                                <div class="edit">
                                        <i class="fa-solid fa-pencil"></i>
                                        <p class="text"> Edit profile</p>
                                </div>
                        </div>

                </div>
    </div>
    </div>
    <!-- View Profile -->
     <div class="container mt-5 view-profile ">
                <div class="profile-header_view">
                            <div class="d-flex align-items-center header-vie">
                                <img src="https://i.pinimg.com/736x/c0/b2/6b/c0b26bc673d7e709a42b87f96268bf32.jpg" alt="Profile Picture">
                                <div class="ms-3">
                                    <h3 class="mb-0"><strong>Hồ Thị Duyên Hà</strong></h3>
                                    <p class="text-muted mb-0" style="color:white">hothiduyenha2005@gmail.com</p>
                                </div>
                            </div>
                </div>

            <div class="row px-5 big-box " >
                <div class="col-sm-7">
                        <h3>Personal information </h3>
                        <p><span>Full Name: </span></p>
                        <p><span>Email: </span></p>
                        <p><span>Phone Number: </span></p>
                        <p><span>Date of Birth</span></p>
                        <p><span>Address: </span></p>
                        <p><span></span></p>
                </div>

                <div class="col-sm-5">
                                <div class="profile">
                                        <div class="view">
                                                <i style="font-size:24px;" class="fa">&#xf2be;</i> 
                                                <p class="text">View Profile</p>
                                        </div>
                                        <div class="edit">
                                                <i class="fa-solid fa-pencil"></i>
                                                <p class="text"> Edit profile</p>
                                        </div>
                                </div>

                        </div>
            </div>                  
                   
        </div>






</body>
</html>
