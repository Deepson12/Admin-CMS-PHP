<?php
if($_GET['id'])
{
$id = $_GET['id'];
?>
<?php
require_once('php/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>AlienWare Area 51m - Gaming Lab </title>
	<link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:ital@0;1&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="product-card.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/productclient.css?v=<?php echo time(); ?>">

<body>

	<div class="container">
		<div class="navbar">

		<nav>
			<ul id="MenuItems">
				<li><a href="">Home</a></li>
				<li><a href="">Products</a></li>
				<li><a href="">About</a></li>
				<li><a href="">Contact</a></li>
				<li><a href="">Account</a></li>
			</ul>
		</nav>
		<img src="images/menu.png" class="menu-icon" onclick="menutoogle()">
	</div>
	
	</div>

    <?php 
    
    $var = "SELECT ID, NAME, PRICE, DISCOUNT, Image, REMARKS from product WHERE id='$id'";
    $data = mysqli_query($con, $var);
  ?>

	<!---single product details--->

	<div class="small-container single-product">
		<div class="row">
			<div class="col-2">

				<img src="image-file/hello.jpg" width="100%" id="ProductImg">
	


				<div class="small-img-row">
					<div class="small-img-col">
						<img src="image-file/hello.jpg" width="100%" class="small-img">
					</div>
					<div class="small-img-col">
						<img src="image-file/hello.jpg" width="100%" class="small-img">
					</div>
				
				</div>




			</div>      
            
            <?php
    $row = mysqli_fetch_array($data);

             echo ' <div class="col-2">
             <p>Home / Shoe</p>
             <h1>'.$row['NAME'].'</h1>
             <h4>$'.($row['PRICE'] - ($row['DISCOUNT'] * $row['PRICE'])/100).'</h4>
             <select>
                 <option>Select Colour</option>
                 <option>White</option>
                 
             </select>
             <input id="quantity" type="number" value="1">
             <button id="submit-btn" name="myid">Submit</button>
             <h3>Product Details <i class="fa fa-indent"></i></h3>
             <br>
             <p>'.$row['REMARKS'].'</p>
         </div>
';
    
         ?>
			
		</div>
	</div>

<!-----------title--------->

<div class="small-container">
	<div class="row row-2">
		<h2>Related Products</h2>
		<p>View More</p>
	</div>
</div>

<!--------products-------->

	<div class="small-container">
		
		<div class="row">
						<div class="card3">
	<div class="imgBx3">
		<img src="image-file/hello.jpg">
	</div>
	<div class="contentBx3">
		<h3>X Box 3</h3>
		<h2 class="price price2">$559.<small class="price price2">99</small></h2>
		<a href="#" class="buy">Buy Now</a>
	</div>
</div>	<div class="card3">
	<div class="imgBx3">
		<img src="image-file/hello.jpg">
	</div>
	<div class="contentBx3">
		<h3>Nintendo Switch</h3>
		<h2 class="price price2">$199.<small class="price price2">99</small></h2>
		<a href="#" class="buy">Buy Now</a>
	</div>
</div>	<div class="card3">
	<div class="imgBx3">
		<img src="image-file/hello.jpg">
	</div>
	<div class="contentBx3">
		<h3>Logitech G502 Lightspeed</h3>
		<h2 class="price price2">$199.<small class="price price2">99</small></h2>
		<a href="product-details6.html" class="buy">Buy Now</a>
	</div>
</div>
		</div>
    </div>
</div>
        




</body>
</html>

<script src="js/main.js"></script>
<script>

        $("#submit-btn").click(function() {

            var quantity = $("#quantity").val();


        $.ajax({
        url: "php/myprosubmit.php",
        type: "post",
     data: { ID: <?php echo $id;?>, quantity: quantity},
        success: function(response) {
            alert ("hello");
            alert (response);
            setTimeout(function() { window.location.reload(); }, 1000);
            jQuery("#submit-btn").attr("disabled", false);
        }
    
        });
        });
</script>

<?php }
else
{
    echo 'url not found';
}


?>
