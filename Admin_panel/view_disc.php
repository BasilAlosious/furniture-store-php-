<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

	 ?>
<table  class="table table-bordered" width="795" align="center" > 

	
	<tr align="center">
		<td colspan="6" style="text-align:center;color:#A9A9A9;"><h2>View All Coupons Here</h2></td>
	</tr>
	
	<tr align="center">
		<th style="color:#2F4F4F;">S.N</th>
		<th style="color:#2F4F4F;">Coupon Name</th>
		<th style="color:#2F4F4F;">Coupon Price</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_cat = "select * from discount_coupon";
	
	$run_cat = mysqli_query($con, $get_cat); 
	
	$i = 0;
	
	while ($row_cat=mysqli_fetch_array($run_cat)){
		
		$cat_id = $row_cat['discount_code'];
		$cat_title = $row_cat['price'];
		$i++;
	
	?>
	<tr align="center">
		<td  style="color:#2F4F4F;"><?php echo $i;?></td>
		<td  style="color:#2F4F4F;"><?php echo $cat_id;?></td>
		<td  style="color:#2F4F4F;"><?php echo $cat_title;?></td>
	
	
	</tr>
	<?php } ?>
</table>
	<?php } ?>
