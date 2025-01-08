<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mamakitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href=""> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <?php
    require_once("./app/assets/css/admin.css.php");
    // var_dump($data['imcomeEachMonth'][11])   
    // for()
    ?>


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
                    <a href="#" autofocus class="list-group-item list-group-item-action list-group-btn load-page" onclick="turnOffNav()" data-page="Dashboard">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-btn load-page" onclick="turnOnNav()" data-page="FoodItem">Manager food items</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-btn load-page" onclick="turnOnNavUser()" data-page="User">Manager User Account</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-btn load-page" onclick="turnOnNav()" data-page="Confirm">Confirm Order</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-btn load-page" onclick="turnOnNav()" data-page="Booking">Check table status</a>

                    <a href="/admin/Signout" class="btn btn-warning mt-3">Log out</a>
                </div>
            </div>
            <div class="col-10 content__session">
                <div class="adminsidebar_header">
                    <h1 class="adminsidebar_header__title mt-3 mb-3 contentAdmin">MASTER ADMIN</h>
                </div>
                <div id="content">

                </div>
                <nav id="navPag" aria-label="Page navigation" style="display:none">
                    <ul class="pagination">
                        <li class="page-item" id="prevBtn" onclick="prev()"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item firstBtn"><a class="page-link pageGet" href="#" data-page="1">1</a></li>
                        <li class="page-item"><a class="page-link pageGet" href="#" data-page="2">2</a></li>
                        <li class="page-item"><a class="page-link pageGet" href="#" data-page="3">3</a></li>
                        <li class="page-item"><a class="page-link pageGet" href="#" data-page="4">4</a></li>
                        <li class="page-item"><a class="page-link pageGet" href="#" data-page="5">5</a></li>
                        <li class="page-item"><a class="page-link pageGet" href="#" data-page="6">6</a></li>
                        <li class="page-item" id="nextBtn" onclick="next()"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
                <nav id="navPagUser" aria-label="Page navigation" style="display:none">
                    <ul class="pagination">
                        <li class="page-item" id="prevBtn" onclick="prevUser()"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item firstBtn"><a class="page-link pageUserGet" href="#" data-page="1">1</a></li>
                        <li class="page-item"><a class="page-link pageUserGet" href="#" data-page="2">2</a></li>
                        <li class="page-item" id="nextBtn" onclick="nextUser()"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
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
            console.log(('/admin/fetchdata/' + page + '/1'))
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
            const div1 = document.getElementById('chart2');
            const div = document.getElementById('chart');
            div.style.display = 'block'
            div1.style.display = 'none'

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

        function showChart2() {
            const ctx2 = document.getElementById('myChart2');
            const div1 = document.getElementById('chart2');
            const div = document.getElementById('chart');

            // Hide div #chart and show div #chart2
            div.style.display = 'none';
            div1.style.display = 'block';

            // Create the chart with dynamic data from PHP
            new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    datasets: [{
                        label: 'Food item by category',
                        data: [
                            <?php
                            for ($i = 1; $i < 13; $i++) {
                                echo isset($data['imcomeEachMonth'][$i]) ? $data['imcomeEachMonth'][$i] : 0;
                                if ($i < 12) {
                                    echo ',';
                                }
                            }
                            ?>
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

    <script>
        const confirm = async (id, isConfirm) => {
            try {
                const response = await fetch(`/admin/confirmOrder/${id}/${isConfirm}`);
                if (response.ok) {
                    alert('Order confirmation updated successfully')
                    console.log('Order confirmation updated successfully');
                    window.location.reload();
                } else {
                    alert('Failed to update order confirmation', response.status)
                    console.error('Failed to update order confirmation', response.status);
                }
            } catch (error) {
                console.error('Network error:', error);
            }
        }
    </script>

    <script>
        const setBooking = async (id, statusCode) => {
            try {
                const response = await fetch(`/admin/setBookingStatus/${id}/${statusCode}`);
                if (response.ok) {
                    window.location.reload();
                } else {
                    alert('Failed to update order confirmation', response.status)
                    console.error('Failed to update order confirmation', response.status);
                }
            } catch (error) {
                console.error('Network error:', error);
            }
        }
    </script>


    <script>
        let currentPage = 1;
        const totalPages = 6;

        function updatePagination() {
            document.getElementById('prevBtn').classList.toggle('disabled', currentPage === 1);
            document.getElementById('nextBtn').classList.toggle('disabled', currentPage === totalPages);

            const pageLinks = document.querySelectorAll('.page-link');
            pageLinks.forEach(link => {
                const page = parseInt(link.getAttribute('data-page'));
                if (page === currentPage) {
                    link.parentElement.classList.add('active'); // Add active class to the parent <li>
                } else {
                    link.parentElement.classList.remove('active');
                }
            });
        }

        const prev = () => {
            event.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
                showPage(currentPage);
            }
        }


        const next = () => {
            event.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
                showPage(currentPage);
            }
        }

        const prevUser = () => {
            event.preventDefault();
            if (currentPage > 1) {
                currentPage--;
                updatePagination();
                showUserPage(currentPage);

            }
        }


        const nextUser = () => {
            event.preventDefault();
            if (currentPage < totalPages) {
                currentPage++;
                updatePagination();
                showUserPage(currentPage);

            }
        }





        document.querySelectorAll('.pageGet').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const page = parseInt(this.getAttribute('data-page'));
                if (page !== currentPage) {
                    currentPage = page;
                }
                updatePagination();
                showPage(page);
            });
        });


        document.querySelectorAll('.pageUserGet').forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const page = parseInt(this.getAttribute('data-page'));
                if (page !== currentPage) {
                    currentPage = page;
                }
                updatePagination();
                // showPage(page);
                showUserPage(page);

            });
        });




        updatePagination();

        const showPage = (pageGetFrom) => {
            updatePagination();
            console.log(`Fetching content for page: ${pageGetFrom}`);
            fetchContent(`FoodItem?page=${pageGetFrom}`)
        };

        const showUserPage = (pageGetFrom) => {
            updatePagination();
            console.log(`asdasdasdfor page: ${pageGetFrom}`);
            fetchContent(`User?page=${pageGetFrom}`)

        };


        const turnOffNav = () => {
            document.querySelector('#navPag').style.display = 'none';

        }
        const turnOnNav = () => {
            document.querySelector('#navPagUser').style.display = 'none';
            document.querySelector('#navPag').style.display = 'block';
            const pageLinks = document.querySelectorAll('.page-link');
            pageLinks.forEach(link => {
                const page = parseInt(link.getAttribute('data-page'));
                link.parentElement.classList.remove('active');
            });
            document.querySelector('.firstBtn').classList.add('active');

        }

        const turnOnNavUser = () => {
            document.querySelector('#navPagUser').style.display = 'block';
            document.querySelector('#navPag').style.display = 'none';
            const pageLinks = document.querySelectorAll('.page-link');
            pageLinks.forEach(link => {
                const page = parseInt(link.getAttribute('data-page'));
                link.parentElement.classList.remove('active');
            });
            document.querySelector('.firstBtn').classList.add('active');

        }
    </script>

<script>
    const searchFood = () => {
        const FoodItems = document.querySelectorAll('#foodName');
        var inputSearch = document.querySelector('.inputSearch').value.trim();
        if (inputSearch.length === 0) {
            alert('Input search is empty');
            return;
        }
        console.log('Search input:', inputSearch);
        console.log('Food items:', FoodItems);
        FoodItems.forEach(item => {
            const foodName = item.textContent || item.innerText; 
            if (foodName.toLowerCase().includes(inputSearch.toLowerCase())) {
                item.style.display = "block"; 
            } else {
                item.parentElement.style.display = "none";
            }
        });
    }
</script>

</body>

</html>