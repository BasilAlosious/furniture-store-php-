

<table  class="table table-bordered " width="795" align="center"> 

	
	<tr align="center">
		<td colspan="6"style="color:#A9A9A9"><h2>View All Products Here</h2></td>
	</tr>
	  
	<tr align="center" border="2">
		<th style="color:#2F4F4F;">S.N</th>
		<th style="color:#2F4F4F;">Title</th>
		<th style="color:#2F4F4F;">Image</th>
		<th style="color:#2F4F4F;">Price</th>
		<th style="color:#2F4F4F;">Edit</th>
		<th style="color:#2F4F4F;">Delete</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_pro = "select * from products";
	
	$run_pro = mysqli_query($con, $get_pro); 
	
	$i = 0;
	
	while ($row_pro=mysqli_fetch_array($run_pro)){
		
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro['product_title'];
		$pro_image = $row_pro['product_image'];
		$pro_price = $row_pro['product_price'];
		$i++;
	
	?>
	<tr align="center">
		<td style="color:#2F4F4F;"><?php echo $i;?></td>
		<td style="color:#2F4F4F;"><?php echo $pro_title;?></td>
		<td style="color:#2F4F4F;"><img src="<?php echo $pro_image;?>" width="60" height="60"/></td>
		<td style="color:#2F4F4F;"><?php echo $pro_price;?></td>
		<td style="color:#2F4F4F;"><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Edit</a></td>
		<td style="color:#2F4F4F;"><a href="delete_pro.php?delete_pro=<?php echo $pro_id;?>">Delete</a></td>
	
	</tr>
	<?php } ?>
</table>
