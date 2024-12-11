<style>
    .banner {
        background-color: #000;
        width: 100%;
    }


    h1 {
        text-shadow: 1px 1px 2px #7c7c7c;
    }

    .btn {
        width: 160px;
        padding: 0.5em 1.5em;
        border-radius: 30px !important;
        box-shadow: 5px 5px 5px rgba(105, 73, 73, 0.15);
        background-color: #FF9F0D !important;
        height: 45px;
    }

    .chuto {
        font-size: 16px
    }

    .chuvua {
        font-size: 14px;
    }

    .caibaobo {
        position: relative;
    }

    .imgSlide1 {
        position: absolute;
        width: 350px;
        height: 350px;
        z-index: 1;
        right: 100px;
        top: 90px;
    }

    .paddingTop70 {
        padding-top: 70px;
    }

    .blackText {
        color: #000;
    }

    .imgSlide2 {
        position: absolute;
        width: 305px;
        height: 451px;
        right: 0;
    }

    .banner {
        height: 80vh;
    }

    .img-3CaiAnhSieuDepTrai {
        display: grid;
        grid-template-rows: 1fr 1fr;
        gap: 2%;
        position: absolute;
        right: 0;
        top: 10%;
    }

    .img-row1 {
        display: flex;
        align-items: flex-end;
    }

    .img-row2 {
        display: flex;
        gap: 2%;

    }

    .imgContact1 {
        width: 100%;
        height: 80%;
        object-fit: cover;
        bottom: 0;
        border-radius: 10px;


    }

    .imgContact2 {
        width: 64%;
        height: 50%;
        object-fit: cover;
        border-radius: 10px;
    }

    .rowNhungMaNoVipHon {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }

    .inRight {
        margin: 0px;
    }

    .imgContai {
        position: relative;
    }

    .rowContent {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        justify-content: space-around;
        align-items: center;
        gap: 2.5%;
    }

    .rowContentSession {
        width: 100%;
        height: 300px;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 5px 5px 5px rgba(105, 73, 73, 0.15);
    }

    .bigsize {
        font-size: 30px;
        color: #FF9F0D !important;

    }

    .rowContentSession:hover .rowContent_img {
        transform: scale(1.3);
        transition: transform 0.3s ease-in-out;
    }

    .rowContent_img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .image-container {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        width: 85%;
    }

    .image-container img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }


    @media screen and (max-width: 567px) {
        .banner {
            text-align: center;
        }
    }
</style>