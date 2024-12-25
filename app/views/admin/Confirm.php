<?php
$listOrderProcess = $data['listOrderProcess'];
?>

<body>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">Order ID</th>
                <th scope="col">User ID</th>
                <th scope="col">Status</th>
                <th scope="col">Total amount</th>
                <th scope="col">Create at</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="tablebody">
            <?php
            if (isset($listOrderProcess)) {
                foreach ($listOrderProcess as $orderItem) {
                    echo "
    <tr>
        <th scope='row'>{$orderItem->order_id}</th>
        <td>{$orderItem->userId}</td>
        <td>{$orderItem->status}</td>
        <td>{$orderItem->total_amount}</td>
        <td>{$orderItem->created_at}</td>
        <td>
            <button type='button' class='updatebtn btn-warning btn' onclick='confirm({$orderItem->order_id},0)'><i class='bi bi-x-lg'></i></button>
            <button type='button' class='deletebn btn-success btn' onclick='confirm({$orderItem->order_id},1)' ><i class='bi bi-check-circle'></i></button>
        </td>
    </tr>
    ";
                }
            } else {
                echo "Dont have processing order";
            }



            ?>
            </form>
        </tbody>
    </table>

    <div class="modalPopup" onclick="closeModal()"> </div>
    <div class="modalContent">

    </div>

</body>