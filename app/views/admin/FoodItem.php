<?php
$fooditems = $data['allfooditems'];
?>

<body>
    <div class="addFoodIitem__session__admin">
        <button class="btn btn-success" onclick="addNewItem()">Add food item</button>
    </div>
    <div class="search-container">
        <input type="text" class="inputSearch" placeholder="Search...">
        <button onclick="searchFood()">Search</button>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">FoodId</th>
                <th scope="col">Food Name</th>
                <th scope="col">Food Image</th>
                <th scope="col">Food Price</th>
                <th scope="col">Food category</th>
                <th scope="col">Food detail</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="tablebody">
            <div></div>
            <?php
            $pageItem = 0;
            foreach ($fooditems as $fooditem) {
                echo "
            <tr id='row{$pageItem}' class = 'foodItemSearch'>
                <th scope='row'>" . htmlspecialchars($fooditem->foodId) . "</th>
                <td class='foodName' data-info='$fooditem->foodName' >" . htmlspecialchars($fooditem->foodName) . "</td>
                <td>
                    <img src='" . htmlspecialchars($fooditem->foodImg) . "' class='fooditemimgadin' alt='Image of " . htmlspecialchars($fooditem->foodName) . "'>
                </td>
                <td>" . htmlspecialchars($fooditem->price) . "</td>
                <td>" . htmlspecialchars($fooditem->categoryId) . "</td>
                <td>" . htmlspecialchars($fooditem->detail) . "</td>
                <td>
                    <button type='button' class='updatebtn btn-warning btn' onclick='updateFoodItem(" . htmlspecialchars($fooditem->foodId) . ")'><i class='bi bi-file-earmark-plus-fill'></i></button>
                    <button type='button' class='deletebtn btn-success btn' onclick='deleteFoodItem(" . htmlspecialchars($fooditem->foodId) . ")'><i class='bi bi-trash3-fill'></i></button>
                </td>
            </tr>
            ";
                $pageItem++;
            }
            ?>
        </tbody>
    </table>



    <div class="modalPopup" onclick="closeModal()"> </div>
    <div class="modalContent">
        <span class="closeBtn" onclick="closeModal()">X</span>
    </div>




</body>