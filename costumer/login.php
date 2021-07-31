<!DOCTYPE html>
<html>
<head>
	<title>Welcome to login Page</title>
</head>
<body>
   <table>
   	<form action="login.php" method="post">
   	<tr>
   	<td>Enter Your UserName
   	</td></tr>
   <tr>	<td><input type="text" name="uname"></td></tr>
   	<tr><td>Enter Your Password</td></tr>
   	<tr><td><input type="Password" name="Password"></td></tr>
   	<tr><td><input type="submit" name="submit" value="Login"></td></tr>
   </form>
   </table>
</body>
</html>
<?php
if (isset($_POST['submit'])) {
  	# code...
  	$name=$_POST['uname'];
  	$pass=$_POST['Password'];
  	include("../dbcon.php");
  	$sql="";
  	$run=mysqli_query($con,$sql);
  	$row=mysqli_num_rows($run);

  	if ($row<1) {
  		# code...
  		echo "Invalid Password Or UserName";
  	}
  	else
  		session_start();
       $_SESSION['uname']=$name;

  }  


?>