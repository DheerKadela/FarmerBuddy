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
         <th><a href="#">Contact Us</a></th>
			<th>
        <form action="#" method="post">
            <input class="in" type="text" name="searchitm" placeholder="Search For Item"><input id="se" type="submit" name="submit" value="Search">
				</form></th>
    

        </table>
    </div>
    <div class="content">
    	<div id="left">
		<div id="tittle" align="center">Categories</div>
			<ul id="cats">
				<?php
				getcats();
				
				?>
			</ul>
			<div id="tittle" align="center">Brands</div>
			<ul id="cats">
				<?php
				getbrand();
				?>
				
			</ul>
			
		</div>
        <div id="right">
			<div>
		<?php
			
			
			$getprosql="SELECT * FROM `products`";
			$run=mysqli_query($con,$getprosql);
			while(($data=mysqli_fetch_assoc($run))!=NULL)
			{
			 
			$tittle=$data['product_title'];
			    $pid=$data['product_id'];
				$pimg=$data['product_img1'];
				
				$pprice=$data['product_price'];

				$cid=$data['cat_id'];
				$bid=$data['brand_id'];
				$dec=$data['dec'];
				echo "
				<div id='prodalign'>
				<h3 >$tittle</h3>
				<img src='admin/images/$pimg' style='float:center; height:180px; width:180px;'/>
				<a href='detail.php?proid=$pid' style='float:left;'>Detail</a>
				
				<a href='index.php' style='float:right; '><button>Add To Cart</button></a>
				</div>
				
				
				";}
			
			
			
				?></div>
		</div>
    </div>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2018</div>
</div>
</body>
</html>