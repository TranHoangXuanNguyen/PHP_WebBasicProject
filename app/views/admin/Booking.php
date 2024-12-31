<?php
$resList = $data['listTablePending'];
// var_dump($resList);
?>

<body>

    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Table ID</th>
                <th scope="col">User Id</th>
                <th scope="col">Date</th>
                <th scope="col">Start time</th>
                <th scope="col">End Time</th>
                <th scope="col">Num of guest</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody class="tablebody">
            <?php
            if (isset($resList)) {
                foreach ($resList as $resItem) {
                    echo "
    <tr>
        <th scope='row'>{$resItem['id']}</th>
        <td>{$resItem['table_id']}</td>
        <td>{$resItem['userId']}</td>
        <td>{$resItem['date']}</td>
        <td>{$resItem['startTime']}</td>
        <td>{$resItem['endTime']}</td>
        <td>{$resItem['num_guests']}</td>

        <td>
            <button type='button' class='updatebtn btn-warning btn' onclick='setBooking({$resItem['id']},\"yes\")'><i class='bi bi-x-lg'></i></button>
            <button type='button' class='deletebn btn-success btn' onclick='setBooking({$resItem['id']},\"no\")' ><i class='bi bi-check-circle'></i></button>
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