<?php 
require_once('config.php');
require_once("dbcontroller.php");
$db_handle = new DBController();
include("Functions/functions.php");

session_start(); 

if(!isset($_SESSION['customer_email'])){

          
          include("pay_login.php");


        }

   else {
        
?>

<?php
 $user = $_SESSION['customer_email'];
            $get_c = "select * from customers where customer_email='$user'";
                
            $run_c = mysqli_query($con, $get_c); 
                
            $row_c = mysqli_fetch_array($run_c); 
                
            $c_id = $row_c['customer_id'];
            $c_email = $row_c['customer_email'];
            $c_name = $row_c['customer_name']; 

?>
<html>
  <head>
    <title> RazorPay  </title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/style.css"  media="all">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <style>
      .razorpay-payment-button {
         position: absolute;
         margin-left: 46vw;
         margin-top: 210px;
        background-color: #A9A9A9;
        color: white;
        font-size: 16px;
        padding: 12px 34px;
        border: none;
        cursor: pointer;
        border-radius: 5px;

      }
      #img{
         position: absolute;
         margin-left: 40vw;
         margin-top: 10px;
      }

      #cards{
         position: absolute;
         margin-left: 70vw;
         margin-top: 20px;
      }
        #upi{
         position: absolute;
         margin-left: 10vw;
         margin-top: 20px;
      }

    </style>

  </head>
  <body>
    <div id="box1">
    <h1 style="text-align: center; color:#2F4F4F;">Welcome To Amsi Payment Page</h1>
    <h2 style="text-align: center; color:#2F4F4F;">Click the button below to make your payment</h2>
    <div id ="img">
    <img src="razorpay.jpg" alt="payment gateway" /> 
    </div>
    <div id="cards">
    <img src="Atmcards.png" alt="payment gateway"  width="90%" height="150" /> 
  </div>
   <div id="upi">
    <img src="upi.png" alt="payment gateway"  width="40%" height="150" /> 
   </div>
    <?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
    $disc_price = 0;
    $name=$_SESSION['item_name'];
?> 
    <form action="charge.php" method="POST">
    <!-- Note that the amount is in paise = 50 INR -->
    <?php
     if(isset($_SESSION['disc_price'])){   
    $disc= $_SESSION['disc_price']*100;
    }
    else
     {
      $total_price=$_SESSION['t_price']*100;
     }


    ?>   
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="rzp_test_EXc5Bu5cG8UO6I"
        data-amount="<?php if(isset($_SESSION['disc_price'])){echo $disc;}else{echo $total_price;}?>"
        data-currency="INR"
        data-buttontext="Pay"
        data-name="<?php echo $name; ?>"
        data-description="Test Txn with RazorPay"
        data-image="https://your-awesome-site.com/your_logo.jpg"
        data-prefill.name="<?php echo $c_name; ?>"
        data-prefill.email="<?php echo $user; ?>"
        data-theme.color="#F0CD76"
       
    ></script>
    
     
    <input type="hidden" value="Hidden Element" name="hidden">
    </form>
     <?php
} 
else
 {
?>
<div class="no-records">No Values</div>
<?php 
}
?>
  </div>
  </body>
</html>
<?php } ?>
