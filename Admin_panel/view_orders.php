
<table class="table table-bordered" width="795" align="center"> 

	
	<tr align="center">
		<td colspan="6"  style="color:#A9A9A9;"><h2>View All Orders Here</h2></td>
	</tr>
	
	<tr align="center" >
		<th  style="color:#2F4F4F;">S.N</th>
		<th  style="color:#2F4F4F;">Product (S)</th>
		<th  style="color:#2F4F4F;">Quantity</th>
		<th  style="color:#2F4F4F;">Invoice No</th>
		<th  style="color:#2F4F4F;">Order Date</th>
		<th  style="color:#2F4F4F;">Action</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_order = "select * from orders";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order=mysqli_fetch_array($run_order)){
		
		$order_id = $row_order['order_id'];
		$qty = $row_order['qty'];
		$pro_id = $row_order['p_id'];
		$c_id = $row_order['c_id'];
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$i++;
		
		$get_pro = "select * from products where code='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['product_title'];
		
		$get_c = "select * from customers where customer_id='$c_id'";
		$run_c = mysqli_query($con, $get_c); 
		
		$row_c=mysqli_fetch_array($run_c); 
		
		$c_email = $row_c['customer_email'];
	
	?>
	<tr align="center">
		<td style="color:#2F4F4F;"><?php echo $i;?></td>
		<td style="color:#2F4F4F;"><?php echo $pro_title;?></td>
		<td style="color:#2F4F4F;"><?php echo $qty;?></td>
		<td style="color:#2F4F4F;"><?php echo $invoice_no;?></td>
		<td style="color:#2F4F4F;"><?php echo $order_date;?></td>
		<td style="color:#2F4F4F;"><a href="index.php?confirm_order=<?php echo $order_id; ?>">Complete Order</a></td>
	
	</tr>
	<?php } ?>
</table>
