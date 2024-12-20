<style>

.search-food{
    display:flex;
    justify-content:flex-end;
}
.search-pd{
    border-right: 0px;
    border-radius: 3px;
    
}
.search-box{
    position: relative;
    display: flex;
    align-items: center;
    gap: 0px;
}

.search-box input {
    height: 35px;
    padding-left: 70px;
    border:1px solid #DDDD;
    border-radius: 5px;
    text-align: left;
    background-color: #fdf0da;
    color: black;
    }
.research-icon{
    width: 35px;
    height: 35px;
    background-color: orange;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    position: absolute;
    right: 0px; 
    border-radius: 0px 5px 5px 0px;
}


.food-item{
    border:none !important;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    border-radius: 10px;
    min-height: 420px;
    margin-bottom: 15px;
    margin-left: 15px;
}
.food-item img{
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    height: 350px; 
    width: 100%;
    object-fit: cover; /* Đảm bảo ảnh vừa khung và cắt phần thừa */
    display: block; /* Loại bỏ khoảng cách giữa các ảnh do inline-block */
}
.food-item:hover {
    transform: scale(1.05); 
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    cursor: pointer;
}
.food-title{
    font-weight: bold;
    margin-bottom: 0px;
    color: black !important;;
    text-decoration: none!important;
    text-transform: capitalize;
}
.food-title,.price{
    text-align: left;
    margin-left: 10px;
    display: block;
}
.food-title:hover{
    color:black !important;
    text-decoration: none;
}
.price{
    color:#FF9F0D;
    margin-top: 0px;
    color: orange !important;;
    text-decoration: none!important;
}
.food{
    border:none !important;
    padding:0px;
    margin-top: 10px;
    text-align: center;
    margin-bottom: 15px;     
}

.price:hover{
    color:#FF9F0D !important;
    text-decoration: none !important;
}
.card-body {
    flex: 1 1 auto;
    padding: 2rem 2rem  !important;;
}

</style>