<?php
$fooditems = $data['allfooditems'];
?>

<body>
    <div class="addFoodIitem__session__admin">
        <button class="btn btn-success" onclick="addNewItem()">Add food item</button>
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
            <?php
            foreach ($fooditems as $fooditem) {
                echo "
    <tr>
        <th scope='row'>{$fooditem->foodId}</th>
        <td>{$fooditem->foodName}</td>
        <td>
            <img src='{$fooditem->foodImg}' class='fooditemimgadin' alt='Image of {$fooditem->foodName}'>
        </td>
        <td>{$fooditem->price}</td>
        <td>{$fooditem->categoryId}</td>
        <td>{$fooditem->detail}</td>
        <td>
            <button type='button' class='updatebtn btn-warning btn' onclick='updateFoodItem({$fooditem->foodId})'><i class='bi bi-file-earmark-plus-fill'></i></button>
            <button type='button' class='deletebtn btn-success btn' onclick='deleteFoodItem({$fooditem->foodId})' ><i class='bi bi-trash3-fill'></i></button>
        </td>
    </tr>
    ";
            }
            ?>
            </form>
        </tbody>
    </table>

    <div class="modalPopup" onclick="closeModal()"> </div>
    <div class="modalContent">
        <span class="closeBtn" onclick="closeModal()">X</span>
    </div>

</body>