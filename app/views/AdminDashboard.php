<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mamakitchen</title>
    <?php
    require_once("./app/assets/css/admin.css.php");
    ?>
</head>

<body>
    <?php
    require_once("app/components/header.php");
    ?>

    <div class="container">
        <div class="row">
            <div class="col-3 adminsidebar">
                <div class="adminsidebar_header">
                    <h1 class="adminsidebar_header__title mt-3 mb-3">MASTER ADMIN</h>
                </div>
                <div class="list-group">
                    <a href="#" autofocus class="list-group-item list-group-item-action list-group-btn load-page" data-page="AdminDashboard">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-btn load-page" data-page="AdminFoodItem">Manager food items</a>
                </div>
            </div>
            <div class="col-9">
                <div class="adminsidebar_header">
                    <h1 class="adminsidebar_header__title mt-3 mb-3 contentAdmin">MASTER ADMIN</h>
                </div>
                <div id="content">

                </div>
            </div>
        </div>
    </div>


    <?php
    include_once("app/components/footer.php");
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.load-page').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var page = this.getAttribute('data-page');
                    fetchContent(page);
                });
            });
        });

        function fetchContent(page) {
            fetch('/admin/fetchdata/' + page)
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('wrong fetch  ' + response.statusText);
                    }
                    return response.text();
                })
                .then(function(html) {
                    document.getElementById('content').innerHTML = html;
                })
                .catch(function(error) {
                    console.log('hmmm I dont know  ', error);
                });
        }
    </script>
</body>

</html>