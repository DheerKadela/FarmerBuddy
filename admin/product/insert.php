<?php
include("../dbcon.php");


session_start();
@$emel=$_SESSION['emil'];
if(isset($emel))
{
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>KisaanSewak</title>
</head>

<body>
	<table align="center">
	<form action="insert.php" method="post" enctype="multipart/form-data">
		<tr><td colspan="2"><h1>Insert Product</h1></td></tr>
		<tr><td>Product Tittle</td><td><input type="text" name="product_tittle"></td></tr>
		<tr><td>Category Tittle</td><td><input type="varchar" name="ctitl"></td></tr>
		<tr><td>Brand Tittle</td><td><input type="varchar" name="btitl"></td></tr>
		<tr><td>Product Image1</td><td><input type="file" name="img1"></td></tr>
		<tr><td>Product Image2</td><td><input type="file" name="img2"></td></tr>
		<tr><td>Product Image3</td><td><input type="file" name="img3"></td></tr>
		<tr><td>Product Description</td><td><textarea name="dec"></textarea></td></tr>
		<tr><td>Product Price</td><td><input type="varchar" name="price"></td></tr>
		<tr><td>Product Key</td><td><input type="text" name="key"></td></tr>
		<tr><td></td><td colspan="2"><input type="submit" name="submit" value="add product"></td>
		<td></td><td><input type="reset" name="reset" value="reset"></td><td><a href="logout.php">LogOut</a></td></tr>
		
		
		</form>
	</table>
</body>
</html>


<?php
if(isset($_POST["submit"]))
{
	$ptitl=$_POST['product_tittle'];
	$ctitl=$_POST['ctitl'];
	$btitl=$_POST['btitl'];
	$imgnm1=$_FILES['img1']['name'];
	$imgnm2=$_FILES['img2']['name'];
	$imgnm3=$_FILES['img3']['name'];
	$imgtnm1=$_FILES['img1']['tmp_name'];
	$imgtnm2=$_FILES['img2']['tmp_name'];
	$imgtnm3=$_FILES['img3']['tmp_name'];
	move_uploaded_file($imgtnm1,"../images/$imgnm1");
	move_uploaded_file($imgtnm2,"../images/$imgnm2");
	move_uploaded_file($imgtnm3,"../images/$imgnm3");
	$decr=$_POST['dec'];
	$pric=$_POST['price'];
	$key=$_POST['key'];
	$brandsql="INSERT INTO `brand`(`brand_title`) VALUES ('$btitl')";
	$runsql=mysqli_query($con,$brandsql);
	$brnadidsql="SELECT * FROM `brand` WHERE brand_title='$btitl'";
	$run=mysqli_query($con,$brnadidsql);
	$data=mysqli_fetch_assoc($run);
	$brandid=$data['brand_id'];
	$catsql="INSERT INTO `categories`(`cat_tittle`) VALUES ('$ctitl')";
    $catrun=mysqli_query($con,$catsql);
	$catidsql="SELECT * FROM `categories` WHERE cat_tittle='$ctitl'";
	$catidrun=mysqli_query($con,$catidsql);
	$iddata=mysqli_fetch_assoc($catidrun);
	$catid=$iddata['cat_id'];
	$insertsql="INSERT INTO `products`(`cat_id`, `brand_id`,  `product_title`, `product_img1`, `Product_img2`, `Product_img3`, `product_price`, `dec`, `status`,`f_id`) VALUES ('$catid','$brandid','$ptitl','$imgnm1','$imgnm2','$imgnm3','$pric','$decr','$key',)";
	$insertrun=mysqli_query($con,$insertsql);
		
	
}

}

else
{
?><script type="text/javascript"> window.open('../register.php', '_self') </script> <?php
}
?>
