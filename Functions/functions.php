<?php 
 // After uploading to online server, change this connection accordingly
 $con = mysqli_connect("localhost","root","","amsi");

	if (mysqli_connect_errno())
	  {
	  echo "The Connection was not established: " . mysqli_connect_error();
	  }
	 // getting the user IP address
	  function getIp() {
	    $ip = $_SERVER['REMOTE_ADDR'];
	 
	    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
	        $ip = $_SERVER['HTTP_CLIENT_IP'];
	    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
	        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	 
	    return $ip;
	}
	  
	   
	//creating the shopping cart
	function cart(){

	if(isset($_GET['add_cart'])){

		global $con; 
		
		$ip = getIp();
		
		$pro_id = $_GET['add_cart'];

		$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		
		$run_check = mysqli_query($con, $check_pro); 
		
		if(mysqli_num_rows($run_check)>0){

		echo "";
		
		}
		else {
		
		$insert_pro = "insert into cart (p_id,ip_add,qty) values ('$pro_id','$ip','qty')";
		
		$run_pro = mysqli_query($con, $insert_pro); 
		
		echo "<script>window.open('shop.php','_self')</script>";
		}
		
	}

	function click_addcart(){
	   if(!isset($_SESSION['customer_email'])){                      
	        echo "<script>alert('Please login to proceed, Thanks!')</script>";
			echo "<script>window.open('customer_login.php','_self')</script>";
	                      
	                 }
	                 }
	}
	 // getting the total added items
	 
	 function total_items(){
	 
		if(isset($_GET['add_cart'])){
		
			global $con; 
			
			$ip = getIp(); 
			
			$get_items = "select * from cart where ip_add='$ip'";
			
			$run_items = mysqli_query($con, $get_items); 
			
			$count_items = mysqli_num_rows($run_items);
			
			}
			
			else {
			
			global $con; 
			
			$ip = getIp(); 
			
			$get_items = "select * from cart where ip_add='$ip'";
			
			$run_items = mysqli_query($con, $get_items); 
			
			$count_items = mysqli_num_rows($run_items);
			
			}
		
		echo $count_items;
		}
	  
	// Getting the total price of the items in the cart 
		
		function total_price(){
		
			$total = 0;
			
			global $con; 
			
			$ip = getIp(); 
			
			$sel_price = "select * from cart where ip_add='$ip'";
			
			$run_price = mysqli_query($con, $sel_price); 
			
			while($p_price=mysqli_fetch_array($run_price)){
				
				$pro_id = $p_price['p_id']; 
				
				$pro_price = "select * from products where product_id='$pro_id'";
				
				$run_pro_price = mysqli_query($con,$pro_price); 
				
				while ($pp_price = mysqli_fetch_array($run_pro_price)){
				
				$product_price = array($pp_price['product_price']);
				
				$values = array_sum($product_price);
				
				$total +=$values;
				
				}
			
			
			}
			
			echo "₹" . $total;
			
		
		}

	//getting the categories

	function getCats(){
		
		global $con; 
		
		$get_cats = "select * from categories";
		
		$run_cats = mysqli_query($con, $get_cats);
		
		while ($row_cats=mysqli_fetch_array($run_cats)){
		
			$cat_id = $row_cats['cat_id']; 
			$cat_title = $row_cats['cat_title'];
		
		echo "<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";
		
		
		}


	}


	function getPro(){

		if(!isset($_GET['cat'])){

		global $con; 
		
		$get_pro = "select * from products order by RAND() LIMIT 0,16";

		$run_pro = mysqli_query($con, $get_pro); 
		
		while($row_pro=mysqli_fetch_array($run_pro)){
		
			$pro_id = $row_pro['product_id'];
			$pro_cat = $row_pro['product_cat'];
			$pro_title = $row_pro['product_title'];
			$pro_price = $row_pro['product_price'];
			$pro_image = $row_pro['product_image'];
		
			echo "
					<div id='single_product'>
					
						<div class='card-group'>
						<div class='card text-black border-dark bg-transparent mb-3' style='width: 18rem;'>
						<div class='card-header bg-transparent border-dark'>$pro_title</div>
	  					<img src='Admin_panel/$pro_image' class='card-img-top' alt='image not loading'>
	  					<div class='card-body'>
	    				<p class='card-text'> Price: ₹ $pro_price</p>
	    				<div class='card-footer bg-transparent border-dark'>
	    				<a href='details.php?pro_id=$pro_id' class='btn btn-outline-dark'>Details</a>
						<a href='shop.php?add_cart=$pro_id' class='btn btn-outline-dark'>Add to cart</a>
					 </div>
	 				 </div>
					</div>
					</div>
					</div>
			
			
			";
		
		}
		}
	}


	function getCatPro(){

		if(isset($_GET['cat'])){
			
			$cat_id = $_GET['cat'];

		 global $con; 
		
		 $get_cat_pro = "select * from products where product_cat='$cat_id'";

		 $run_cat_pro = mysqli_query($con, $get_cat_pro); 
		
		 $count_cats = mysqli_num_rows($run_cat_pro);
		
		 if($count_cats==0){
		
		 echo "<h2 style='padding:20px;'>No products where found in this category!</h2>";
		
		  }
		
		 while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){
		
			$pro_id = $row_cat_pro['product_id'];
			$pro_cat = $row_cat_pro['product_cat'];
			$pro_title = $row_cat_pro['product_title'];
			$pro_price = $row_cat_pro['product_price'];
			$pro_image = $row_cat_pro['product_image'];
			$pro_code = $row_cat_pro['code'];
		
			echo "				
					<div class='product-item'>
        <div class='card text-black border-dark bg-transparent mb-3' style='width: 18rem;'>
           <div class='card-header bg-transparent border-dark'> $pro_title </div>
          <form method='post' action='shop.php?action=add&code= $pro_code'>
            <div class='product-image'>
                  <div class='container'>
                  <img src= 'Admin_panel/$pro_image' >
                     <a href='details.php?code= $pro_code' class='btn'>Details</a> 
                 </div>
             </div>
            <div class='card-body'>
              <div class='product-price'> ₹ $pro_price </div>

              <div class='cart-action'><input type='text' class='product-quantity' name='quantity' value='1' size='2' />
                <input type='submit' value='Add to Cart' class='btn btn-outline-secondary btnAddAction'onclick='click_addcart()'/></div>
              </div>
          </form>
        </div>
        </div>
			";
		}
	}
  }
 
 

?>