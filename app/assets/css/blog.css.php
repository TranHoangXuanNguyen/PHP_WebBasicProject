<style>
        * {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .menu-banner {
            position: relative;
            width: 100%;
            height: 50vh;
            margin-bottom: 20px;
        }

        .menu-banner img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

        .menu-banner h1 {
            font-size: 3rem;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .blogs {
            width: 100%;
            padding: 40px 70px;
        }

        .middle-content {
            display: flex !important;
        }

        .first-content .lg-image img {
            width: 550px;
            height: 300px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .first-content .lg-image img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .first-content .sm-image img {
            width: 300px;
            height: 200px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .first-content .sm-image img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .card {
            border: none;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }
        .card .image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover .image img {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .middle-content .lg-image img {
            width: 550px;
            height: 300px;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .middle-content .lg-image img:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .first-content.text {
            width: 300px;
        }

        .blog-title a {
            font-size: 1.25rem;
            color: rgb(248, 136, 7);
            margin-top: 10px;
            text-decoration: none;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }

        .subcontent {
            font-size: 1rem;
            margin-top: 5px;
            text-align: left;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .text .datetime {
            font-size: 0.85rem;
            color: #6c757d;
            margin: 10px;
        }

        .first-content .text,
        .middle-content .text {
            padding: 10px 0;
        }

        .last-content .image img {
            height: 180px;
        }

        .last-content .blog-title {
            font-size: 18px;
            margin: 10px;
        }

        .last-content .subcontent {
            font-size: 16px;
            margin: 10px;
        }
    </style>