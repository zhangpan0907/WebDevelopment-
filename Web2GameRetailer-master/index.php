<!DOCTYPE html>
<html lang="en">
<head>
  <?php $pagetitle = "Home - Funity"; require_once "include/head.inc.php"; ?>
  <script src="scripts/script.js" defer></script>
</head>


<body>
  <?php require_once "include/banner.inc.php";?>
    <br>
    <br>
    <div class = "box2">
        <h1>Featured Products</h1>
        <div class="slideshow-container">

            <div class ="slides">
                <a href="product.php?id=3" class="featprod">Funity Speedcube X200</a><br><br>
                <a href="product.php?id=3"><img src="pictures/cube1.jpg" title="Funity Speedcube X200" class="slideshowimg"></a><br>
                <div class="numbertext">1 / 5</div>
            </div>    

            <div class ="slides">
                <a href="product.php?id=6" class="featprod">Glass Chess</a><br><br>
                <a href="product.php?id=6"><img src="pictures/chess1.jpg" title="Glass Chess" class="slideshowimg"></a><br>
                <div class="numbertext">2 / 5</div>
            </div>  

            <div class ="slides">
                <a href="product.php?id=4" class="featprod">Xtreme 2 Dice Set</a><br><br>
                <a href="product.php?id=4"><img src="pictures/dice2.jpg" title="Xtreme 2 Dice Set" class="slideshowimg"></a><br>
                <div class="numbertext">3 / 5</div>
            </div>  

            <div class ="slides">
                <a href="product.php?id=7" class="featprod">Pick-Up-Sticks</a><br><br>
                <a href="product.php?id=7"><img src="pictures/pus1.jpg" title="Pick-Up-Sticks" class="slideshowimg"></a><br>
                <div class="numbertext">4 / 5</div>
            </div>  

            <div class ="slides">
                <a href="product.php?id=8" class="featprod">Word Game</a><br><br>
                <a href="product.php?id=8"><img src="pictures/word1.jpg" title="Word Game" class="slideshowimg"></a><br>
                <div class="numbertext">5 / 5</div>
            </div>
              
        </div>

        <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span>
    </div>
    <br>
    <div class = "box3">
        <h2>About Us</h2>
        <p5>Funity was founded in 1991 with the sole purpose of manufacturing high quality wooden toys. After being recongnised by the public as a qulity brand, Funity expanded their market into board games and board game accessories. Funity immediately found success in this market and has been the top board game manufacturer ever since. </p5>
        <br><br><p5>To celebrate the launch of the Funity website use the following coupon code to recieve 20% of any online purchase</p5><br>
        <br><h1>2020RELEASE</h1><br>
        <p5>Thankyou for your continued support</p5>
    </div>
  </div>
  <div class="bottomspace">
  </div>
</button>
</body>
</html>
