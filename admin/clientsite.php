<?php
require_once('php/connection.php');
?>

<?php
session_start();

if(isset($_SESSION["clientsite"])) {

}else{
    header("location:clientsiteindex.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUPBOARD</title>
    <link rel="stylesheet" href="./css/clientsite.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="./slider.css?v=<?php echo time(); ?>">
</head>
<body>
    <nav>
        <div class="inner-nav">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Products</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="logout2.php">Logout</a></li>
            </ul>
            <hr></hr>
        </div>
    </nav>

<section class="start">
    <div class="header">
     <div class="header-section">
    <h1> Products </h1>
        </div>

    </div>
    <?php 
    
      $var = "SELECT ID, NAME, PRICE, DISCOUNT, Image, REMARKS from product";
      $data = mysqli_query($con, $var);
    ?>
    <div class="product-main">
    <div class="product">
         <?php
         while($row = mysqli_fetch_array($data)){
             echo '  <a href="productclient.php?id='.$row['ID'].'"> <div class="product-inside">
             <h5>'.$row['NAME'].'</h5>
             <div class="image">
                 <img src="image-file/hello.jpg" alt="">
             </div>
             <div class="price">
                <p class="price-bef"><del>'.$row['PRICE'].'</del><p>
                <p class="discount">'.$row['DISCOUNT'].'% Off<p>

             </div>
             <div class="fixed-price"><p>$'.($row['PRICE'] - ($row['DISCOUNT'] * $row['PRICE'])/100).'<p></div>

             <div class="desc">
             <p>'.$row['REMARKS'].'<p>
             </div>
         </div></a>
';
         }
         ?>
        </div>
    </div>
</section>
</body>
</html>

<script src="js/main.js"></script>
<script src="js/clientsite.js"></script>
<script>
    $(document).ready(function() {
            $(".product").lightSlider({
                loop: true,
                autoWidth:true,
                slideEndAnimation:true,
                speed: 600,
                //slideMargin:20,
                pager:false,
                //prevHtml:'<i class="fas fa-angle-left"></i>',
                //nextHtml:'<i class="fas fa-angle-right"></i>',
                pauseOnHover:true,
                pause:2000,
                auto: true,
            });
        }); 

</script>