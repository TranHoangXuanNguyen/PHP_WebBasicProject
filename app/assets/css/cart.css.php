<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        color: #333;
    }
    .cart-header {
        background-color: #e9ecef;
        border-radius: 8px;
        padding: 10px;
        font-weight: bold;
    }
    .cart-header div,
    .cart-item div {
        flex: 2;
        text-align: center;
    }

    .cart-header .product-info,
    .cart-item .product-info {
        flex: 2;
        display: flex;
        align-items: center;
        justify-content: start;
    }

    .cart-header .remove-btn,
    .cart-item .remove-btn {
        flex: 0.5;
        text-align: center;
    }

    .quantity-control {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    .quantity-control button {
        border: 1px solid #ddd;
        background-color: white;
        width: 30px;
        height: 30px;
        border-radius: 5px;
        color: #333;
        transition: background-color 0.3s;
    }

    .quantity-control button:hover {
        background-color: #ff8800;
        color: white;
    }

    .quantity-control input {
        width: 50px;
        text-align: center;
        height: 30px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    .remove-btn {
        background: none;
        border: none;
        cursor: pointer;
    }

    .remove-btn i {
        color: #ff7700;
    }

    .remove-btn:hover i {
        color: #d9534f;
    }

    .btn-checkout {
        background-color: #ff8800;
        color: white;
        font-weight: bold;
        font-size: 13px;
        border: none;
        padding: 10px 0;
        width: 100%;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-checkout:hover {
        background-color: #ff7700;
    }

    .cart-summary {
        border-top: 2px solid #ddd;
        padding-top: 15px;
        margin-top: 20px;
    }

    .cart-summary .d-flex {
        margin-bottom: 10px;
    }

    .cart-summary .d-flex:last-child {
        margin-bottom: 0;
    }

    .cart-summary span {
        font-size: 18px;
        font-weight: bold;
    }

    .status-pagination .page-item.active .page-link {
        background-color: #ff8800;
        color: white;
        font-weight: bold;
        border-color: #ff7700;
    }

    .status-pagination .page-link {
        color: #6c757d;
        transition: color 0.3s, background-color 0.3s;
    }

    .status-pagination .page-item:not(.active) .page-link:hover {
        color: #ff8800;
        background-color: #f8f9fa;
    }

    .image {
        width: 50px;
        height: 50px;
        border-radius: 5px;
        object-fit: cover;
    }

    .status-pagination {
        gap: 5px;
    }
    #processing {
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 5px;
    }
    .cart-status {
        background-color:#e9ecef;
        margin: 10px;
        padding: 10px;
        border-radius: 5px;
        font-weight: bold;
        color: #343a40;
        font-size: 16px;
    }
    .cart-item {
        margin-bottom: 15px;
        display: flex;
        justify-content: space-between;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .cart-item:hover {
        background-color: #f1f1f1;
    }
    .cart-item .col {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alert-warning {
        background-color: #f8d7da;
        color: #721c24;
        margin: 10px;
        padding: 15px;
        text-align: center;
        border-radius: 5px;
        font-size: 14px;
        margin-top: 20px;
    }
    .cart-item .col:nth-child(3) {
        color:  #ff7700;
        font-weight: bold;
    }
</style>