<?php

include("dbcon.php");
include("funtions/fun.php");


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>KisaanSewak</title>
</head>
<body>
<div class="back" align="center;">
	<div class="header" align="center"><h1>Welcome To KisaanSewak</h1></div>
    <div class="nevigation">
    	<table align="center" id="menu">
         <th><a href="index.php">Home</a></th>
         <th><a href="all_product.php">All Product</a></th>
         <th><a href="costumer/myaccount.php">My Account</a></th>
         <th><a href="costumer/checkout.php">Sign Up</a></th>
         <th><a href="getcart.php">Shopping Cart</a></th>
         <th><a href="contact.php">Contact Us</a></th>
			<th>
        <form action="result.php" method="post">
            <input class="in" type="text" name="searchitm" placeholder="Search For Item"><input id="se" type="submit" name="submit" value="Search">
				</form></th>
             

        </table>
    </div>
	
	
	
	<div id="basic">
	<?php echo "Number  save carts"
 . totlcart() ."   "   ; 
	echo "total price of save carts  "
 .  totalprice() ;
		addcart();?>
		<a id="UF" href="getcart.php">Go to cart</a>
		<h3 id="of">Are you farmer <a href="admin/register.php">Click here</a></h3>
	</div>
    <div class="content">
    	<div id="left">
		<div id="tittle" align="center">Categories</div>
			<ul id="cats">
				<?php
				getcats();
				
				?>
			</ul>
			
			
		</div>
        <div id="right">
			<div>
		<?php
			
			
			getpro();
			
			
			
				?></div>
		</div>
    </div><a align="right" href="costumer/logout.php">Log Out</a>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2019</div>
</div>
</body>
</html>