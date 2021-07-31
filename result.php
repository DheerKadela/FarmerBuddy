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
		     
         $serch=$_POST['searchitm'];
			if(isset($_POST['submit']))
			{
				$searchpro=$serch;
			 $getprosql="SELECT * FROM `products` WHERE product_title like '%$searchpro%'";
			$runpro=mysqli_query($con,$getprosql);
				$row=mysqli_num_rows($runpro);
				if($row!=NULL)
				{
			          while(($data=mysqli_fetch_array($runpro))!=NULL)
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
				}
				if($row==NULL)
				{
					?><script>alert("there is no item available")</script><?php
				}
			}
				?></div>
		</div>
    </div>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2018</div>
</div>
</body>
</html>