
<br>

<h2 style="float:left; color:#2F4F4F ;">Do you really want to DELETE your account?</h2>

<form action="" method="post">

<br>
<input type="submit"  class="btn btn-outline-secondary" name="yes" value="Yes I want" /> 
<input type="submit" class="btn btn-outline-secondary" name="no" value="No I was Joking" />


</form>

<?php 
include("includes/db.php"); 

	$user = $_SESSION['customer_email']; 
	
	if(isset($_POST['yes'])){
	
	$delete_customer = "delete from customers where customer_email='$user'";
	
	$run_customer = mysqli_query($con,$delete_customer); 
	
	echo "<script>alert('We are really sorry, your account has been deleted!')</script>";
	echo "<script>window.open('../index.php','_self')</script>";
	}
	if(isset($_POST['no'])){
	
	echo "<script>alert('oh! do not joke again!')</script>";
	echo "<script>window.open('my_account.php','_self')</script>";
	
	}
	


?>