<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
        /* .menu-banner{
            width: 100%;
            height: 100px;
            padding: 0px;
        } */
        .menufood {
            padding-left: 150px;
            padding-top: 50px;
        }

        .category {
            font-size: 24px;
            font-weight: bold;
        }

        .category a {
            text-decoration: none;
            color: black;
        }

        .category:hover a {
            color: #ff9f0d;
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 300px;
            width: 100px;
            overflow: hidden;
            border-radius: 15px;
            /* border: 2px solid rgba(0, 0, 0, 0.1); */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* background-color: #f9f9f9; */
        }

        .image-container img {
            object-fit: cover;
            width: 300px;
            height: 100%;
            border-radius: 15px;
            transition: transform 0.4s ease, filter 0.3s ease;
            overflow: hidden;

        }

        .image-container:hover {
            transform: scale(1.05);
            border-radius: 15px;
            overflow: hidden;
        }

        .image-container:hover img {
            transform: scale(1.1);
            border-radius: 15px;
            overflow: hidden;
        }

        .nameFood {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            margin-top: 8px;
            gap: 20px;
        }

        .row-content {
            padding: 4px 0;
        }

        .row-content a {
            text-decoration: none;
            color: black;
        }

        .row-content:hover a {
            color: #ff9f0d;
        }
    </style>
</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>
    <!-- <div class="menu-banner">
                <h1 class="">MENU FOOD</h1>
                <img src="https://images.pexels.com/photos/17320991/pexels-photo-17320991/free-photo-of-a-bowl-of-soup-with-shrimp-lime-and-herbs.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
    </div> -->
    <div class="menufood container">
        <?php if (isset($data) && is_array($data) && !empty($data)): ?>
            <?php
            $categories = [];
            // Group products by categoryId
            foreach ($data as $item) {
                if (isset($item['categoryId'])) {
                    $categories[$item['categoryId']][] = $item;
                }
            }

            foreach ($categories as $categoryId => $items):
                $categoryName = htmlspecialchars($items[0]['category']);
            ?>
                <div class="row mb-5">
                    <div class="col-sm-4 image-container">
                        <img src="<?php echo htmlspecialchars($items[0]['image_url'] ?? 'default.jpg'); ?>" alt="Food image">
                    </div>
                    <div class="col-sm-6 ms-5">
                        <div class="category"><a href='<?php echo '/menu/foodlist/' . $categoryId ?>'><?php echo $categoryName; ?></a></div>
                        <?php
                        $itemCount = 0;
                        foreach ($items as $item):
                            if ($itemCount >= 4) break;
                            $itemCount++;
                        ?>
                            <div class="nameFood">
                                <div class="row-content d-flex justify-content-between">
                                    <div class="item"><a href=""><?php echo htmlspecialchars($item['item'] ?? 'No Name'); ?></a></div>
                                    <div class="price"><?php echo htmlspecialchars($item['price'] ?? '0.00'); ?></div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php
    include_once("app/components/footer.php");
    ?>
</body>

</html>