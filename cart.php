<!DOCTYPE>
<?php 
session_start(); 
require_once("dbcontroller.php");
$db_handle = new DBController();
include("Functions/functions.php");
include("includes/db.php");
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
   case "show_discount":
            if (! empty($_SESSION["cart_item"])) {
                if (! empty($_POST["discountCode"])) {
          $priceByCode = $db_handle->runQuery("SELECT price FROM discount_coupon WHERE discount_code='" . $_POST["discountCode"] . "'");
                    
                    if (! empty($priceByCode)) {
                        foreach ($priceByCode as $key => $value) {
                            $discountPrice = $priceByCode[$key]["price"];
                        }
                        if (! empty($discountPrice) && $discountPrice > $_POST["totalPrice"]) {
                            $message = "Invalid Discount Coupon";
                        }
                    } else {
                        $message = "Invalid Discount Coupon";
                    }
                }
            } else {
                $message = "Not applicable. The cart is empty";
            }
            break;
  case "empty":
    unset($_SESSION["cart_item"]);
  break;  
}
}

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="Styles/style.css">
</head>

<style>

		#box{
			position: absolute;
			margin-left:30vw;
			margin-top: 30vh; 
		}

		#wel{
            position: fixed;
		    margin-left: 43vw;
		    margin-top: 10px;
		    font-size: 30px;
		    color: #A9A9A9 ;   
        }

       #sc{
           position: absolute;
           margin-left: -30vw;
           margin-top: 50px;
           font-size: 30px;
           color: #A9A9A9 ;   
        }
       #table_pl{
       	  position: absolute;
       	  margin-top: 300px;
       }
      #shopping-cart {
    margin: 40px;
}

      #butt{
      	margin: 40px;
      	position: absolute;
      	margin-top:600px;
      	margin-left: 35vw;
      }
#product-grid {
    margin: 40px;
}

#discount-grid {
    margin: 40px;
    position: absolute;
    margin-top: 600px;
    margin-left: 60vw;
}

#shopping-cart table {
    width: 100%;
    background-color: #F0F0F0;
}

#shopping-cart table td {
    background-color: #FFFFFF;
}

.txt-heading {
    color: #211a1a;
    border-bottom: 1px solid #E0E0E0;
    overflow: auto;
}

#btnEmpty {
    background-color: #ffffff;
    border: #d00000 1px solid;
    padding: 5px 10px;
    color: #d00000;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    margin: 10px 0px;
}

.btnAddAction {
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #efefef;
    border: #E0E0E0 1px solid;
    color: #211a1a;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;
}

.btnDiscountAction {
    padding: 10px 10px 10px 10px;
    margin-left: 5px;
    background-color: #A9A9A9;
    border: #E0E0E0 1px solid;
    color: #211a1a;
    float: right;
    font-weight: bold;
    text-decoration: none;
    cursor: pointer;
}

#product-grid .txt-heading {
    margin-bottom: 18px;
}

.product-item {
    float: left;
    background: #ffffff;
    margin: 30px 30px 0px 0px;
    border: #E0E0E0 1px solid;
}

.product-image {
    height: 155px;
    width: 250px;
    background-color: #FFF;
}

.clear-float {
    clear: both;
}

.demo-input-box {
    border-radius: 2px;
    border: #CCC 1px solid;
    padding: 2px 1px;
}

.tbl-cart {
    font-size: 0.9em;
}

.tbl-cart th {
    font-weight: normal;
}

.product-title {
    margin-bottom: 20px;
}

.product-price {
    float: left;
}

.cart-action {
    float: right;
}

.discount-action {
    float: right;
}

.discount-code {
    padding: 10px 10px 10px 10px;
    border: #E0E0E0 1px solid;
}

.product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    border: #E0E0E0 1px solid;
}

.product-tile-footer {
    padding: 15px 15px 0px 15px;
    overflow: auto;
}

.cart-item-image {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
}

.no-records {
    text-align:center;
    clear: both;
    margin: 38px 0px;
}

.error-message {
    color: #FF0000;
    font: 18px;
    text-align: left;
    margin-right: 15px;
}

#logout{
    position: fixed;
    margin-left: 38vw;
    margin-top: -72px;
  }
