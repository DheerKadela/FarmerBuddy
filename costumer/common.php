<?php

include("../dbcon.php");
include("../funtions/fun.php");


?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <title>FarmersBuddy</title>
</head>
<body>
<div class="back" align="center;">
  <div class="header" align="center"><h1>Welcome To FarmersBuddy</h1></div>
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
        <?php
        // order checking codde 
        if(isset($_GET['order']))
        {
        ?><a href="myaccount.php">Back</a><br>
        <a href="common.php">Change Password</a><br>
        <a href="common.php">Delete Account</a><br>
        <a href="common.php">Edit account</a><br>
        
        <a href="common.php">Logout</a><?php
        }

      // order checking codde 
        if(isset($_GET['pass']))
        {
          ?>
        <a href="common.php">My Order</a><br>
        <a href="myaccount.php">Back</a><br>
        <a href="common.php">Delete Account</a><br>
        <a href="common.php">Edit account</a><br>

        <a href="common.php">Logout</a><?php
        }

      // order checking codde 
        if(isset($_GET['delete']))
        {
          
          session_start();
           $emailp=$_SESSION['email'];
          ?>
        <a href="common.php">My Order</a><br>
        <a href="common.php">Change Password</a><br>
        <a href="myaccount.php">Back</a><br>
        <a href="common.php">Edit account</a><br>
        
        <a href="common.php">Logout</a><?php
        ?><?php
          
          
          //echo $emailp;
          //$sqlDelete="DELETE FROM `costumer` WHERE email='$emailp'";
          //$sqlrundelete=mysqli_query($con,$sqlDelete);
         // if($sqlrundelete!=NULL)
          //{

             // session_start();
          //session_destroy();
           // 
          //}

          session_start();
          $imel=$_SESSION['email'];
          $getpid="SELECT * FROM `costumer` WHERE email='$imel'";
          $rungetppid=mysqli_query($con,$getpid);
           $data=mysqli_fetch_array($rungetppid);
           $costid=$data['cost_id'];
           echo $costid;
          $sqlDelete="DELETE FROM `costumer` WHERE email='$imel'";
          $isset1 = mysqli_query($con,$sqlDelete);
         
                
        
           $ordersql="DELETE FROM `costumer_order` WHERE costumer_id='$costid'";
          $penddinsql="DELETE FROM `pendding_order` WHERE costumer_id='$costid'";
          
          $autocommit = "SET autocommit = 0;";
          $autocommiton = "SET autocommit = 1;";
          mysqli_query($con,$autocommit);
          mysqli_query($con,"START TRANSACTION;");
          $isset1 = mysqli_query($con,$sqlDelete);
          $isset2=mysqli_query($con,$ordersql);
          $isset3=mysqli_query($con,$penddinsql);
          
          if(isset($isset1)){
            if(isset($isset2)){ echo "no";
              if(isset($isset3)){echo "nouthing";
                
                  mysqli_query($con,"COMMIT;");
                  mysqli_query($con,$autocommiton);
                  session_start();
                   session_destroy();
                  ?>

                    <script type="text/javascript">alert("Your Account Is Deleted")</script>
                     <script type="text/javascript">window.open('../index.php','_self')</script>
                    
                  <?php
                  
                
              }else{
                mysqli_query($con,"ROLLBACK;");
               mysqli_query($con,$autocommiton);
              }
            }else{
              mysqli_query($con,"ROLLBACK;");
               mysqli_query($con,$autocommiton);
            }
          }else{
            echo "<script>alert($sqlDelete)</script>";
            echo $sqlDelete;
              mysqli_query($con,"ROLLBACK;");
               mysqli_query($con,$autocommiton);
        }
}
      // order checking codde 
        if(isset($_GET['edit']))
        {
          ?>
        <a href="common.php">My Order</a><br>
        <a href="common.php">Change Password</a><br>
        <a href="common.php">Delete Account</a><br>
        <a href="myaccount.php">Back</a><br>
        
        <a href="common.php">Logout</a><?php
      }

      
      ?>
      </ul>
      
      
    </div>
  



        <div id="right">
      <div>
    <?php
      
      if(isset($_GET['order']))
      {
       session_start();
        $imol=$_SESSION['email'];
        
        $qryget="SELECT * FROM `costumer` WHERE email='$imol'";
        @$qryrun=mysqli_query($con,$qryget);
        $info=mysqli_fetch_array($qryrun);
        $id=$info['cost_id'];
        $sqldata="SELECT * FROM `costumer_order` WHERE costumer_id='$id'";
        $qryrundata=mysqli_query($con,$sqldata);
        ?>
        <table border="2"><th>Order Id</th><th>Due Amount</th><th>Total Product</th>
          <th>Order Date</th><th>Order Status</th>
      <?php

      
        while (($data=mysqli_fetch_assoc($qryrundata))!=NULL) 
        {
          # code...
          ?>
          <tr>
              <td><?php echo $data['order_id'];?> </td>
            <td><?php echo $data['due_amount'];?></td> 
            <td><?php echo $data['total_product'];?></td>
            <td><?php echo $data['order_date'];?></td>
            <td><?php echo $data['order_status'];?>
            </tr>

            </table>
          <?php
          }

        }

       

        if(isset($_GET['edit']))
        {
          session_start();
          $imol=$_SESSION['email'];
           $qryedit="SELECT * FROM `costumer` WHERE email='$imol'";
        @$qryrunedit=mysqli_query($con,$qryedit);
        $infoedit=mysqli_fetch_assoc($qryrunedit);
        $emel=$infoedit['email'];
         $country=$infoedit['country'];
          $city=$infoedit['city'];
           $name=$infoedit['name'];
            $mobile=$infoedit['mobile'];
             $adress=$infoedit['address'];
             ?>
             <table>
              
             <form action="common.php" method="post">
               <tr><td><input type="email" name="emoul" value="<?php echo $emel ?>"></input></td></tr>
               <tr><td> <input type="text" name="country" value="<?php echo $country ?>"></input></td></tr>
                 <tr><td><input type="text" name="city" value="<?php echo $city ?>"></input></td></tr>
                 <tr><td> <input type="text" name="name" value="<?php echo $name ?>"></input></td></tr>
                   <tr><td><input type="number" name="mobile" value="<?php echo $mobile ?>"></input></td></tr>
                    <tr><td><input type="text" name="adress" value="<?php echo $adress ?>"></input></td></tr>
                     <tr><td><input type="submit" name="change" value="upade data"></td></tr>
                    
             </form>
           </table>
        <?php


             @$dena=$_POST['change'];
             if(isset($_POST['change']))
              {
              echo "welcome to update page";
               # code...
              $emial=$_POST['emoul'];
              $desh=$_POST['country'];
              $shahar=$_POST['city'];
              $nom=$_POST['name'];
              $fone=$_POST['mobile'];
              $ptta=$_POST['adress'];
              $ip=1;
              $sqlinsetedit="UPDATE `costumer` SET `email`='$emial',`country`='$desh',`city`='$shahar',`name`='$nom',`mobile`='$fone',`address`='$ptta' WHERE cost_ip='$ip'";
              $runsqlinsertedit=mysqli_query($con,$sqlinsetedit);

              if (isset($runsqlinsertedit)) 
              {
                # code...
                ?><script type="text/javascript">alert("Data Edited Succesfully")</script>
                <script type="text/javascript">window.open('myaccount.php','_self')</script><?php
              }
              
              }
          }    
             ?>
      </div>
    </div>
    </div><a align="right" href="costumer/logout.php">Log Out</a>
    <div class="footer" align="center">&copy;->By Dheeraj Kadela 2018</div>
</div>
</body>
</html>