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
         <th><a href="#">My Account</a></th>
         <th><a href="user/signup.php">Sign Up</a></th>
         <th><a href="#">Shopping Cart</a></th>
         <th><a href="#">Contact Us</a></th>
			<th>
        <form action="result.php" method="post">
            <input class="in" type="text" name="searchitm" placeholder="Search For Item"><input id="se" type="submit" name="search" value="Search">
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
			
			if(isset($_GET['proid'])){
				$productid=$_REQUEST['proid'];
			 $getprosql="SELECT * FROM `products` WHERE product_id='$productid'";
			$run=mysqli_query($con,$getprosql);
			while(($data=mysqli_fetch_assoc($run))!=NULL)
			{
			 
			$tittle=$data['product_title'];
			    $pid=$data['product_id'];
				$pimg=$data['product_img1'];
				$pimg2=$data['Product_img2'];
				$pimg3=$data['Product_img3'];
				
				$pprice=$data['product_price'];

				$cid=$data['cat_id'];
				$bid=$data['brand_id'];
				$dec=$data['dec'];
				echo "
				<div id='prodalign'>
				<h3 >$tittle</h3>
				<img src='admin/images/$pimg' style='float:center; height:180px; width:180px;'/>
				<img src='admin/images/$pimg2' style='float:center; height:220px; width:220px;'/>
				<img src='admin/images/$pimg3' style='float:center; height:220px; width:220px;'/>
				<a href='index.php' style='float:left;'>Back To Home</a>
				<h4>Price=>$pprice</h4><h4>$dec</h4>
				<a href='index.php' style='float:right; '><button>Add To Cart</button></a>
				</div>
				
				
				";}
			
			}
				?></div>
		</div>
    </div>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2018</div>
</div>
</body>
</html>