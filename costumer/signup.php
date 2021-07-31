<!DOCTYPE html>
<html>
<head>
	<title>Sign Up form</title>
</head>
<body>
     <table align="center">
     	<form action="signup.php" method="post">
     	<tr>
     		<td>First Name</td><td><input type="text" name="First" placeholder="First Name"></td>
     	</tr>
     	<tr>
     		<td>Last Name</td><td><input type="text" name="Last" placeholder="Last Name"></td>
     	</tr>
     	<tr>
     		<td>Email Id</td><td><input type="email" name="email" placeholder="E-mail Id"></td>
     	</tr>
     	<tr>
     		<td>Mobile Number</td><td><input type="Number" name="Mobile" placeholder="Mobile Number"></td>
     	</tr>
     	<tr>
     		<td>Password</td><td><input type="Password" name="Password" placeholder="Password"></td>
     	</tr>
     	<tr>
     		<td>Re-Enter Your Password</td><td><input type="re-Password" name="re-Password" placeholder="Re-Enter Your Password"></td>
     	</tr>
     	<tr>
     		<td><input type="submit" name="submit" value="Sign Up"></td>
     	</tr>
     	</form>

     </table>
</body>
</html>

<?php
$firstname=$_POST['First'];
$lastname=$_POST['Last'];
$email=$_POST['email'];
$mobile=$_POST['Mobile'];
$password=$_POST['Password'];
if (isset($_POST['submit'])) {
	# code...
	include('dbcon.php');
	$qry="INSERT INTO `costumer`( `email`,  `password`, `name`, `mobile`, ) VALUES ($email,$password,$firstname,$mobile)";
	$run=mysqli_query($con,$qry);
	$row=mysqli_num_rows($run)
	# if ($run!=Null) {
		?><script type="text/javascript">alert("Registration Succesfully")</script><?php
		# code...
	#}
}









?>