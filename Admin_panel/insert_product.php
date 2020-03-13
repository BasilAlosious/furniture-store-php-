<!DOCTYPE>

<?php 

include("includes/db.php");

?>
<html>
	<head>
		<title>Insert Product</title>		
	<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
	
	
<body>


	<form action="insert_product.php" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="800" border="2" bgcolor="#A9A9A9">
			
			<tr align="center">
				<td colspan="7"style="text-align:center;color:#2F4F4F;"><h2>Insert New Product Here</h2></td>
			</tr>
			
			<tr>
				<td align="right" style="color:#2F4F4F;"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>
			<tr>
				<td align="right" style="color:#2F4F4F;"><b>Product Code:</b></td>
				<td><input type="text" name="product_code" size="10" required/></td>
			</tr>
			
			<tr>
				<td align="right" style="color:#2F4F4F;"><b>Product Category:</b></td>
				<td>
				<select name="product_cat" >
					<option>Select a Category</option>
<?php 
		$get_cats = "select * from categories";
	
		$run_cats = mysqli_query($con, $get_cats);
	
		while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";	
	}
					
	?>
	  </select>
				
				
				</td>
		</tr>
			
			
			<tr>
				<td align="right"style="color:#2F4F4F;"><b>Product Image:</b></td>
				<td><input type="file" name="product_image" multiple/></td>
			</tr>
			
			<tr>
				<td align="right"style="color:#2F4F4F;"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			
			<tr>
				<td align="right" style="color:#2F4F4F;"><b>Product Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>
			
			<tr>
				<td align="right" style="color:#2F4F4F;"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="50" required/></td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><input type="submit" class="btn btn-outline-secondary" name="insert_post" value="Insert Product Now"/></td>
			</tr>
		
		</table>
	
	</form>
</body> 
</html>

<?php

   if (isset($_POST['insert_post'])) {
 
   	   //getting text data from the fields
   	   $product_title = $_POST['product_title'];
   	   $product_code=$_POST['product_code'];
   	   $product_cat = $_POST['product_cat'];
   	   $product_price = $_POST['product_price'];
   	   $product_desc = $_POST['product_desc'];
   	   $product_keywords = $_POST['product_keywords'];
 
   	   //getting the image from the field
   	   $product_image = $_FILES['product_image']['name'];
   	   $product_image_tmp = $_FILES['product_image']['tmp_name'];
       $path = 'product_images/' .$product_image;
   	   move_uploaded_file($product_image_tmp, "product_images/$product_image");
       
       if (!$con) {
                 die("Connection failed: " . mysqli_connect_error());
        }
   	     $insert_product= "INSERT INTO products (product_cat, product_title,code, product_price, product_desc, product_image, product_keywords) VALUES 
   	      ('$product_cat','$product_title','$product_code', '$product_price', ' $product_desc ', '$path', '$product_keywords')";
   	   $insert_pro = mysqli_query($con, $insert_product);
 
   	   if ($insert_pro) {
   	   	  echo "<script>alert('Product has been inserted!')</script>";
   	   }
   	   else {
   	   	    echo "Error: " . $insert_product . "<br>" . mysqli_error($con);
   	   	    echo "<script>alert('Product has not been inserted!')</script>";
   	   }   
   }
		 
?>
   
		

		  
		 
		 





	




