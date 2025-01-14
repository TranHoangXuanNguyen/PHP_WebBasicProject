<style>
    .adminsidebar {
        background-color: #000;
        /* height: 120vh; */
    }

    .adminsidebar_header__title {
        font-size: 25px;
        text-align: center;
        color: white;
    }

    /* .active {
        background-color: #ff9f0d !important;
        color: black !important;
    } */
    .contentAdmin {
        background-color: #000;
    }


    .admincontai {
        /* height: 120vh; */
    }

    .content__session {
        background-color: #f9f9f9;
        border-radius: 5px;
    }

    .rowadmin {
        max-width: 99.9999%;
    }

    .inforbox {
        width: 80%;
        /* background: linear-gradient(to right, rgb(26, 28, 26), rgb(232, 135, 8)); */
        background-color: orange;
        margin: auto;
        padding: 10px 20px;
        text-align: center;
        border-radius: 10px;
        opacity: 80%;
        box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.4), -10px -10px 20px rgba(0, 0, 0, 0.2);
    }

    #mychart {
        display: block;
        box-sizing: border-box;
    }

    .tablebody {
        overflow: scroll !important;
    }

    .fooditemimgadin {
        width: 50px;
        height: 50px;
        object-fit: cover;
    }

    .modalPopup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        overflow-y: auto;
    }

    .formUpdateFoodItem {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 600px;
        margin: auto;
        position: absolute;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
    }

    .formUpdateFoodItem .form-label {
        font-weight: bold;
        color: #333;
    }

    .formUpdateFoodItem .form-control {
        border-radius: 5px;
        padding: 10px;
        border: 1px solid #ccc;
        background-color: #fff;
        transition: border-color 0.3s ease;
    }

    .formUpdateFoodItem .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .formUpdateFoodItem .form-control:disabled {
        background-color: #f1f1f1;
    }

    .formUpdateFoodItem .mb-3 {
        margin-bottom: 15px;
    }

    .formUpdateFoodItem button[type="submit"] {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }

    .formUpdateFoodItem button[type="submit"]:hover {
        background-color: #0056b3;
    }

    .formUpdateFoodItem .form-control,
    .formUpdateFoodItem button {
        margin-bottom: 15px;
    }

    .formUpdateFoodItem img {
        max-width: 100px;
        margin-top: 10px;
        border-radius: 5px;
    }

    .formUpdateFoodItem select.form-control {
        background-color: #fff;
        border: 1px solid #ccc;
        transition: border-color 0.3s ease;
    }

    .formUpdateFoodItem select.form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    @media (max-width: 768px) {
        .formUpdateFoodItem {
            padding: 15px;
            max-width: 100%;
        }
    }


    .search-container {
        display: flex;
        align-items: center;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 25px;
        padding: 5px 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .search-container input[type="text"] {
        border: none;
        outline: none;
        padding: 10px;
        font-size: 16px;
        border-radius: 25px;
        flex: 1;
    }

    .search-container button {
        border: none;
        background-color: #4caf50;
        color: white;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .search-container button:hover {
        background-color: #45a049;
    }
</style>