</style>
<body>
	<div id = "table_pl">
		    <form id="applyDiscountForm" method="post"
        action="cart.php?action=show_discount"
        onsubmit="return validate();">

    <?php
    if (isset($_SESSION["cart_item"])) {
        $total_quantity = 0;
        $total_price = 0;
        $total_names='';
        ?>	  
                <table class="table table table-bordered" align="center" width="1000" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr style="color:#2F4F4F; background-color:#A9A9A9;" align="center">
                        <th style="text-align: left;">Name</th>
                        <th style="text-align: left;">Code</th>
                        <th style="text-align: right;" width="5%">Quantity</th>
                        <th style="text-align: right;" width="10%">Unit Price</th>
                        <th style="text-align: right;" width="10%">Price</th>
                        <th style="text-align: center;" width="5%">Remove</th>
                    </tr>	
                          
                        <?php
        foreach ($_SESSION["cart_item"] as $item) {
            $item_price = $item["quantity"] * $item["price"];
            ?>
                            <tr>
                        <td style="color:#2F4F4F; background-color: #ffffff;"><img src="Admin_panel/<?php echo $item["image"]; ?>"
                            class="cart-item-image" /><?php echo $item["name"]; ?></td>
                              <?php $t_name=$item["name"]; $_SESSION['item_name']=$t_name;?>
                        <td style="color:#2F4F4F; background-color: #ffffff;"><?php echo $item["code"]; ?></td>
                        <td style="text-align: right; color:#2F4F4F; background-color: #ffffff;"><?php echo $item["quantity"]; ?></td>
                        <td style="text-align: right; color:#2F4F4F; background-color: #ffffff;"><?php echo "₹" . $item["price"]; ?></td>
                        <td style="text-align: right; color:#2F4F4F; background-color: #ffffff;"><?php echo "₹". number_format($item_price, 2); ?></td>
                        <td style="text-align: center; color:#2F4F4F; background-color: #ffffff;"><a
                            href="cart.php?action=remove&code=<?php echo $item["code"]; ?>"
                            class="btnRemoveAction"><img
                                src="icon-delete.png" alt="Remove Item" /></a></td>
                    </tr>
                            <?php
            $total_quantity += $item["quantity"];
            $total_price += ($item["price"] * $item["quantity"]);
        }
        ?>
                        <tr>
                        <td colspan="2" align="right" style="color:#2F4F4F; background-color: #ffffff;">Total:<input
                            type="hidden" name="totalPrice"
                            id="totalPrice"
                            value="<?php echo $total_price; ?>"></td>
                        <td align="right" style="color:#2F4F4F; background-color: #ffffff;"><?php echo $total_quantity; ?></td>
                        <?php $_SESSION['t_quant']=$total_quantity; ?>
                        <td align="right" colspan="2" style="color:#2F4F4F; background-color: #ffffff;"><strong><?php echo "₹". number_format($total_price, 2); ?></strong></td>
                        <?php $_SESSION['t_price']=$total_price; ?>
                        <td  style=" background-color: #ffffff;" ></td>
                    </tr>
                <?php     
                if (!empty($discountPrice) && $total_price > $discountPrice) {
                    $total_price_after_discount = $total_price - $discountPrice;
                     $_SESSION['disc_price']=$total_price_after_discount;

            ?>
                    <tr>
                        <td colspan="3" align="right" style="color:#2F4F4F; background-color: #ffffff;">Discount:<input
                            type="hidden" name="discountPrice"
                            id="discountPrice"
                            value="<?php echo $discountPrice; ?>"></td>
                        <td align="right" colspan="2" style="color:#2F4F4F; background-color: #ffffff;"><strong><?php echo "₹" . number_format($discountPrice, 2); ?></strong></td>
                        <td style="color:#2F4F4F; background-color: #ffffff;"></td>
                    </tr>
                    <tr>
                        <td colspan="3" align="right" style="color:#2F4F4F; background-color: #ffffff;">Total after
                            Discount:</td>
                        <td align ="right" colspan="2" style="color:#2F4F4F; background-color: #ffffff;"><strong><?php echo "₹" . number_format($total_price_after_discount, 2); ?></strong></td>
                        <td style="color:#2F4F4F; background-color: #ffffff;"></td>
                    </tr>
                    <?php 
                }
                ?>
                </tbody>
          
            </table>		
            <?php
    } else {
        ?>
                <div class="no-records">Your Cart is Empty</div>
            <?php
    }
    ?>

        </div>
        <div id="discount-grid">
            <div class="discount-section">
                <div class="discount-action">
                    <span id="error-msg-span" class="error-message">
                    <?php
                    if (! empty($message)) {
                        echo $message;
                    }
                    ?>
                    </span> <span></span><input type="text"
                        class="discount-code" id="discountCode"
                        name="discountCode" size="15"
                        placeholder="Enter Coupon Code" /><input
                        id="btnDiscountAction" type="submit"
                        value="Apply Discount" class="btnDiscountAction" />
                </div>
            </div>
        </div>
        <div id="butt"> 
        	<td ><a  class="btn btn-outline-secondary" href="cart.php?action=empty">Empty Cart</a></td>
			<td ><a  class="btn btn-outline-secondary" href="shop.php"/></td>Continue Shopping</td>
			<td ><a class="btn btn-outline-secondary" href="Razorpay/index.php" role="button">Pay Now</a></td> </div>
    </form>
    <?php
        $insert_cat = "insert into cart (ip_add,qty) values ('$total_price','$total_quantity;')";

         $run_cat = mysqli_query($con, $insert_cat);  ?>
</div>
<div id= "box1">
	  <div id="shopping_cart"> 
                    
       <span style="float:left; font-size:25px; padding:5px; line-height:50px; font-family: helvetica;">
          <div id="wel">
             <?php 
             if(isset($_SESSION['customer_email'])) {
            echo "<b>Welcome</b>" . $_SESSION['customer_email']  ;
                  }
            else {
                echo "<b>Welcome Guest</b>";
                   }
                ?> 

                
          </div> <br>  
        </span>
      </div>
	    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <a class="navbar-brand text-secondary" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="index.php#box2">About<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="customer_login.php">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="shop.php">Shop</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="contact_us.php" tabindex="-1">Contact Us</a>
      </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-secondary" type="submit"href="results.php">Search</button>
      </form>
  </div>
 </nav> 
        <div id="navigation" class="top">
        <div class="nav-link">
        </div>
         <div class="nav-link">
        </div>
         <div class="nav-link">
        </div>
         <div class="nav-link">
        </div>
	       <div id="logout">
       <?php 
        if(isset($_SESSION['customer_email'])){          
          echo "<a href='logout.php' class='btn btn-outline-secondary'> Logout</a>";
             }
        ?> 
      </div>

			<div id="content_area">
			
			
			</div>

			<div id="box">

				<div id="products_box">
    
			
                </div>
				</div>
			
			</div>
		</div>
		<!--Content wrapper ends-->

 </div> 
  <!--Main Container ends here-->


</body>
</html>
<script>
function validate() {
    var valid= true;
     if($("#discountCode").val() === "") {
        valid = false;
     }

     if(valid == false) {
         $('#error-msg-span').text("Discount Coupon Required");
     }
     return valid;
}
</script>