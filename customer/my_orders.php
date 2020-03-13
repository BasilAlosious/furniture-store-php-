

	<table class="table table-sm  table-bordered"  cellpadding="90" cellspacing="1"align="center" > 

	
	<tr align="center">
		<td colspan="6" style="color:#A9A9A9;"><h2>Your Orders Details:</h2></td>
	</tr>
	
	<tr class="table-active">
		<th style="text-align:left;color:#2F4F4F;">S.N</th>
		<th style="text-align:left;color:#2F4F4F;">Product (S)</th>
		<th style="text-align:left;color:#2F4F4F;">Quantity</th>
		<th style="text-align:left;color:#2F4F4F;">Invoice No</th>
		<th style="text-align:left;color:#2F4F4F;">Order Date</th>
		<th style="text-align:left;color:#2F4F4F;">Status</th>
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
		$invoice_no = $row_order['invoice_no'];
		$order_date = $row_order['order_date'];
		$status = $row_order['status'];
		$i++;
		
		$get_pro = "select * from products where product_id='$pro_id'";
		$run_pro = mysqli_query($con, $get_pro); 
		
		$row_pro=mysqli_fetch_array($run_pro); 
		
		$pro_image = $row_pro['product_image']; 
		$pro_title = $row_pro['code'];
	
	?>
	<tr align="center">
		<td style="color:#2F4F4F;"><?php echo $i;?></td>
		<td style="color:#2F4F4F;"><?php echo $pro_id;?></td>
		<td style="color:#2F4F4F;"><?php echo $qty;?></td>
		<td style="color:#2F4F4F;"><?php echo $invoice_no;?></td>
		<td style="color:#2F4F4F;"><?php echo $order_date;?></td>
		<td style="color:#2F4F4F;"><?php echo $status;?></td>
	
	</tr>
	<?php } ?>
</table>
