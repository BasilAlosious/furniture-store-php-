<!DOCTYPE>
<?php 
session_start();
include("Functions/functions.php");
include("includes/db.php"); 
?>
<html>
	<head>
		<title>Customer Register</title>	
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">	
	<link rel="stylesheet" href="styles/style.css" media="all" /> 
	</head>
	<style>
		 #wel{
     position: absolute;
    margin-left:45vw;
    margin-top: -120px;
    font-size: 30px;
    color: #A9A9A9 ;   
  }

         #sc{
     position: absolute;
    margin-left: 35vw;
    margin-top: 50px;
    font-size: 30px;
    color: #A9A9A9 ;   
  }
		  
		 #form_area{
		         	position: absolute;
  		            margin-left: 40vw;
  		            margin-top: 25vh;
		        }
	</style>
	
<body>
	
   <div id= "box1"> 
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand text-secondary" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="index.php#box2">About<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="customer_login.php">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="shop.php">Shop</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="#" tabindex="-1" aria-disabled="true">Contact Us</a>
      </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-secondary" type="submit"href="results.php">Search</button>
      </form>
  </div>
 </nav>
     
        <div id="navigation" class="top">
        <div class="nav-link">   
        </div>
         <div class="nav-link">
        </div>
             <div class="nav-link">
        </div> 
         <div class="nav-link">
        </div>                
    </div>
		
			  <div id="content_area">
            
            <?php cart(); ?>
            
            <div id="shopping_cart"> 
                    
                    <span style="float:left; font-size:25px; padding:5px; line-height:50px; font-family: helvetica;">
                    <div id="wel">
                    <?php 
                    if(isset($_SESSION['customer_email'])){
                    echo "<b>Welcome</b>" . $_SESSION['customer_email'];
                    }
                    else {
                    echo "<b>Welcome Guest</b>";
                    }
                    ?> </div> <br>  

                    <div id="sc">
                    </div>
                    
                    
                    
                    </span>
            </div>
        </div>
<div id="form_area">

	<form action="customer_register.php" method="post" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Name</label>
      <input type="text" class="form-control" name="c_name" id="inputEmail4" placeholder="Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Email</label>
      <input type="email" class="form-control" name="c_email" id="inputPassword4" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
   <div class="col"> 
    <label for="inputAddress">Password</label>
    <input type="password" class="form-control"  name="c_pass" id="inputAddress" placeholder="Password" required>
  </div>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Address</label>
    <input type="text" class="form-control" name="c_address" id="inputAddress2" placeholder="Apartment, studio, or floor" required>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" name="c_city" class="form-control" id="inputCity" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputState">State</label>
      <select id="inputState" name="c_country" class="form-control" required>
        <option selected>Choose...</option>
        <option>Karnataka</option>
        <option>Maharashtra</option>
        <option>Hyderabad</option>
      </select>
    </div>
    <div class="form-group col-md-2">
      <label for="inputZip">Contact</label>
      <input type="text" class="form-control" name="c_contact" id="inputZip" required>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div>
  <button type="submit" name="register" class="btn btn-outline-dark">Sign in</button>
</form>
</div>

	
</body>
</html>
<?php 
	if(isset($_POST['register'])){
	
		
	    $ip = getIp();
		
		$c_name = $_POST['c_name'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];
		$c_country = $_POST['c_country'];
		$c_city = $_POST['c_city'];
		$c_contact = $_POST['c_contact'];
		$c_address = $_POST['c_address'];
	
		 if (!$con) {
                 die("Connection failed: " . mysqli_connect_error());
        } 
		  $insert_c = "INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address)
		 VALUES ('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address')";
		 echo $insert_c;

		$run_c = mysqli_query($con, $insert_c);
		if ($run_c) {
   	   	  echo "<script>alert('customer has been registered!')</script>";
   	   }
   	   else {
   	   	    echo "Error: " . $insert_c. "<br>" . mysqli_error($con);
   	   	    echo "<script>alert('Customer has not been inserted!')</script>";
   	   }   
		
		$sel_cart = "select * from cart where ip_add='$ip'";
		
		$run_cart = mysqli_query($con, $sel_cart); 
		
		$check_cart = mysqli_num_rows($run_cart); 
		
		if($check_cart==0){
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		}
		else {
		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		
		echo "<script>window.open('cart.php','_self')</script>";
	        }
	}
?>










