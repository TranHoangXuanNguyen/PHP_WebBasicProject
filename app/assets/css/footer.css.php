<style>
    
    *{
                margin:0px;
                padding:0px;
                color:white;
                font-family: arial;
        }
        footer{
                background-color: black;
               
        }
        .container {
                width: 100%; 
                margin: 0 auto; 
        }

        .rowfirst-child {
                border-bottom: 1px solid orange; /* Tạo đường gạch dưới */
                padding-bottom: 10px; /* Thêm khoảng cách  */
                margin-top: 15px;
              
        }
  
        .subscribe-form {
                padding:0px;
                font-size: 13px;
                display: flex; /* Đặt chúng vào một dòng */
                justify-content: flex-end; 
                /* border-radius: 3px;
                border:1px solid orange;
                align-items: center; */
        }
        .title p{
               margin-bottom: 25px;
               margin-top: 15px;
                
        }
        .subscribe-form input{
                padding: 8px;
                border: none;
                border-radius: 5px 0 0 5px;
                color: white;
                background-color: orange;
                width: 120px;
                margin-right: 0; /* Đảm bảo không có khoảng cách bên phải */

        }
        .subscribe-form button{
                color:orange;
                background-color: white;
                border-radius: 0px 5px 5px 0px;
                width: 100px;
                border:none;
                padding:5px;
                margin-left: 0; /* Đảm bảo không có khoảng cách bên trái */

        }
        .row:nth-child(2) {
                margin-top: 40px; /* Thêm khoảng cách 20px phía trên hàng giữa */
                margin-bottom: 25px;
      
        }
        .time{
                margin-top:70px;
                display:flex;
                
                gap:15px;
        }
        .clock-icon{
                display: flex; /* Kích hoạt Flexbox */
                justify-content: center; /* Căn giữa icon theo chiều ngang */
                align-items: center; /* Căn giữa icon theo chiều dọc */
                flex: 0 0 80px; /* Chiều rộng và chiều cao của biểu tượng */
                height: 85px; /* Đảm bảo biểu tượng hình vuông */
                border-radius: 30%; /* Tạo khung hình tròn */
                background-color: orange;
                align-items: center;
                
                        
        }
 
        ul{
                list-style: none;
        }
        ul li {
           margin-bottom: 15px; /* Tạo khoảng cách giữa các mục trong danh sách */
        }
        ul li a {
                text-decoration: none; /* Xóa gạch chân */
                color: white; /*Màu chữ*/
        }

        ul li a:hover {
                color: orange; /* Thêm hiệu ứng màu khi hover */
        }
        .rowlast-child{
                display:flex;
                justify-content: space-around;
                align-items: center; /* Căn giữa theo chiều dọc */
                background-color: orange;
                width: calc(100vw - 10px); /* Full toàn bộ chiều ngang màn hình */
                margin-left: calc(-50vw + 50%); /* Đưa phần tử ra khỏi giới hạn container */
                text-align: center; /* Giúp căn giữa nội dung text */
        }
       .icon-right {
                display: flex;
                justify-content: flex-end; /* Căn giữa nội dung ngang */
                align-items: center; /* Căn giữa nội dung dọc */
                height: 100%; /* Đảm bảo full chiều cao */
                padding-right: 55px; /* Thêm khoảng cách bên phải */
        }
        .text-under{
                display: flex;
                justify-content: flex-start; /* Căn giữa nội dung ngang */
                align-items: center; /* Căn giữa nội dung dọc */
                height: 100%; /* Đảm bảo full chiều cao */
                padding-left: 55px; /* Thêm khoảng cách bên trái */
                text-align: center;
        }
        /* .text-under p {
               
        } */
        .icon-right i {
                margin-left: 10px; /* Tạo khoảng cách giữa các icon */
                color: white; /* Màu icon */
                }

        .icon-right i:hover {
                color: black; /* Thêm hiệu ứng khi hover */
                }
       p{
        font-size: 12px;
       }
       h6{
        margin-bottom: 25px;
       }

</style>