<?php
 require_once('config.php');
 include ('includes/db.php');


    function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
    }
        include("includes/db.php"); 
        
        $total = 0;
        
        global $con; 
        
        $ip = getIp(); 
        
        $sel_price = "select * from cart where ip_add='$ip'";
        
        $run_price = mysqli_query($con, $sel_price); 
        
        while($p_price=mysqli_fetch_array($run_price)){
            
            $pro_id = $p_price['p_id']; 
            
            $pro_price = "select * from products where product_id='$pro_id'";
            
            $run_pro_price = mysqli_query($con,$pro_price); 
            
            while ($pp_price = mysqli_fetch_array($run_pro_price)){
            
            $product_price = array($pp_price['product_price']);
            
            $product_name = $pp_price['product_title'];
            
            $values = array_sum($product_price);
            
            $total +=$values;
            
    }
    }

            // getting Quantity of the product 
            $get_qty = "select * from cart where p_id='$pro_id'";
            
            $run_qty = mysqli_query($con, $get_qty); 
            
            $row_qty = mysqli_fetch_array($run_qty); 
            
            $qty = $row_qty['qty'];
            
            if($qty==0){
            
            $qty=1;
            }
            else {
            
            $qty=$qty;
            
            }
?>
<html>
  <head>
    <title> RazorPay Integration in PHP - phpexpertise.com </title>
    <meta name="viewport" content="width=device-width">
    <style>
      .razorpay-payment-button {
        color: #ffffff !important;
        background-color: #7266ba;
        border-color: #7266ba;
        font-size: 14px;
        padding: 10px;
      }
    </style>
  </head>
  <body>
    <form action="charge.php" method="POST">
    <!-- Note that the amount is in paise = 50 INR -->
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="<?php $razor_api_key = "rzp_test_HFgSrAs5A4RFo3"; echo $razor_api_key; ?>"
        data-amount="<?php echo $total; ?>"
        data-buttontext="Pay "
        data-name="<?php echo $product_name; ?>"
        data-description="Test Txn with RazorPay"
        data-image="https://your-awesome-site.com/your_logo.jpg"
        data-prefill.name="<?php echo $customer_name"
        data-prefill.email="support@razorpay.com"
        data-theme.color="#F37254"
    ></script>
    <input type="hidden" value="Hidden Element" name="hidden">
    </form>
  </body>
</html>