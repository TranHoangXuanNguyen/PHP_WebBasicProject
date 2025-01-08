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
    <div class="menu-banner d-flex align-items-center justify-content-center position-relative">
        <img src="\app\assets\img\Shop List.png" alt="Menu Banner" class="w-100 h-100 banner-image">
        <h1 class="position-absolute text-light text-center banner-title">FEED BACK</h1>
    </div>
    <div id="feed-container">
        <h1 class="feed-title text-center mb-5">Leave Feedback for Us</h1>

        <?php if (!empty($data['feedbacks'])): ?>
            <?php foreach ($data['feedbacks'] as $feedback): ?>
                <div class="contain d-flex align-items-center mb-4">
                    <div class="avatar me-3">
                        <img src="<?php echo htmlspecialchars($feedback['avataImg']); ?>" alt="User Avatar" class="image">
                    </div>
                    <div class="col-md-10 d-flex justify-content-between">
                        <div class="sub-contain">
                            <div class="user-name font-weight-bold"><?php echo htmlspecialchars($feedback['fullName']); ?></div>
                            <div class="feed-time text-muted"><?php echo date("d/m/Y", strtotime($feedback['create_at'])); ?></div>
                        </div>
                        <div class="icon-start">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <i class="fa<?php echo $i < 4 ? '-solid' : '-regular'; ?> fa-star"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-11 card feed-desc ms-5 mb-3"><?php echo htmlspecialchars($feedback['content']); ?></div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No feedback available yet.</p>
        <?php endif; ?>
   
    <div class="add-feedback mt-3">
        <label for="feedback-input" class="form-label">Write Feedback</label>
        <div class="d-flex align-items-center">
            <img src="https://aic.com.vn/wp-content/uploads/2024/12/anime-girl-00YxiJz.jpg" alt="User Avatar" class="userimage me-2">
            <form action="/home/addFeedback" method="POST" class="d-flex col-md-11">
                <input type="hidden" name="userId" value="<?php echo $_SESSION['userId']; ?>">
                <input type="text" id="content" name="content" placeholder="Add your feedback here" class="form-control" required>
                <button type="submit" class="arrow ms-3 bg-none">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
    </div>
    </div>
    <div id="pagination" class="pagination d-flex justify-content-end me-4">
        <?php if ($data['totalPages'] > 1): ?>
            <ul class="pagination">
                <li class="page-item <?php echo $data['page'] == 1 ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $data['page'] - 1; ?>" aria-label="Previous">&laquo; Prev</a>
                </li>
                <?php for ($i = 1; $i <= $data['totalPages']; $i++): ?>
                    <li class="page-item <?php echo $i == $data['page'] ? 'active' : ''; ?>">
                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <li class="page-item <?php echo $data['page'] == $data['totalPages'] ? 'disabled' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $data['page'] + 1; ?>" aria-label="Next">Next &raquo;</a>
                </li>
            </ul>
        <?php endif; ?>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
    const paginationContainer = document.getElementById('pagination');

    paginationContainer.addEventListener('click', function (event) {
        const link = event.target.closest('.page-link');
        if (link) {
            event.preventDefault();
            fetchPageData(link.href);
        }
    });

    function fetchPageData(url) {
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(response => response.json())
            .then(data => {
                renderFeedback(data.feedbacks);
                renderPagination(data.page, data.totalPages);
            })
            .catch(error => console.error('Error:', error));
    }

    function renderFeedback(feedbacks) {
        const feedbackContainer = document.getElementById('feed-container');
        const feedbackList = feedbacks.map(feedback => `
            <div class="contain d-flex align-items-center mb-4">
                <div class="avatar me-3">
                    <img src="${feedback.avataImg}" alt="User Avatar" class="image">
                </div>
                <div class="col-md-10 d-flex justify-content-between">
                    <div class="sub-contain">
                        <div class="user-name font-weight-bold">${feedback.fullName}</div>
                        <div class="feed-time text-muted">${new Date(feedback.create_at).toLocaleDateString()}</div>
                    </div>
                    <div class="icon-start">
                        ${'<i class="fa-solid fa-star"></i>'.repeat(4)}
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-11 card feed-desc ms-5 mb-3">${feedback.content}</div>
        `).join('');

        feedbackContainer.innerHTML = feedbackList + feedbackContainer.querySelector('.add-feedback').outerHTML;
    }

    function renderPagination(currentPage, totalPages) {
        const paginationHTML = `
            <ul class="pagination">
                <li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
                    <a class="page-link" href="?page=${currentPage - 1}" aria-label="Previous">&laquo; Prev</a>
                </li>
                ${Array.from({ length: totalPages }, (_, i) => `
                    <li class="page-item ${i + 1 === currentPage ? 'active' : ''}">
                        <a class="page-link" href="?page=${i + 1}">${i + 1}</a>
                    </li>
                `).join('')}
                <li class="page-item ${currentPage === totalPages ? 'disabled' : ''}">
                    <a class="page-link" href="?page=${currentPage + 1}" aria-label="Next">Next &raquo;</a>
                </li>
            </ul>`;
        
        paginationContainer.innerHTML = paginationHTML;
    }
});
    </script>

    </div>
    <?php
    include_once("app/components/footer.php");
    ?>
</body>

</html>