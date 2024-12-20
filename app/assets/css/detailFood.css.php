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
        height: 50hv;
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

    .image-detail {
        width: 100%;
        height: 350px;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .image-detail {
        width: 100%;
        height: 100%;
        max-height: 350px;
        object-fit: cover;
        border-radius: 8px;
    }

    .image-detail:hover {
        transform: scale(1.05);
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.3);
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
        width: 35px;
        height: 40px;
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
        color: transparent;
        margin-bottom: 20px;
        text-transform: uppercase;
        display: inline-block;
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

    .food-item {
        border: none !important;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        border-radius: 10px;
        min-height: 420px;
        margin-bottom: 15px;
        margin-left: 15px;
    }

    .food-item img {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        height: 300px;
        width: 100%;
        object-fit: cover;
        display: block;
    }

    .food-item:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        cursor: pointer;
    }

    .food-title {
        font-weight: bold;
        margin-bottom: 0px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        text-transform: capitalize;
    }

    .food-title,
    .price {
        text-align: left;
        margin-left: 10px;
        display: block;
    }

    .food-title:hover {
        color: black !important;
        text-decoration: none;
    }

    .r-price {
        color: #FF9F0D;
        margin-top: 0px;
        color: orange !important;
        ;
        padding-left: 50px;
    }

    .food {
        border: none !important;
        padding: 0px;
        margin-top: 10px;
        text-align: center;
        margin-bottom: 15px;
    }

    .r-price:hover {
        color: #FF9F0D !important;
        text-decoration: none !important;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 2rem 2rem !important;
        ;
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