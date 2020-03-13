<!DOCTYPE>
<?php 
session_start();
require_once("dbcontroller.php");
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
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="styles/style.css"  media="all">
</head>
<style>
 #wel{
     position: fixed;
    margin-left: 43vw;
    margin-top: 10px;
    font-size: 30px;
    color: #A9A9A9 ;   
  }
 

   #products_box{
    width:980px; 
    text-align:center;
    position: absolute;
    margin-left:550px;
    margin-top:200px;
    margin-bottom:10px; 
}
  #logout{
    position: fixed;
    margin-left: 38vw;
    margin-top: -65px;
  }

</style>
<body>
  
  <div id= "box1"> 
  
                    
       <span style="float:left; font-size:25px; padding:5px; line-height:50px; font-family: helvetica;">
          <div id="wel">
             <?php 
             if(isset($_SESSION['customer_email'])){
            echo "<b>Welcome</b>" . $_SESSION['customer_email']  ;
                  }
            else {
                echo "<b>Welcome Guest</b>";
                   }
                ?> 
          </div> <br>  
        </span>
     
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
       <input class="form-control mr-sm-2" name="user_query" type="search" placeholder="Search" aria-label="Search">
       <button class="btn btn-outline-secondary" name="search" type="submit" value="search" href="results.php">Search</button>
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
        </div>
      <div id="logout">
       <?php 
        if(isset($_SESSION['customer_email'])){          
          echo "<a href='logout.php' class='btn btn-outline-secondary'> Logout</a>";
             }
        ?> 
      </div>

<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" class="btn btn-outline-secondary" href="shop.php?action=empty">Empty Cart</a>
<a id="checkout" class="btn btn-outline-secondary" href="cart.php">Checkout</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>  
<table class="table table-sm  table-bordered"  cellpadding="90" cellspacing="1">
<tbody>
<tr class="table-active">
<th style="text-align:left;color:#2F4F4F;">Name</th>
<th style="text-align:left;color:#2F4F4F;">Code</th>
<th style="text-align:right;color:#2F4F4F;" width="5%">Quantity</th>
<th style="text-align:right;color:#2F4F4F;" width="10%">Unit Price</th>
<th style="text-align:right;color:#2F4F4F;" width="10%">Price</th>
<th style="text-align:center;color:#2F4F4F;" width="5%">Remove</th>
</tr> 
<?php   
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];

    ?>
        <tr>
        <td><img src="Admin_panel/<?php echo $item["image"]; ?> " class="cart-item-image" /><?php echo $item["name"]; ?></td>
        <td><?php echo $item["code"]; ?></td>
        <td style="text-align:right;color:#2F4F4F;"><?php echo $item["quantity"]; ?></td>
        <td  style="text-align:right;color:#2F4F4F;"><?php echo "₹".$item["price"]; ?></td>
        <td  style="text-align:right;color:#2F4F4F;"><?php echo "₹ ". number_format($item_price,2); ?></td>
        <td style="text-align:center;color:#2F4F4F;"><a href="shop.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>

        </tr>
        <?php
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"]*$item["quantity"]);
    }
    ?>

<tr>
<td  style="color:#2F4F4F;"colspan="2" align="right">Total:</td>
<td style="color:#2F4F4F;" align="right"><?php echo $total_quantity; ?></td>
<td style="color:#2F4F4F;" align="right" colspan="2"><strong><?php echo "₹ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
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
   <div id="content_area">
            
     <?php cart(); ?>
            

         <div id="sc">

         </div>
              <div id="sidebar">
      
        <div id="sidebar_title"> 
       <h1>Categories</h1>
      </div>
        
        <ul class="list-group " id="cats">
        
        <?php getcats(); ?>
        
        <ul>
            
      </div> 

 <div id="product-grid">
 <?php getcatPro(); ?>


  <?php
  $product_array = $db_handle->runQuery("select * from products ");

  if (!empty($product_array)) { 
    foreach($product_array as $key=>$value){
  ?>
       <div class="product-item">
      <form method="post" action="shop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
        <div class="product-image">
          <div class="container">
              <img src="Admin_panel/<?php echo $product_array[$key]["product_image"]; ?>" width="100%" height="155">
              <a href="details.php?code=<?php echo $product_array[$key]["code"]; ?>" class="btn ">Details</a>
                 </div>
               </div>
        <div class="product-tile-footer">
          <div class="product-title"><?php echo $product_array[$key]["product_title"]; ?></div>
          <div class="product-price"><?php echo "₹".$product_array[$key]["product_price"]; ?></div>
          <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btn btn-outline-secondary" /></div> 
          </div>
      </form>
    </div>
  <?php
    }
  }
  ?>
</div>
  
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
