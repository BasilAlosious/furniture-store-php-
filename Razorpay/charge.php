
<?php
session_start();
require_once("dbcontroller.php");
include("includes/db.php");
$db_handle = new DBController();
include("Functions/functions.php");
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
  case "add":
    if(!empty($_POST["quantity"])) {
      $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["product_title"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["product_price"], 'image'=>$productByCode[0]["product_image"]));
      
      if(!empty($_SESSION["cart_item"])) {
        if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
          foreach($_SESSION["cart_item"] as $k => $v) {
              if($productByCode[0]["code"] == $k) {
                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                  $_SESSION["cart_item"][$k]["quantity"] = 0;
                }
                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
              }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }
    }
  break;
  case "remove":
    if(!empty($_SESSION["cart_item"])) {
      foreach($_SESSION["cart_item"] as $k => $v) {
          if($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);        
          if(empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
      }
    }
  break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}


	global $con;  
?>

<html>
	<head>
		<title>Payment Successful!</title>
	</head>

<body>

<?php 

		
           $user = $_SESSION['customer_email'];
		
		$sel_price = "select * from customers where customer_email='$user'";
		
		$run_price = mysqli_query($con, $sel_price); 
		
		while($p_price=mysqli_fetch_array($run_price)){
			
			$c_id = $p_price['customer_id']; 
			$c_name=  $p_price['customer_name']; 
			$c_num= $p_price['customer_contact']; 
			$c_email=$p_price['customer_email'];
			$c_city=$p_price['customer_city'];
			$c_add=$p_price['customer_address'];

			}
		
		
		
		
		 if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
     


    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
         $total_quantity += $item["quantity"];
        $total_price += ($item["price"]*$item["quantity"]);
        $item_quant=$item["quantity"];
        $pro_name=$item["name"];
		}
		 $quant=$_SESSION['t_quant']; 
		 $invoice = mt_rand();

         if(isset($_SESSION['disc_price'])){ $amount= $_SESSION['disc_price'];;}else{$amount=$_SESSION['t_price'];}  

	}
	     if ($_POST) {
				$razorpay_payment_id = $_POST['razorpay_payment_id'];
				
			}

	$insert_payment = "INSERT INTO payments (razorpay_payment_id,amount,product_id,customer_id,payment_date) VALUES('$razorpay_payment_id',$amount,'$pro_name',$c_id,NOW())";
       $run_payment = mysqli_query($con, $insert_payment);
 $insert_order = "insert into orders (p_id, c_id, qty, invoice_no, order_date,status) values ('$pro_name',$c_id,$total_quantity,$invoice,NOW(),'in Progress')";
				$run_order = mysqli_query($con, $insert_order);
				echo "<h2 align='center'>Welcome:" . $_SESSION['customer_email']. "<br>" . "Your Payment was successful!</h2>";
                 echo "<br>";
                 echo "<a href='../customer/my_account.php'>Go to your Account</a>";
                  echo "<br>";
                  echo "<h1 align='center'>INVOICE</h1>";
                  echo "<br>";
	            echo "<strong>Customer id:</strong>" .$c_id;
	            echo "<br>";
	            echo "<br>";
	            echo "<strong>Customer name:</strong>".$c_name;
	            echo "<br>";
	            echo "<br>";
	            echo"<strong>Customercontact:</strong>".$c_num;
	            echo "<br>";
	            echo "<br>";
	            echo"<strong>Customer_city:</strong>".$c_city;
	            echo "<br>";
	            echo "<br>";
	            echo"<strong>Customer address</strong>".$c_add;
	            echo "<br>";
	            echo "<br>";
				echo "<strong>Payment_id:</strong>".$razorpay_payment_id;
				echo "<br>";
				echo "<br>";
				echo "<strong>Total amount: ₹ </strong>".$amount ; 
				echo "<br>";
				echo "<br>";
				echo"<strong>Total quantity: </strong>". $quant ;
				echo "<br>";
				echo "<br>";
				echo "<strong>Invoice:</strong>". $invoice;
				echo "<br>";
				echo "<br>";
				foreach($_SESSION["cart_item"] as $names){
					$item_price = $names["quantity"]*$names["price"];
                   echo "<strong>Products:</strong> ". $names["name"] ;
                   echo "<br>";
                    echo "<br>";
                   echo "<strong>Price: </strong>" .$names["price"] ;
                   echo "<br>";
                    echo "<br>";
                   echo "<strong>Unit Price:</strong>". $item_price ;
                    echo "<br>";
                    echo "<br>";
                   echo "<strong> Quantity: </strong>".$names["quantity"];
               }
              
session_destroy();			
?>				
</body>
</html>
