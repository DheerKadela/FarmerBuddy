<?php
$con=mysqli_connect("sql205.epizy.com","epiz_29286453","GQQVuX9Ntepb","epiz_29286453_myshop");
$cost_id=$_GET['cid'];
$status='pendding';
$ip=1;
$qry="SELECT * FROM `cart` WHERE ip_ad='$ip'";
$run=mysqli_query($con,$qry);
$total=0;
$totalproduct=0;
while(($data=mysqli_fetch_assoc($run))!=NULL)
{
	$pid=$data['p_id'];
		
		$qry="SELECT * FROM `products` WHERE product_id='$pid'";
		$qryrun=mysqli_query($con,$qry);
		while(($info=mysqli_fetch_assoc($qryrun))!=NULL)
		{
			$value=$info['product_price'];
			$total+=$value;
			$totalproduct++;
		}	
}
$invoice=mt_rand(100,999);

$sqlqry="INSERT INTO `costumer_order`( `costumer_id`, `due_amount`, `invoice_number`, `total_product`, `order_status`) VALUES ('$cost_id','$total','$invoice','$totalproduct','$status')";
$runsql=mysqli_query($con,$sqlqry);
$insrt_pendding="INSERT INTO `pendding_order`(`costumer_id`, `invoice_number`, `product_id`, `qtity`, `order_status`) VALUES ('$cost_id','$invoice','$pid','$totalproduct','$status')";
$runinsert_pendding=mysqli_query($con,$insrt_pendding);
if($runinsert_pendding>0)
{
	?><script type="text/javascript">alert("Your Order is succesed")</script><?php
   ?><script type="text/javascript">window.open('myaccount.php','_self')</script><?php	
}
if(isset($sqlqry))
{
	$delet_cart_qry="DELETE FROM `cart` WHERE ip_ad='$ip'";
	mysqli_query($con,$delet_cart_qry);
	
}



?>