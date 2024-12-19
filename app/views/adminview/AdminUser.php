<?php
$users = $data['allusers'];
?>

<body>
    <div class="addFoodIitem__session__admin">
        <button class="btn btn-success" onclick="addNewUser()">Add new user</button>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Avt</th>
                <th scope="col">User Pass</th>
                <th scope="col">User Mail</th>
                <th scope="col">User Address</th>
                <th scope="col">User Role</th>
                <th scope="col">User Phone Num</th>
                <th scope="col">User Birth Day</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="tablebody">
            <?php
            foreach ($users as $user) {
                echo "
    <tr>
        <th scope='row'>{$user->userId}</th>
        <td>{$user->fullName}</td>
        <td>
            <img src='{$user->avataImg}' class='fooditemimgadin' alt='Image of {$user->avataImg}'>
        </td>
        <td>{$user->passWord}</td>
        <td>{$user->email}</td>
        <td>{$user->address}</td>
        <td>{$user->role}</td>
        <td>{$user->phoneNum}</td>
        <td>{$user->dob}</td>
        <td>
            <button type='button' class='updatebtn btn-warning btn' onclick='updateUser({$user->userId})'><i class='bi bi-file-earmark-plus-fill'></i></button>
            <button type='button' class='deletebtn btn-success btn' onclick='deleteUser({$user->userId})' ><i class='bi bi-trash3-fill'></i></button>
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