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
            <input class="in" type="text" name="searchitm" placeholder="Search For Item"><input id="se" type="submit" name="submit" value="Search">
				</form></th>
    

        </table>
    </div>
	
	
	
	<div id="basic">
	
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
				<table align="center" style="background-color: aqua" cellpadding="10px"><th>Remove</th><th>Product</th><th>Quantity</th><th>Price</th>
				<?php $ip=1;
	$total=0;
	global $db;
	$sql="SELECT * FROM `cart` WHERE ip_ad='$ip'";
	$run=mysqli_query($db,$sql);
	while(($data=mysqli_fetch_assoc($run))!=NULL)
	{
		$pid=$data['p_id'];
		$qry="SELECT * FROM `products` WHERE product_id='$pid'";
		$qryrun=mysqli_query($db,$qry);
		while(($info=mysqli_fetch_assoc($qryrun))!=NULL)
		{
			$value=$info['product_price'];
			$total+=$value;
			$pro_tittle=$info['product_title'];
			$pro_img=$info['product_img1'];
			?>
					<form action="getcart.php" method="post" enctype="multipart/form-data">
		            <?php $remove=array(); 
		            ?>

				<tr><td  > <?php echo "<a href='getcart.php?idl=$pid'>Remove</a>" ?>
						<td><?php echo $pro_tittle; ?><img style="height: 50px; width: 50px;" src="admin/images/<?php echo $pro_img;?>"></td>
						<td><input type="int"  name="quntity[]" value="1" size="10px"></td> 
					<td> <?php echo $value; ?></td> 
						
						</tr><?php
					}
						}?>
						<tr>	
							<td  ><button name="checkout"><a href="costumer/checkout.php">CheckOut</a></button> </td>
							<td  ><input type="submit" name="info" value="countinue shopping"> </td>
							<td align="right" style="margin-right: "><h5>Sub Total $<?php echo $total;?></h5></td></tr>
				</form>
					<?php
		             
	                if(isset($_POST['info']))
					{
						?><script>window.open('index.php','_self')</script><?php
					}
				
					
					?>
				
			      <?php
					if(isset($_POST['checkout']))
					{
						?><script>window.open('costumer/checkout.php','_self')</script><?php
					}
					
					if(isset($_GET['idl']))
					{
						$remove_id=$_GET['idl'];
							   $delete="DELETE FROM `cart` WHERE p_id='$remove_id'";
							   $rundelete=mysqli_query($con,$delete);
							   if($rundelete!=NULL)
							   {
							   	
							   	?><script>window.open('getcart.php','_self')</script><?php
							   }
							  
						   
					}
					
					?>
				</table>
				<a align="right" href="costumer/logout.php">Log Out</a>
		</div>
		</div>
    </div>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2018</div>
</div>
</body>
</html>