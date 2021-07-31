<?php
//database connection
   $db=mysqli_connect("sql205.epizy.com","epiz_29286453","GQQVuX9Ntepb","epiz_29286453_myshop");

//funtion for add product to cart
   
function addcart(){ global $db;
	
       if(isset($_GET["cartid"]))
	{ 
		$p_id=$_GET['cartid'];
		$ip=1;
		$check="SELECT * FROM `cart` WHERE p_id='$p_id' AND ip_ad='$ip'";
		$runcheck=mysqli_query($db,$check);
		$rows=mysqli_num_rows($runcheck);
	
		if($rows==0)
		{
			$adcart="INSERT INTO `cart`(`p_id`, `ip_ad`) VALUES ('$p_id','$ip')";
			$runquery=mysqli_query($db,$adcart);
			header("location: index.php");
		}
		
		}
		
	    

}
// function for delete data from cart
function deletcsrt()
{
 if(isset($_POST['update']))
					   {
	                  
						   foreach($_POST['remove'] as $remove_id)
						   {
							   $delete="DELETE FROM `cart` WHERE p_id='$remove_id'";
							   $rundelete=mysqli_query($con,$delete);
							  
						   }
					   }
}




//funtion for getting total saved carts
function totlcart()
{   
	$ip=1;
	global $db;
	$sql="SELECT * FROM `cart` WHERE ip_ad='$ip'";
	$run=mysqli_query($db,$sql);
	$cont=0;
	while(($data=mysqli_fetch_assoc($run))!=NULL)
	{
		$cont++;
	}
	echo $cont;
}

//funtion for total price
function totalprice()
{
	$ip=1;
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
		}
	} echo $total;
}

//function for get product
   function getpro()
    {
	   global $db;
	   if(!isset($_GET['cat']))
	   {
	       $getprosql="SELECT * FROM `products` ORDER BY RAND() LIMIT 1,6";
			$run=mysqli_query($db,$getprosql);
			while(($data=mysqli_fetch_assoc($run))!=NULL)
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
				
				<a href='index.php?cartid=$pid' style='float:right; '><button >Add To Cart</button></a>
				</div>
				
				
				";}
			}
	   if(isset($_GET['cat']))
	   {
		   $catid=$_GET['cat'];
		 $getprosql="SELECT * FROM `products` WHERE cat_id='$catid'";
			$run=mysqli_query($db,$getprosql);
			while(($data=mysqli_fetch_assoc($run))!=NULL)
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

				 if(isset($_GET['bcat']))
	               {
		                $bcatid=$_GET['bcat'];
		                $bgetprosql="SELECT * FROM `products` WHERE brand_id='$bcatid'";
			            $brun=mysqli_query($db,$bgetprosql);
			              while(($bdata=mysqli_fetch_assoc($brun))!=NULL)
			               {
			 
			                 $btittle=$bdata['product_title'];
			                 $bpid=$bdata['product_id'];
				             $bpimg=$bdata['product_img1'];
				
				             $bpprice=$bdata['product_price'];

				             $bcid=$bdata['cat_id'];
				              $bbid=$bdata['brand_id'];
				                 $bdec=$bdata['dec'];
				             echo "
				            <div id='prodalign'>
				                  <h3 >$btittle</h3>
				                <img src='admin/images/$bpimg' style='float:center; height:180px; width:180px;'/>
				                  <a href='detail.php?proid=$bpid' style='float:left;'>Detail</a>
				
				                   <a href='index.php' style='float:right; '><button>Add To Cart</button></a>
				                   </div>
				
				
				           ";}
				           }    
	   }
			
			}
			
// function for gate brand
function getbrand(){
	  global $db;
	$qry="SELECT * FROM `products`";
				$rn=mysqli_query($db,$qry);
	
				
			while(($dat=mysqli_fetch_assoc($rn))!=NULL){
					$ids=$dat['brand_id'];
					$brandqry="SELECT * FROM `brand` WHERE brand_id='$ids'";
					$rns=mysqli_query($db,$brandqry);
					$datab=mysqli_fetch_assoc($rns);
					$titl=$datab['brand_title'];
					
				echo "<li><a href='index.php?bcat=$ids'>$titl</a></li>";
				
				}
}
//funtion for get cart

function getcats()
{
	global $db;
	$sql="SELECT * FROM `products`";
				$run=mysqli_query($db,$sql);
				
				while(($data=mysqli_fetch_assoc($run))!=NULL){
					$id=$data['cat_id'];
					$csql="SELECT * FROM `categories` WHERE cat_id='$id'";
					$crun=mysqli_query($db,$csql);
					
					$cdata=mysqli_fetch_assoc($crun);
					$mid=$cdata['cat_id'];
					
					if($id==$mid)
					{
						$title=$cdata['cat_tittle'];
				        echo "<li><a href='index.php?cat=$id'>$title</a></li>";
				    }
				
				}
}
			
			
				?>