<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

	 ?>
<table class="table table-bordered" width="795" align="center"> 

	<tr align="center">
		<td colspan="6" style="text-align:center;color:#A9A9A9;"><h2>View All Contact Forms  Here</h2></td>
	</tr>
	
	<tr align="center">
		<th style="color:#2F4F4F;">Form ID</th>
		<th style="color:#2F4F4F;">First Name </th>
		<th style="color:#2F4F4F;">Last Name </th>
		<th style="color:#2F4F4F;">State</th>
		<th style="color:#2F4F4F;">Subject</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_cat = "select * from contact_us";
	
	$run_cat = mysqli_query($con, $get_cat); 
	
	$i = 0;
	
	while ($row_cat=mysqli_fetch_array($run_cat)){
		
		$cat_fname = $row_cat['firstname'];
		$cat_lname = $row_cat['lastname'];
		$cat_state = $row_cat['state'];
		$cat_sub   = $row_cat['subject'];
		$i++;
	
	?>
	<tr align="center">
		<td style="color:#2F4F4F;"><?php echo $i;?></td>
		<td style="color:#2F4F4F;"><?php echo $cat_fname;?></td>
		<td style="color:#2F4F4F;"><?php echo $cat_lname;?></td>
		<td style="color:#2F4F4F;"><?php echo $cat_state;?></td>
		<td style="color:#2F4F4F;"><?php echo $cat_sub;?></td>
	
	</tr>
	<?php } ?>
</table>
<?php } ?>