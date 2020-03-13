<?php 
if(!isset($_SESSION['user_email'])){
	
	echo "<script>window.open('login.php?not_admin=You are not an Admin!','_self')</script>";
}
else {

?>
<table  class="table table-bordered" width="795" align="center"> 

	
	<tr align="center">
		<td colspan="6" style="text-align:center;color:#A9A9A9;"><h2>View All Customers Here</h2></td>
	</tr>
	
	<tr align="center" >
		<th style="color:#2F4F4F;">S.N</th>
		<th style="color:#2F4F4F;">Name</th>
		<th style="color:#2F4F4F;">Email</th>
		<th style="color:#2F4F4F;">Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_c = "select * from customers";
	
	$run_c = mysqli_query($con, $get_c); 
	
	$i = 0;
	
	while ($row_c=mysqli_fetch_array($run_c)){
		
		$c_id = $row_c['customer_id'];
		$c_name = $row_c['customer_name'];
		$c_email = $row_c['customer_email'];
		$i++;
	
	?>
	<tr align="center">
		<td style="color:#2F4F4F;"><?php echo $i;?></td>
		<td style="color:#2F4F4F;"><?php echo $c_name;?></td>
		<td style="color:#2F4F4F;"><?php echo $c_email;?></td>
		<td style="color:#2F4F4F;"><a href="delete_c.php?delete_c=<?php echo $c_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>
<?php } ?>