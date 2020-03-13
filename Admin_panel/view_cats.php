<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

	 ?>
<table class="table table-bordered" width="795" align="center"> 

	
	<tr align="center">
		<td colspan="6" style="text-align:center;color:#A9A9A9;"><h2>View All Categories Here</h2></td>
	</tr>
	
	<tr align="center">
		<th style="color:#2F4F4F;">Category ID</th>
		<th style="color:#2F4F4F;">Category Title</th>
		<th style="color:#2F4F4F;">Edit</th>
		<th style="color:#2F4F4F;">Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_cat = "select * from categories";
	
	$run_cat = mysqli_query($con, $get_cat); 
	
	$i = 0;
	
	while ($row_cat=mysqli_fetch_array($run_cat)){
		
		$cat_id = $row_cat['cat_id'];
		$cat_title = $row_cat['cat_title'];
		$i++;
	
	?>
	<tr align="center">
		<td style="color:#2F4F4F;"><?php echo $i;?></td>
		<td style="color:#2F4F4F;"><?php echo $cat_title;?></td>
		<td style="color:#2F4F4F;"><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Edit</a></td>
		<td style="color:#2F4F4F;"><a href="delete_cat.php?delete_cat=<?php echo $cat_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>
	<?php } ?>
