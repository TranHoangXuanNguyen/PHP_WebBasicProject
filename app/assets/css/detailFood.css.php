<style>
    * {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background-color: #f9f9f9;
        color: #333;
    }

    .menu-banner {
        position: relative;
        width: 100%;
        height: 200px;
        margin-bottom: 20px;
    }

    .banner-image {
        object-fit: cover;
        width: 100%;
        height: 100%;
    }

    .banner-title {
        font-size: 2.5rem;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        color: #fff;
    }

    .detail-container {
        padding: 20px;
    }

    .img-fluid {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease;
    }

    .img-fluid:hover {
        transform: scale(1.05);
    }

    .food-name {
        font-size: 2rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }

    .food-description {
        color: #666;
        font-size: 1rem;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .price {
        font-size: 1.8rem;
        color: #ff9f0d;
        font-weight: bold;
        animation: pulse 2s infinite;
    }

    .quantity-buttons button {
        background-color: #ff9800;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 5px 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .quantity-buttons button:hover {
        background-color: #e68900;
    }

    .quantity-buttons input {
        width: 50px;
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin: 0 5px;
        padding: 5px;
        color: #555;
    }

    .btn-add-to-cart {
        background-color: #ff9f0d;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-add-to-cart:hover {
        background-color: #e68900;
        transform: scale(1.05);
    }

    .btn-add-to-cart:active {
        transform: scale(0.95);
    }

    .food-category {
        font-size: 1rem;
        color: #666;
        margin-top: 15px;
    }

    .food-category strong {
        color: #333;
    }

    .Desc-title,
    .food-relevant {
        font-size: 1.5rem;
        font-weight: bold;
        background: linear-gradient(90deg, #ff9800, #ffa726);
        -webkit-background-clip: text;
        /* Để áp dụng gradient cho text */
        color: transparent;
        /* Màu chữ trong suốt để gradient hiển thị */
        margin-bottom: 20px;
        text-transform: uppercase;
        /* Chuyển chữ sang in hoa */
        display: inline-block;
        /* Đảm bảo gradient áp dụng chuẩn */
    }

    .md-desc {
        font-size: 1.1rem;
        line-height: 1.8;
        text-align: justify;
        color: #444;
        margin-top: 10px;
        padding-left: 15px;
        border-left: 4px solid #ff9f0d;
    }

    .relevant-food .relevant-img {
        height: 250px;
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
    }

    .relevant-food .relevant-img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.3);
    }

    .relevant-food .col-md-4 {
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .menu-banner {
            height: 150px;
        }

        .banner-title {
            font-size: 2rem;
        }

        .food-name {
            font-size: 1.5rem;
        }

        .price {
            font-size: 1.2rem;
        }
    }
</style>