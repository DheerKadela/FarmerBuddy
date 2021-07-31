<?php
session_start();
@$em=$_SESSION['email'];
if(isset($em))
{
?><a href="http:www.payapl.com">Pay pal</a>
<a href="logout.php">Log Out</a>  <a href="myaccount.php">My Account</a><?php

$ip=1;
$qry="SELECT * FROM `costumer` WHERE cost_ip=$ip";
$con=mysqli_connect("localhost","root","","myshop");
$run=mysqli_query($con,$qry);
$data=mysqli_fetch_assoc($run);
$costumer_id=$data['cost_id'];
?> <a href="order.php?cid=<?php echo $costumer_id; ?>">Pay offline</a> <?php
}
//else
//{
	//<script>window.open('checkout.php','_self')</script><?php
//}


?>