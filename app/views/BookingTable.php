<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
    require_once(__DIR__ . '/../assets/css/booking.css.php');
    ?>
</head>

<body id="body-aboutus">
    <?php
    require_once("app/components/header.php");
    ?>
    <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
        <img src="\app\assets\img\Shop List.png" alt="Menu Banner" class="w-100 h-100 banner-image">
        <h1 class="position-absolute text-light text-center banner-title">BOOKING TABLE</h1>
    </div>
    <div class="container">
        <div class="find__table">
            <div class="time_session">
                <div class="botton__position">
                    <div class="number__customer__session customer_select">
                        <div class="number__customer__title">CUSTOMER</div>
                        <div class="number__session">
                            <button class="btn btn-sm number__session__btn_i " onclick="decrement()">-</button>
                            <span class="number__customer btn btn-sm">1</span>
                            <button class="btn btn-sm number__session__btn_d" onclick="increment()">+</button>
                        </div>
                    </div>
                    <div class="start__time__session oclock-box">
                        <div class="start__time__title">START TIME</div>
                        <div class="start__time__input">
                            <input type="time" id="start_time" class="start-oclock" required>
                        </div>
                    </div>
                    <div class="end__time__session oclock-box">
                        <div class="end__time__title">END TIME</div>
                        <div class="end__time__input">
                            <input type="time" id="end_time" class="start-oclock" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="day_session">
                <div class="calendar">
                    <div class="month flex">
                        <div class="prev">
                            <i class="fas fa-chevron-left"></i>
                        </div>
                        <div class="content ">
                            <p></p>
                        </div>
                        <div class="next">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                    <div class="weekdays flex">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div class="days flex">
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-warning" id="find-table_button"onclick="findTable()">Find Table</button>
        <!-- Show result -->
        <div class="row mt-5 result__session">
            <!-- result show -->
        </div>
    </div>
    <div class="mt-5">
        <?php
        include_once("app/components/footer.php");
        ?>
    </div>
    <script>
        var currentDate = new Date();
        var year = currentDate.getFullYear();
        var month = currentDate.getMonth() + 1;
        var daynow = currentDate.getDate();
        window.addEventListener('DOMContentLoaded', (event) => {
            const dateInput = document.getElementById('date');
            dateInput.focus();
            dateInput.click();
        });
        const date = new Date();
        const renderCalendar = () => {
            date.setDate(1);
            const monthDays = document.querySelector(".days");
            const lastDay = new Date(
                date.getFullYear(),
                date.getMonth() + 1,
                0
            ).getDate();
            const prevLastDay = new Date(
                date.getFullYear(),
                date.getMonth(),
                0
            ).getDate();
            const firstDayIndex = date.getDay();
            const lastDayIndex = new Date(
                date.getFullYear(),
                date.getMonth() + 1,
                0
            ).getDay();
            const nextDays = 7 - lastDayIndex - 1;
            const months = [
                "1",
                "2",
                "3",
                "4",
                "5",
                "6",
                "7",
                "8",
                "9",
                "10",
                "11",
                "12",
            ]
            // document.querySelector('.content p').innerHTML = new Date().toDateString();
            document.querySelector('.content p').innerHTML = `${daynow}/${month}/${year}`;
            let days = "";
            for (let x = firstDayIndex; x > 0; x--) {
                days += `<div class="previous-day">${prevLastDay - x + 1}</div>`
            }
            for (let i = 1; i <= lastDay; i++) {
                if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()) {
                    days += `<div class="day today">${i}</div>`
                } else {
                    days += `<div class="day">${i}</div>`
                }
            }
            for (let j = 1; j <= nextDays; j++) {
                days += `<div class="next-days">${j}</div>`
                monthDays.innerHTML = days;
            }
            document.querySelectorAll('.day').forEach(day => {
                day.addEventListener('click', () => {
                    document.querySelectorAll('.day').forEach(d => d.classList.remove('today'));
                    day.classList.add('today');
                    const dayIn = day.innerHTML; // Hoặc sử dụng day.textContent nếu bạn chỉ muốn lấy văn bản
                    daynow = dayIn
                    console.log(daynow);
                    console.log(month);
                    console.log(year);
                    document.querySelector('.content p').innerHTML = `${daynow}/${month}/${year}`;
                });
            });
        };
        document.querySelector('.prev').addEventListener('click', () => {

            date.setMonth(date.getMonth() - 1);
            month = month - 1
            if ((month) < 1) {
                month = 12;
                year = year - 1;
            }
            renderCalendar();
            document.querySelector('.content p').innerHTML = `${daynow}/${month}/${year}`;
        })

        document.querySelector('.next').addEventListener('click', () => {
            date.setMonth(date.getMonth() + 1);
            month = month + 1
            if ((month) > 12) {
                month = 1;
                year = year + 1;
            }
            renderCalendar();
            document.querySelector('.content p').innerHTML = `${daynow}/${month}/${year}`;
        })
        renderCalendar();
    </script>
    <script>
        function increment() {
            let number = parseInt(document.querySelector('.number__customer').innerHTML);
            number++;
            document.querySelector('.number__customer').innerHTML = number;
        }

        function decrement() {
            let number = parseInt(document.querySelector('.number__customer').innerHTML);
            if (number > 1) {
                number--;
                document.querySelector('.number__customer').innerHTML = number;
            }
        }
        const findTable = () => {
            const customerNum = parseInt(document.querySelector('.number__customer').innerHTML);
            const startTime = document.querySelector('#start_time').value;
            const endTime = document.querySelector('#end_time').value;
            const date = `${year}-${month}-${daynow}`
            if (customerNum < 1 || startTime > endTime || !startTime || !endTime) {
                alert('Please check the number of customers and the time range');
                return;
            }
            event.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/home/findTable", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.response);
                    console.log(response.data);
                    var tableRespons = response.data;
                    const result__session = document.querySelector('.result__session');
                    var resultHTML = '';
                    tableRespons.forEach(function(table) {
                        var htmlContent = `
        <div class="col-sm-6 mt-3">
            <div class="card">
                <div class="card-body table-booking">
                    <h5 class="card-title"> TABLE NUMBER : ${table.id}</h5>
                    <p class="card-text">Table capacity: ${table.capacity}</p>
                    <p class="card-text">Table location: ${table.location}</p>
                    <a href='#' onclick=bookTable(${table.id}) class="btn btn-warning">Book Table</a>
                </div>
            </div>
        </div>
    `;
                        resultHTML = resultHTML + htmlContent;
                    });
                    result__session.innerHTML = resultHTML;

                } else {
                    console.error("Error: " + xhr.statusText);
                }
            };
            var data = JSON.stringify({
                date: date,
                customerNum: customerNum,
                startTime: startTime,
                endTime: endTime
            });
            xhr.send(data);
        }
    </script>
    <script>
        const bookTable = (id) => {
            const customerNum = parseInt(document.querySelector('.number__customer').innerHTML);
            const startTime = document.querySelector('#start_time').value;
            const endTime = document.querySelector('#end_time').value;
            const date = `${year}-${month}-${daynow}`
            event.preventDefault();
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "/home/bookTable", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.response);
                    console.log(response);
                    window.location.href = ('/user/profile')
                } else {
                    console.error("Error: ");
                }
            };
            var data = JSON.stringify({
                date: date,
                customerNum: customerNum,
                startTime: startTime,
                endTime: endTime,
                tableId: id
            });
            xhr.send(data);
        }
    </script>
</body>

</html>