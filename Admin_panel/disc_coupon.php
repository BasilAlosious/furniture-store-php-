<form action="" align="center" method="post" style="padding:80px;">

<h1 style="text-align:center;color:#A9A9A9;">Insert New Coupon:</h1>
<br>
<label  style="color:#2F4F4F;"> Coupon Name</label>
<input type="text" name="new_disc" required/> 
<br>
<label  style="color:#2F4F4F;"> Coupon Price</label>
<input type="text" name="new_price" required/>
 <br>
<input type="submit"  class="btn btn-outline-secondary" name="add_disc" value="Add coupon" /> 

</form>

<?php 
include("includes/db.php"); 

	if(isset($_POST['add_disc'])){
	
	$new_disc = $_POST['new_disc'];
	$new_price = $_POST['new_price'];
	
	$insert_cat = "insert into discount_coupon (discount_code,price)values ('$new_disc','$new_price')";

	$run_cat = mysqli_query($con, $insert_cat); 
	
	if($run_cat){
	
	echo "<script>alert('New coupon has been inserted!')</script>";
	echo "<script>window.open('index.php?disc_coupon','_self')</script>";
	}
	}

?>