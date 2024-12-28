<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .feed-container {
            padding: 20px 30px;
            max-width: 80%;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .userimage {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .arrow {
            font-size: 20px;
            color: #f5c518;
            cursor: pointer;
            transition: transform 0.3s;
            border: none;
        }

        .arrow:hover {
            transform: scale(1.1);
            color: #f5c518;
        }

        button[type="submit"].bg-none {
            background-color: transparent !important;
            border: none;
        }

        .icon-start i {
            color: #ccc;
            font-size: 20px;
            transition: color 0.3s;
        }

        .icon-start i.fa-solid {
            color: #f5c518;
        }

        .icon-start i:hover {
            color: #f5c518;
        }

        .card.feed-desc {
            background-color: #fefefe;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            padding: 15px;
            color: #555;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #f5c518;
            outline: none;
            box-shadow: 0 0 5px rgba(204, 178, 6, 0.5);
        }

        .feed-title {
            font-weight: bold;
            color: #333;
            font-size: 24px;
        }

        .btn-warning {
            margin-left: 400px;
            border: none;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>
    <div class="feed-container">
    <h1 class="feed-title text-center mb-5">Leave Feedback for Us</h1>

    <!-- Hiển thị tất cả các feedback -->
    <?php if (!empty($data['feedbacks'])): ?>
        <?php foreach ($data['feedbacks'] as $feedback): ?>
            <div class="contain d-flex align-items-center mb-4">
                <div class="avatar me-3">
                    <img src="https://aic.com.vn/wp-content/uploads/2024/12/anime-girl-00YxiJz.jpg" alt="User Avatar" class="image">
                </div>
                <div class="col-md-10 d-flex justify-content-between">
                    <div class="sub-contain">
                        <div class="user-name font-weight-bold">
                            <?php echo htmlspecialchars($feedback['fullName']); ?>
                        </div>
                        <div class="feed-time text-muted">
                            <?php echo date("d/m/Y", strtotime($feedback['create_at'])); ?>
                        </div>
                    </div>
                    <div class="icon-start">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <i class="fa<?php echo $i < 3 ? '-solid' : '-regular'; ?> fa-star"></i>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-11 card feed-desc ms-5 mb-3">
                <?php echo htmlspecialchars($feedback['content']); ?>
            </div>
        <?php endforeach; ?>

        <!-- Hiển thị nút "Xem thêm" nếu có nhiều hơn 5 bình luận -->
        <?php if ($data['totalFeedbacks'] > 5): ?>
            <a href="/Feedback/viewAll" class="btn btn-warning mt-3" id="load-more">Xem thêm</a>
        <?php endif; ?>
    <?php else: ?>
        <p>No feedback available yet.</p>
    <?php endif; ?>

    <!-- Form gửi feedback mới -->
    <div class="add-feedback mt-3">
        <label for="feedback-input" class="form-label">Write Feedback</label>
        <div class="d-flex align-items-center">
            <img src="https://aic.com.vn/wp-content/uploads/2024/12/anime-girl-00YxiJz.jpg" alt="User Avatar" class="userimage me-2">
            <form action="/Feedback/addFeedback" method="POST" class="d-flex col-md-11">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">
                <input type="text" id="content" name="content" placeholder="Add your feedback here" class="form-control" required>
                <button type="submit" class="arrow ms-3 bh-none">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>
    <?php
    include_once("app/components/footer.php");
    ?>
</body>

</html>