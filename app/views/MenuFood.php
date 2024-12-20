<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuFood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">    
    <?php
    require_once(__DIR__ . '/../assets/css/menuFood.css.php');
    ?>
</head>
<body>
    <?php
    require_once("app/components/header.php");
    ?>
    <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
        <img src="\app\assets\img\Shop List.png" alt="Menu Banner" class="w-100 h-100 banner-image">
        <h1 class="position-absolute text-light text-center banner-title">MENU FOOD</h1>
    </div>

    <div class="menufood container">
        <?php if (isset($data) && is_array($data) && !empty($data)):
            $categories = [];
            foreach ($data as $item) {
                if (isset($item['categoryId'])) {
                    $categories[$item['categoryId']][] = $item;
                }
            }
            foreach ($categories as $categoryId => $items):
                $categoryName = isset($items[0]['category']) ? htmlspecialchars($items[0]['category']) : 'Unknown Category';
        ?>
                <div class="card shadow-sm mb-5" style="border-radius: 15px; overflow: hidden;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?php echo htmlspecialchars($items[0]['image_url'] ?? 'default.jpg'); ?>"
                                alt="Food image"
                                class="image-container"
                                style="object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body ms-4">
                                <h5 class="category"><a href='<?php echo '/menu/foodlist/' . $categoryId ?>' class="text-decoration-none text-dark"><?php echo $categoryName; ?></a></h5>
                                <?php
                                $itemCount = 0;
                                foreach ($items as $item):
                                    if ($itemCount >= 4) break;
                                    $itemCount++;
                                ?>
                                    <div class="row-content d-flex justify-content-between align-items-center ">
                                        <span class="item"><a href='<?php echo '/detail/show/' . $item['foodId'] ?>' class="text-decoration-none text-secondary"><?php echo htmlspecialchars($item['item'] ?? 'No Name'); ?></a></span>
                                        <span class="price"><?php echo htmlspecialchars($item['price'] ?? '0.00'); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach;
        endif; ?>
    </div>
    <?php
    include_once("app/components/footer.php");
    ?>
</body>

</html>