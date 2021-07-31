<?php
session_start();
@$email=$_SESSION['email'];
if(isset($email))
{
	$ip=1;
	$db=mysqli_connect("sql205.epizy.com","epiz_29286453","GQQVuX9Ntepb","epiz_29286453_myshop");
	$sql="SELECT * FROM `cart` WHERE ip_ad='$ip'";
	$run=mysqli_query($db,$sql);
	$cont=0;
	while(($data=mysqli_fetch_assoc($run))!=NULL)
	{
		$cont++;
	}
	if($cont==NULL)
	{
		?><script>window.open('../index.php','_self')</script><?php
    }
	else
	{
		?><script>window.open('payment.php','_self')</script><?php
	}

}
else
{
	

include("dbcon.php");
include("../funtions/fun.php");


?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<title>KisaanSewak</title>
</head>
<body>
<div class="back" align="center;">
	<div class="header" align="center"><h1>Welcome To Online KisaanSewak</h1></div>
    <div class="nevigation">
    	<table align="center" id="menu">
         <th><a href="../index.php">Home</a></th>
         <th><a href="../all_product.php">All Product</a></th>
         <th><a href="myaccount.php">My Account</a></th>
         <th><a href="checkout.php">Sign Up</a></th>
         <th><a href="../getcart.php">Shopping Cart</a></th>
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
		       <?php//login system?>
	
	<table align="left" style="margin-top: 0px; background-color: khaki; float: right; height: 600px; width: 575px">
   	<form action="checkout.php" method="post">
   	<tr>
   	<td>Enter Your Email
   	</td></tr>
   <tr>	<td><input type="email" name="uname"></td></tr>
   	<tr><td>Enter Your Password</td></tr>
   	<tr><td><input type="Password" name="Password"></td></tr>
   	<tr><td><input type="submit" name="submit" value="Login"></td></tr>
   </form>
   </table>
				<table align="left" style="background-color: aqua; margin-top: 0px; height: 600px; width: 525px;">
					<form action="checkout.php" method="post">
				<tr><td>Enter Your name</td><td><input type="text" name="name"></td></tr>
					<tr><td>Enter Your email</td><td><input type="email" name="email"></td></tr>
					<tr><td>Enter Your fone number</td><td><input type="number" name="mobile"></td></tr>
					<tr><td>Enter Your password</td><td><input type="password" name="password"></td></tr>
					<tr><td>Enter Your country</td><td><input type="text" name="contry" required></td></tr>
					<tr><td>Enter Your city</td><td><input type="text" name="city" required></td></tr>
					<tr><td>Enter Your address</td><td><input type="varchar" name="add" required></td></tr>
					<tr><td><input type="submit" name="sub" value="Register"></td></tr>
				</table>
					</form>
				
<?php

if(isset($_POST['sub']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$fone=$_POST['mobile'];
	$password=$_POST['password'];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$country=$_POST['contry'];
	$city=$_POST['city'];
	$add=$_POST['add'];
	$ip=1;
	$reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
	if (preg_match("/^[a-z0-9_]+$/i", $name) && preg_match($reg, $email) && preg_match('/^[0-9]{10}+$/', $fone) && !empty($name) && !empty($fone) && !empty($email))
	{
	$insrtqry="INSERT INTO `costumer`(`email`, `country`, `city`, `password`, `name`, `mobile`, `address`,`cost_ip`) VALUES ('$email','$country','$city','$hash','$name','$fone','$add','$ip')";
	$runinsrt=mysqli_query($con,$insrtqry);
	session_start();
	$_SESSION['email']=$email;
	
		     $sql="SELECT * FROM `cart` WHERE ip_ad='$ip'";
	             $run=mysqli_query($db,$sql);
	             $cont=0;
	                    while(($data=mysqli_fetch_assoc($run))!=NULL)
	                    {
		                  $cont++;
	                    }
	                       if($cont==NULL)
	                        {
		                         ?><script>window.open('../index.php','_self')</script><?php
                            }
	                        else
	                         {
		                        ?><script>window.open('payment.php','_self')</script><?php
	                         }			
	
	
	
}
else{
	?> <script>alert("something went wrong")</script><?php
}

	
}
	
	
	
?>	
	

	<?php //checking for validation
if (isset($_POST['submit'])) {
  	# code...
  	$name=$_POST['uname'];
  	$pass=$_POST['Password'];
  	include("../dbcon.php");
  	$sqllog="SELECT * FROM `costumer` WHERE email='$name' AND password='$pass'";
  	$runlog=mysqli_query($con,$sqllog);
  	$rowlog=mysqli_num_rows($runlog);

  	if ($rowlog<1) {
  		# code...
				?> <script>alert("Invalid Password Or UserName")</script><?php
  	}
  	else
	{
  		session_start();
       $_SESSION['email']=$name;
	?><script>window.open('payment.php','_self')</script><?php
	}

  }  


?>
	          
			</div>
		</div>
    </div>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2018</div>
</div>
</body>
</html>
<?php
}
?>