<?php

include("../dbcon.php");
include("../funtions/fun.php");
@session_start();
@$emailpta=$_SESSION['email'];
if(isset($emailpta))
{

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
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
      
    

        </table>
    </div>
  
  
  
  <div id="basic">
  
  </div>
    <div class="content">
      <div id="left">
    <div id="tittle" align="center">Profile</div>
      <ul id="cats">
        <img src="#" style="height: 150px; width: 150px;">
        <a href="common.php?order">My Order</a>
        <a href="common.php?pass">Change Password</a>
        <a href="common.php?delete=<?php echo $emailpta;?>">Delete Account</a>
        <a href="common.php?edit">Edit account</a>
        
        <a href="common.php?logout">Logout</a>
      </ul>
      
      
    </div>
        <div id="right">
      <div>
    <?php
      
      
      
      
      
      
        ?></div>
    </div>
    </div><a align="right" href="costumer/logout.php">Log Out</a>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2018</div>
</div>
</body>
</html>
<?php
}


else
{
  ?><script type="text/javascript">window.open('checkout.php','_self')</script>
<?php
}
?>