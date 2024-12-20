<style>
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
            font-size: 3rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .menufood {
            padding-left: 150px;
            padding-top: 30px;
        }

        .category {
            font-size: 24px;
            font-weight: bold;
        }

        .item {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .price {
            font-size: 20px;
            text-align: right;
            color: #ff9f0d;
        }

        .row-content {
            padding: 8px 0px;
        }

        .image-container {
            width: 100%;
            height: 289px;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4); /* Độ bóng đậm và rõ hơn */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .image-container:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        .nameFood {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-top: 8px;
            gap: 20px;
        }
        .col-md-8 a:hover{
            color: #ff9f0d !important;
        }
    </style>