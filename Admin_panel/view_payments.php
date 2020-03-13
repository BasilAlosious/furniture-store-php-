
<table  class="table table-bordered" width="795" align="center" > 

	
	<tr align="center">
		<td colspan="6" style="text-align:center;color:#A9A9A9;"><h2>View All Payments Here</h2></td>
	</tr>
	
	<tr align="center">
		<th  style="color:#2F4F4F;">S.N</th>
		<th  style="color:#2F4F4F;">Customer Email</th>
		<th  style="color:#2F4F4F;">Product (S)</th>
		<th  style="color:#2F4F4F;">Paid Amount</th>
		<th  style="color:#2F4F4F;">Transaction ID</th>
		<th  style="color:#2F4F4F;">Payment Date</th>
	</tr>
	<?php 
	include("includes/db.php");
	
	$get_payment = "select * from payments";
	
	$run_payment = mysqli_query($con, $get_payment); 
	
	$i = 0;
	
	while ($row_payment=mysqli_fetch_array($run_payment)){
		
		$amount = $row_payment['amount'];
		$trx_id = $row_payment['razorpay_payment_id']; 
		$payment_date = $row_payment['payment_date'];
		$pro_id = $row_payment['product_id'];
		$c_id = $row_payment['customer_id'];
		
		$i++;
		
		$get_pro = "select * from products where product_id='$pro_id'";
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
		<td style="color:#2F4F4F;"><?php echo $c_email; ?></td>
		<td style="color:#2F4F4F;">
		<?php echo $pro_id;?><br>
		</td>
		<td style="color:#2F4F4F;"><?php echo $amount;?></td>
		<td style="color:#2F4F4F;"><?php echo "$trx_id"; ?></td>
		<td style="color:#2F4F4F;"><?php echo $payment_date;?></td>
	
	</tr>
	<?php } ?>
</table>
