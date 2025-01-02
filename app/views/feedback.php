<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <?php
    require_once(__DIR__ . '/../assets/css/feedback.css.php');
    ?>
</head>
<body>
    <?php
    require_once("app/components/header.php");
    ?>
    <div class="feed-container">
    <h1 class="feed-title text-center mb-5">Leave Feedback for Us</h1>

    <?php if (!empty($data['feedbacks'])): ?>
        <?php foreach ($data['feedbacks'] as $feedback): ?>
            <div class="contain d-flex align-items-center mb-4">
                <div class="avatar me-3">
                    <img src="https://i.pinimg.com/736x/8f/1c/a2/8f1ca2029e2efceebd22fa05cca423d7.jpg" alt="User Avatar" class="image">
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

        <?php if ($data['totalFeedbacks'] > 5): ?>
            <a href="/Feedback/viewAll" class="btn btn-warning mt-3" id="load-more">Xem thêm</a>
        <?php endif; ?>
    <?php else: ?>
        <p>No feedback available yet.</p>
    <?php endif; ?>

    <div class="add-feedback mt-3">
        <label for="feedback-input" class="form-label">Write Feedback</label>
        <div class="d-flex align-items-center">
            <img src="https://aic.com.vn/wp-content/uploads/2024/12/anime-girl-00YxiJz.jpg" alt="User Avatar" class="userimage me-2">
            <form action="/Feedback/addFeedback" method="POST" class="d-flex col-md-11">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">
                <input type="text" id="content" name="content" placeholder="Add your feedback here" class="form-control" required>
                <button type="submit" class="arrow ms-3 bg-none">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const viewmore = document.getElementById('load-more');
        const totalFeedbacks = <?php echo json_encode($data['totalFeedbacks']); ?>; 

        if (viewmore) { 
            viewmore.addEventListener('click', function () {
                if (totalFeedbacks > 5) {
                    viewmore.style.display = 'none';
                }
            });
        }
    });
</script>
    <?php
    include_once("app/components/footer.php");
    ?>
</body>
</html>