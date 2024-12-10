<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <?php
    require_once("./app/assets/css/home.css.php");
  ?>
</head>
<body>
<?php
  require_once("app/components/header.php");
?>

<div class="banner">
    <div class="container">
        <div class="row px-5">
            <div class="col-sm-5">
                <h1 class="display-5 fw-bold text-start mb-5 paddingTop70">The Art of speed
                food Qualitys</h1>
                <p class="text-start mb-5 chuto">We will provide you with the best service.</p>
                
                <button class="btn">Book Table</button>
            </div>
            <div class="col-sm-7 caibaobo">
            
                <img class="imgSlide1" src="./app/assets/img/slide6.png" alt="">
                <img class="imgSlide2" src="./app/assets/img/lief.png" alt="">
           
            </div>
        </div>
    </div>
</div>

<div class="container">
<div class="row rowNhungMaNoVipHon">
            <div class="col-sm-5">
                <h2 class="display-5 text-start mb-5 paddingTop70 blackText">Bringing the taste of home to you</h2>
                <p class="text-start mb-5 chuvua blackText">Bringing the comforting taste of home to you, with flavors that remind you of warmth, love, and family traditions. Experience the familiar and cherished dishes that make every meal feel like a moment of togetherness.</p>
                <p class="text-start mb-3 chuto blackText">✔ A team of experienced chefs..</p>
                <p class="text-start mb-3 chuto blackText">✔ Has served important guests.</p>
                <p class="text-start mb-5 chuto blackText">✔ Varied menu changes..</p>
                
                <button class="btn">About us</button>
            </div>
            <div class="col-sm-7 imgContai">
              <div class="inRight img-3CaiAnhSieuDepTrai">
              <div class="img-row1">
                  <img class="imgContact1" src="./app/assets/img/anhthunhattrong3caianh.png" alt="">
                </div>
                <div class="img-row2">
                  <img class="imgContact2" src="./app/assets/img/anhthu2trong3caianh.png" alt="">
                  <img class="imgContact2" src="./app/assets/img/anhthu3trong3caianh.png" alt="">
                  
                </div>
              </div>
               

            </div>
        </div>      
</div>
<div class="container">
<div class="row">
    <div class="rowHeader">
    <h2 class="display-5 text-start mb-5 paddingTop70 blackText text-center">Choose Food Item</h2>
    </div>
    <div class="rowContent">
      <div class="rowContentSession">
      <img class="rowContent_img" src="./app/assets/img/slide6.png" alt="">
      </div>
      <div class="rowContentSession">
      <img class="rowContent_img" src="./app/assets/img/slide6.png" alt="">
      </div>
      <div class="rowContentSession">
      <img class="rowContent_img" src="./app/assets/img/slide6.png" alt="">
      </div>
      <div class="rowContentSession">
      <img class="rowContent_img" src="./app/assets/img/slide6.png" alt="">
      </div>

    </div>
     
  </div>
</div>

<?php
  include_once("app/components/footer.php");
?>
</body>
</html>
