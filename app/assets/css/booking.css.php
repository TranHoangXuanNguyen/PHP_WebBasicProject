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
        /* background-image: url('../img/.png') */
        width: 50%;
        height: 300px;
        background-color: aquamarine;

        position: relative;
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
        background-color: orange;
        display: inline-block;

    }

    .number__session__btn_i {
        border-bottom-left-radius: 10px;
        background-color: orange;
        width: 30%;
    }

    .number__session__btn_d {
        border-bottom-right-radius: 10px;
        background-color: orange;
        width: 30%;
    }

    .number__customer__title {
        background-color: orange;
        padding: 5px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        margin-bottom: 7px;
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
        color: rgba(0, 0, 0, 0.8)
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
        background: rgb(84, 46, 54);
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
</style>