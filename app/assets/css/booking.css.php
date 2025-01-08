<style>
    .find__table {
        display: flex;
        padding: 5% 10%;
        /* gap: 20px; */
    }

    .botton__position {
        width: 100%;
        position: absolute;
        display: flex;
        justify-content:
            space-around;
        align-items: center;
        bottom: 5%;
    }
    .time_session {
    width: 50%;
    height: 300px;
    background-image: url('https://res.cloudinary.com/westfielddg/image/upload/w_1500/westfield-media/fr/retailer/logo-background-image/x6g5jkisfq5hwvdqre9p.png?fm=webp&w=1500&q=75');
    position: relative;
    background-size: cover;
    background-position: center; 
}

    .day_session {
        /* background-image: url('../img/.png') */
        width: 50%;
        height: 300px;
        background-color: #ccc;
    }

    .number__customer__session {
        display: inline-block;
    }

    .number__customer {
        width: 29%;
        background-color:  #C88831;
        display: inline-block;
        color:white;
    }

    .number__session__btn_i {
        border-radius: 5px;
        background-color:  #C88831;
        width: 30%;
        color: white;
    }

    .number__session__btn_d {
        border-radius: 5px;
        background-color:  #C88831;
        width: 30%;
        color: white;
    }

    .number__customer__title {
        background-color: #C88831;
        padding: 5px;
        border-radius: 5px;
        margin-bottom: 7px;
    }

    .oclock-box{
        color: white;
        text-align: center;

    }
    .customer_select{
        color:white;
    }
    .start-oclock::-webkit-calendar-picker-indicator {
    filter: invert(1); /*biểu tượng đồng hồ thành màu trắng*/
}
    .start-oclock{
        background-color:  #C88831;
        border-radius: 5px;
        border: 1px solid   #C88831;
        color:white;
        padding: 3px;
    }

    .calendar {
        width: 100%;
        height: 100%;
        background: white;

    }

    .calendar .month {
        width: 100%;
        height: 20%;
        padding: 20px 30px;
        color:white;
        background: rgb(70, 62, 61);
        background-image: #555;
        justify-content: space-between !important;
        text-align: center;
    }

    .calendar .month img {
        width: 26px;
        height: 26px;
        cursor: pointer;
        transition: 0.1s;
    }

    .month img:hover {
        opacity: 0.8;
    }

    .month h1 {
        text-transform: uppercase;
        font-size: 30px;
    }

    .month p {
        font-weight: 300;
        color: white;
    }
    .content p{
        font-size: 20px;

        text-align: center;
        margin-bottom: 0px;
    }

    .weekdays {
        width: 100%;
        padding: 10px;
        height: 10%;
        padding: 0;
    }

    .weekdays div {
        width: calc(100% / 7);
        height: 80%;
        text-align: center;
        font-size: 16px;
        font-weight: 500;
        margin: 0 5px;
        transition: 0.2s;
    }

    .days {
        width: 100%;
        height: 70%;
        flex-wrap: wrap;
        margin: auto;
        padding: 30px 10px;
        padding-top: 0;
    }

    .days div {
        width: calc(100% / 7);
        height: calc(100% / 7);
        text-align: center;
        font-size: 13.5px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.1s;
    }

    .flex {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .days .previous-day,
    .days .next-days {
        color: rgba(0, 0, 0, 0.35)
    }



    .days .today {
        background: #589C5F;
        cursor: pointer;
        color: white;
        border-radius: 50%;
        transition: 0.2s;
    }

    .days .today:hover {
        background: rgb(72, 51, 55);
    }

    .days div:not(.today):hover {
        border-radius: 0;
        border: 0.5px solid black;
        background: rgba(0, 0, 0, 0.25);
        cursor: pointer;
    }

    .prev,
    .next {
        cursor: pointer;
    }
 .table-booking{
    background: rgb(70, 62, 61);
    color:white;
    border-radius: 5px;
 }
 .table-booking h5{
    text-align: center;
    font-weight: bold;
 }
 #find-table_button{
    background-color: #589C5F;
    color:white;
    border:0px;
 }
#book-button{
    background-color: #589C5F;
    color:white;
}
.table-booking .btn-warning{
    background-color:  #C88831;
    color:white;
    border:0px;
    margin-left: 250px;
}
</style>