<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mamakitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php
    require_once("./app/assets/css/admin.css.php");
    ?>
    <style>
        .admincontai {
            height: 120vh;
        }

        .content__session {
            height: 120vh;
            background-color: #f9f9f9;
            border-radius: 5px;
            overflow: scroll !important;

        }

        .inforbox {
            width: 80%;
            /* background: linear-gradient(to right, rgb(26, 28, 26), rgb(232, 135, 8)); */
            background-color: orange;
            margin: auto;
            padding: 10px 20px;
            text-align: center;
            border-radius: 10px;
            opacity: 80%;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4), -10px -10px 20px rgba(0, 0, 0, 0.2);
        }

        #mychart {
            display: block;
            box-sizing: border-box;
        }

        .tablebody {
            overflow: scroll !important;
        }

        .fooditemimgadin {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .modalPopup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            overflow-y: auto;
        }

        .formUpdateFoodItem {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            position: absolute;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }

        .formUpdateFoodItem .form-label {
            font-weight: bold;
            color: #333;
        }

        .formUpdateFoodItem .form-control {
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            background-color: #fff;
            transition: border-color 0.3s ease;
        }

        .formUpdateFoodItem .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .formUpdateFoodItem .form-control:disabled {
            background-color: #f1f1f1;
        }

        .formUpdateFoodItem .mb-3 {
            margin-bottom: 15px;
        }

        .formUpdateFoodItem button[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .formUpdateFoodItem button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .formUpdateFoodItem .form-control,
        .formUpdateFoodItem button {
            margin-bottom: 15px;
        }

        .formUpdateFoodItem img {
            max-width: 100px;
            margin-top: 10px;
            border-radius: 5px;
        }

        .formUpdateFoodItem select.form-control {
            background-color: #fff;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease;
        }

        .formUpdateFoodItem select.form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        @media (max-width: 768px) {
            .formUpdateFoodItem {
                padding: 15px;
                max-width: 100%;
            }
        }
    </style>

</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>


    <div class="admincontai">
        <div class="row">
            <div class="col-2 adminsidebar">
                <div class="adminsidebar_header">
                    <h1 class="adminsidebar_header__title mt-3 mb-3">MASTER ADMIN</h>
                </div>
                <div class="list-group">
                    <a href="#" autofocus class="list-group-item list-group-item-action list-group-btn load-page" data-page="Dashboard">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-btn load-page" data-page="FoodItem">Manager food items</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-btn load-page" data-page="User">Manager User Account</a>
                    <a href="/admin/Signout" class="btn btn-warning mt-3">Log out</a>
                </div>
            </div>
            <div class="col-10 content__session">
                <div class="adminsidebar_header">
                    <h1 class="adminsidebar_header__title mt-3 mb-3 contentAdmin">MASTER ADMIN</h>
                </div>
                <div id="content">

                </div>
            </div>
        </div>
    </div>




    <?php
    include_once("app/components/footer.php");
    ?>
    <!-- function nav not reload -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.load-page').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var page = this.getAttribute('data-page');
                    fetchContent(page);
                });
            });
        });

        function fetchContent(page) {
            fetch('/admin/fetchdata/' + page)
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('wrong fetch  ' + response.statusText);
                    }
                    return response.text();
                })
                .then(function(html) {
                    document.getElementById('content').innerHTML = html;
                })
                .catch(function(error) {
                    console.log('hmmm I dont know  ', error);
                });
        }
    </script>

    <!-- function update/delete/create -->
    <script>
        function addNewItem() {
            const form = `
            <form action='/admin/createFood' method='POST' class='formUpdateFoodItem'>
                <div class='row rowForInput'>
                    <div class='inputFoodName'>
                        <label for='foodName' class='form-label'>Food Name</label>
                        <input type='text' class='form-control' id='foodName' name='foodName' required>
                    </div>
                    <div class='inputFoodImg'>
                        <label for='foodImg' class='form-label'>Food Image</label>
                        <input type='text' class='form-control' id='foodImg' name='foodImg' required>
                    </div>
                </div>
                <div class='mb-3'>
                    <label for='description' class='form-label'>Description</label>
                    <textarea class='form-control' id='description' name='description' rows='3' required></textarea>
                </div>
                <div class='mb-3'>
                    <label for='detail' class='form-label'>Detail</label>
                    <textarea class='form-control' id='detail' name='detail' rows='3' required></textarea>
                </div>
                <div class='mb-3'>
                    <label for='price' class='form-label'>Price</label>
                    <input type='number' class='form-control' id='price' name='price' required>
                </div>
                <div class='mb-3'>
                    <label for='categoryId' class='form-label'>Category</label>
                    <select class='form-control' id='categoryId' name='categoryId' required>
                        <option value='1'>Start Food</option>
                        <option value='2'>Main course</option>
                        <option value='3'>Desert</option>
                        <option value='4'>Drink</option>
                    </select>
                </div>
                <button type='submit' class='btn btn-primary'>Create new item</button>
            </form>
        `;
            console.log('hello')
            document.querySelector('.modalContent').innerHTML = form;
            document.querySelector('.modalPopup').style.display = 'block';
        }

        function updateFoodItem(id) {
            const form = `
            <form action='/admin/updateFood/${id}' method='POST' class='formUpdateFoodItem'>
                <div class='row rowForInput'>
                    <div class='inputFoodName'>
                        <label for='foodName' class='form-label'>Food Name</label>
                        <input type='text' class='form-control' id='foodName' name='foodName1' required>
                    </div>
                    <div class='inputFoodImg'>
                        <label for='foodImg' class='form-label'>Food Image</label>
                        <input type='text' class='form-control' id='foodImg' name='foodImg1' required>
                    </div>
                </div>
                <div class='mb-3'>
                    <label for='description' class='form-label'>Description</label>
                    <textarea class='form-control' id='description' name='description1' rows='3' required></textarea>
                </div>
                <div class='mb-3'>
                    <label for='detail' class='form-label'>Detail</label>
                    <textarea class='form-control' id='detail' name='detail1' rows='3' required></textarea>
                </div>
                <div class='mb-3'>
                    <label for='price' class='form-label'>Price</label>
                    <input type='number' class='form-control' id='price' name='price1' required>
                </div>
                <button type='submit' class='btn btn-primary'>Update Food Item</button>
            </form>
        `;
            console.log('hello')
            document.querySelector('.modalContent').innerHTML = form;
            document.querySelector('.modalPopup').style.display = 'block';

            // fetch(`getFoodItem.php?id=${id}`)
            //     .then(response => response.json())
            //     .then(data => {
            //         document.querySelector('#foodName').value = data.foodName;
            //         document.querySelector('#foodImg').value = data.foodImg;
            //         document.querySelector('#description').value = data.description;
            //         document.querySelector('#detail').value = data.detail;
            //         document.querySelector('#price').value = data.price;
            //         document.querySelector('#categoryId').value = data.categoryId;
            //     });
        }

        function deleteFoodItem(id) {
            fetch(`/admin/deleteFood/${id}`)
                .then(function(response) {
                    if (response.ok) {
                        alert('Food item deleted successfully');
                        window.location.reload();
                    } else {
                        alert('Failed to delete food item');
                    }
                });
        };

        // function modify User


        function closeModal() {
            document.querySelector('.modalPopup').style.display = 'none';
            document.querySelector('.formUpdateFoodItem').style.display = "none";
            console.log('click in modal')
        }
    </script>

    <!-- function modify User -->
    <script>
        function addNewUser() {
            const form = `
        <form action='/admin/createUser' method='POST' class='formUpdateFoodItem'>
            <div class='row rowForInput'>
                <div class='inputFoodName'>
                    <label for='userName' class='form-label'>User Name</label>
                    <input type='text' class='form-control' id='userName' name='userName' required>
                </div>
                <div class='inputFoodImg'>
                    <label for='userImg' class='form-label'>Avata img</label>
                    <input type='text' class='form-control' id='userImg' name='userImg' required>
                </div>
            </div>
            <div class='mb-3'>
                <label for='passWord' class='form-label'>passWord</label>
                <textarea class='form-control' id='passWord' name='passWord' rows='3' required></textarea>
            </div>
            <div class='mb-3'>
                <label for='Email' class='form-label'>Email</label>
                <textarea class='form-control' id='Email' name='email' rows='3' required></textarea>
            </div>
            <div class='mb-3'>
                <label for='address' class='form-label'>address</label>
                <input type='text' class='form-control' id='address' name='address' required>
            </div>
            <div class='mb-3'>
                <label for='role' class='form-label'>Role</label>
                <select class='form-control' id='role' name='role' required>
                    <option value='admin'>Admin</option>
                    <option value='user'>User</option>
                </select>
            </div>
             <div class='mb-3'>
                <label for='phone' class='form-label'>phone</label>
                <input type='text' class='form-control' id='phone' name='phone' required>
            </div>
             <div class='mb-3'>
                <label for='birthDay' class='form-label'>birthDay</label>
                <input type='text' class='form-control' id='birthDay' name='birthDay' required>
            </div>
            <button type='submit' class='btn btn-primary'>Create New User</button>
        </form>
        `;
            console.log('hello')
            document.querySelector('.modalContent').innerHTML = form;
            document.querySelector('.modalPopup').style.display = 'block';
        }

        function updateUser(id) {
            const form = `
        <form action='/admin/updateUser/${id}' method='POST' class='formUpdateFoodItem'>
            <div class='row rowForInput'>
                <div class='inputFoodName'>
                    <label for='userName' class='form-label'>User Name</label>
                    <input type='text' class='form-control' id='userName' name='userName' required>
                </div>
                <div class='inputFoodImg'>
                    <label for='userImg' class='form-label'>Avata img</label>
                    <input type='text' class='form-control' id='userImg' name='userImg' required>
                </div>
            </div>
            <div class='mb-3'>
                <label for='passWord' class='form-label'>passWord</label>
                <textarea class='form-control' id='passWord' name='passWord' rows='3' required></textarea>
            </div>
            <div class='mb-3'>
                <label for='Email' class='form-label'>Email</label>
                <textarea class='form-control' id='Email' name='Email' rows='3' required></textarea>
            </div>
            <div class='mb-3'>
                <label for='address' class='form-label'>address</label>
                <input type='text' class='form-control' id='address' name='address' required>
            </div>
            <div class='mb-3'>
                <label for='role' class='form-label'>Role</label>
                <select class='form-control' id='role' name='role' required>
                    <option value='admin'>Admin</option>
                    <option value='user'>User</option>
                </select>
            </div>
             <div class='mb-3'>
                <label for='phone' class='form-label'>phone</label>
                <input type='text' class='form-control' id='phone' name='phone' required>
            </div>
             <div class='mb-3'>
                <label for='birthDay' class='form-label'>birthDay</label>
                <input type='text' class='form-control' id='birthDay' name='birthDay' required>
            </div>
            <button type='submit' class='btn btn-primary'>Update User Information</button>
        </form>
        `;
            console.log('hello')
            document.querySelector('.modalContent').innerHTML = form;
            document.querySelector('.modalPopup').style.display = 'block';

            // fetch(`menu/getdetail/${id}`)
            // .then(response => response.json())
            // .then(data => {
            // document.querySelector('#foodName').value = data.foodName;
            // document.querySelector('#foodImg').value = data.foodImg;
            // document.querySelector('#description').value = data.description;
            // document.querySelector('#detail').value = data.detail;
            // document.querySelector('#price').value = data.price;
            // document.querySelector('#categoryId').value = data.categoryId;
            // });
        }

        function deleteUser(id) {
            fetch(`/admin/deleteUser/${id}`)
                .then(function(response) {
                    if (response.ok) {
                        alert('User item deleted successfully');
                        window.location.reload();
                    } else {
                        alert('Failed to delete User');
                    }
                });
        };
    </script>

    <!-- function render chart-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js">
    </script>


    <script>
        function showChart() {
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Start Food', 'Main Corse', 'Desert', 'Drink'],
                    datasets: [{
                        label: 'Food item by category',
                        data: [
                            <?php echo $data['countbycategory'][1]; ?>,
                            <?php echo $data['countbycategory'][2]; ?>,
                            <?php echo $data['countbycategory'][3]; ?>,
                            <?php echo $data['countbycategory'][4]; ?>
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    </script>
</body>

</html>