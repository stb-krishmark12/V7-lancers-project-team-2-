<?php

session_start();

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "ecart";





// Create connection
$connect = new mysqli($host, $dbusername, $dbpassword, $dbname);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
	<link rel="stylesheet" type="text/css" href="./style cart.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
</head>
<body>
   <div class="CartContainer">
   	   <div class="Header">
   	   	<h3 class="Heading">Shopping Cart</h3>
   	   	<h5 class="Action">Remove all</h5>
   	   </div>

   	   <!-- <div class="Cart-Items">
   	   	  <div class="image-box">
   	   	  	<img src="triticale.png" style="width: 100%;height: 100%;" />
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="title">Triticale</h1>
   	   	  	<h3 class="subtitle">500gm</h3>
   	   	  	<img src="images/veg.png" style={{ height="30px" }}/>
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count">1</div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount">Rs.150/500</div>
   	   	  	<div class="save"><u>Save for later</u></div>
   	   	  	<div class="remove"><u>Remove</u></div>
   	   	  </div>
   	   </div> -->
		  <?php
    $total_amount = 0;
    $query = "SELECT * FROM cart WHERE user_id='".$_SESSION["id"]."'";
    $statement=mysqli_query($connect,$query);
    $total_row = mysqli_num_rows($statement);
    ?>
	<?php
            while($row = mysqli_fetch_assoc($statement)){
                $query2 = "SELECT * FROM products WHERE product_id=".$row["product_id"]."";
                $statement2=mysqli_query($connect,$query2);
                $row2 = mysqli_fetch_assoc($statement2);
            ?>
			<div class="Cart-Items pad">
   	   	  <div class="image-box">
   	   	  	<img src="<?php echo $row2["product_image"]; ?>.png" style={{ height="120px" }} />
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="title"><?php echo $row2["product_name"]; ?></h1>
   	   	  	<!-- <h3 class="subtitle">250ml</h3> -->
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count"><?php echo $row2["product_quantity"]; ?>g</div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount"><?php $total_amount+=$row2["product_prize"]; echo $row2["product_prize"]; ?></div>
   	   	  	<div class="save"><u>Save for later</u></div>
   	   	  	<div class="remove" id="<?php echo $row["product_id"] ?>"><u>Remove</u></div>
   	   	  </div>
   	   </div>
          <?php } ?>

   	   <!-- <div class="Cart-Items pad">
   	   	  <div class="image-box">
   	   	  	<img src="rice.png" style={{ height="120px" }} />
   	   	  </div>
   	   	  <div class="about">
   	   	  	<h1 class="title">Rice</h1>
   	   	  	<h3 class="subtitle">500gm</h3>
   	   	  	<img src="images/veg.png" style={{ height="30px" }}/>
   	   	  </div>
   	   	  <div class="counter">
   	   	  	<div class="btn">+</div>
   	   	  	<div class="count">1</div>
   	   	  	<div class="btn">-</div>
   	   	  </div>
   	   	  <div class="prices">
   	   	  	<div class="amount">Rs150/500g</div>
   	   	  	<div class="save"><u>Save for later</u></div>
   	   	  	<div class="remove"><u>Remove</u></div>
   	   	  </div>
   	   </div> -->
   	 <hr> 
   	 <div class="checkout">
   	 <div class="total">
   	 	<div>
   	 		<div class="Subtotal">Sub-Total</div>
   	 		<div class="items"><?php echo $total_row; ?></div>
   	 	</div>
   	 	<div class="total-amount"><?php echo $total_amount; ?></div>
   	 </div>
   	 <button class="button">Checkout</button></div>
   </div>
</body>
</html>