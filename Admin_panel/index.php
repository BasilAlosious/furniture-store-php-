<?php 
session_start(); 

if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>
<html>
	<head>
		<title>This is Admin Panel</title> 		
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="../styles/style.css" media="all" />
	</head>
<style>
		     
  #alignm{
   position: absolute;
    margin-left: 0vw;
    margin-top: 2px; 
  }

  #main_wrapper{
width:1800px;
height:auto;
margin:auto;
}
#content{
position: absolute;
margin-left: 5vw;
margin-top: 55px;
width:1500px;

}
#logout{
  position: fixed;
  margin-left: 0vw;
  margin-top: 0px;
  font-size: 30px;
  color: #A9A9A9 ; 
}
</style>

<body>
	<div class="main_wrapper">

	<div id="box1">
		<div id="logout">
<?php       
          $user=$_SESSION['user_email'];
        if(isset($_SESSION['user_email'])){          
          echo " $user <a href='logout.php' class='btn btn-outline-secondary'> Logout</a>";
             }?> 
</div>
	<h1 style="text-align:center;color:#A9A9A9"> Welcome To Admin Panel</h1>
	<h2 style="text-align:center;color:#A9A9A9"> Manage Your Content</h2>
	<div id="alignm">
	<ul class="nav ">
  <li class="nav-item">
    <a class="nav-link active text-secondary" href="index.php?insert_product">Insert Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active text-secondary" href="index.php?view_products">View Products</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active text-secondary" href="index.php?insert_cat">Insert Category</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active text-secondary " href="index.php?view_cats">View Category</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active text-secondary" href="index.php?view_customers">View Customers</a>
  </li>

   <li class="nav-item">
    <a class="nav-link   active text-secondary" href="index.php?view_orders">View Orders</a>
  </li>

  <li class="nav-item">
    <a class="nav-link   active text-secondary" href="index.php?view_payments">View Payments</a>
  </li>

  <li class="nav-item">
    <a class="nav-link  active text-secondary" href="index.php?disc_coupon">Insert Coupons</a>
  </li>

  <li class="nav-item">
    <a class="nav-link  active text-secondary " href="index.php?view_disc"> View Coupons</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active text-secondary " href="index.php?detail_img"> Product Images</a>
  </li>
  <li class="nav-item">
    <a class="nav-link  active text-secondary " href="index.php?view_contact"> Contact Form</a>
  </li>

</ul>
</div>

<div id="content">
<?php 
		if(isset($_GET['insert_product'])){
		
		include("insert_product.php"); 
		
		}
		if(isset($_GET['view_products'])){
		
		include("view_products.php"); 
		
		}
		if(isset($_GET['edit_pro'])){
		
		include("edit_pro.php"); 
		
		}
		if(isset($_GET['insert_cat'])){
		
		include("insert_cat.php"); 
		
		}
		
		if(isset($_GET['view_cats'])){
		
		include("view_cats.php"); 
		
		}
		
		if(isset($_GET['edit_cat'])){
		
		include("edit_cat.php"); 
		
		}
		
		if(isset($_GET['view_customers'])){
		
		include("view_customers.php"); 
		
		}

		if(isset($_GET['view_orders'])){
		
		include("view_orders.php"); 
		
		}
		
		if(isset($_GET['view_payments'])){
		
		include("view_payments.php"); 
		
		}
		if(isset($_GET['disc_coupon'])){
		
		include("disc_coupon.php"); 
		
		}
		if(isset($_GET['view_disc'])){
		
		include("view_disc.php"); 	
		}
		if(isset($_GET['detail_img'])){
		
		include("detail_img.php"); 
		}
		if(isset($_GET['view_contact'])){
		
		include("view_contact.php"); 	
		}
	
		?>
</div>
</div>
</div>
</body>
</html>
<?php 
include("includes/db.php");
 if(isset($_GET['confirm_order'])){
		
  $get_id=$_GET['confirm_order'];

  $status='completed';

  $update_order="update orders set status='$status' where order_id='$get_id'";

  $run_update= mysqli_query($con,$update_order);

  if($run_update){
  	echo"<script>alert('order was updated')</script>";
  	echo"<script>window.open('index.php?view_orders','self')</script>";
  }
		
		}

?>
<?php } ?>
