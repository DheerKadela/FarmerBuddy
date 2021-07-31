 if(isset($_GET['delete']))
        {
          ?> <script type="text/javascript">confirm("Do you Want To delete account")</script><?php
          session_start();
          $imel=$_SESSION['email'];
          $getpid="SELECT * FROM `costumer` WHERE email='$imel'";
          $rungetppid=mysqli_query($con,$getpid);
           $data=mysqli_fetch_array($rungetppid);
           $costid=$data['cost_id'];
          $sqlDelete="DELETE FROM `costumer` WHERE email='$imel'";
          $isset1 = mysqli_query($con,$sqlDelete);
         
                
        
           $ordersql="DELETE FROM `costumer_order` WHERE costumer_id='$costid'";
          $penddinsql="DELETE FROM `pendding_order` WHERE costumer_id='$costid'";
          $sqlcart="DELETE FROM `cart` WHERE costid='$costid'";
          $autocommit = "SET autocommit = 0;";
          $autocommiton = "SET autocommit = 1;";
          mysqli_query($con,$autocommit);
          mysqli_query($con,"START TRANSACTION;");
          $isset1 = mysqli_query($con,$sqlDelete);
          $isset2=mysqli_query($con,$ordersql);
          $isset3=mysqli_query($con,$penddinsql);
          $isset4=mysqli_query($con,$sqlcart);
          if(isset($isset1)){
            if(isset($isset2)){ echo "chut";
              if(isset($isset3)){echo "loda";
                if(isset($isset4)){ echo "bhosdi";
                  mysqli_query($con,"COMMIT;");
                  mysqli_query($con,$autocommiton);
                  ?>
                    <script type="text/javascript">alert("Your Account Is Deleted")</script>
                    
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
              mysqli_query($con,"ROLLBACK;");
               mysqli_query($con,$autocommiton);
            }
          }else{
            echo "<script>alert($sqlDelete)</script>";
            echo $sqlDelete;
              mysqli_query($con,"ROLLBACK;");
               mysqli_query($con,$autocommiton);
          }