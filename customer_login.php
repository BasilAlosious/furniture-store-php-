<?php 
include("includes/db.php");
session_start();
?>
<html>
	<head>
		<title>Customer Login </title>	
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

			#formstuff{
				font-size: 30px;
				position: absolute;
				margin-top: 20vh;
				margin-left: 40vw;
				color: #2F4F4F;
			}

			#new{
				font-size: 20px;
				position: absolute;
				margin-top: 66vh;
				margin-left: 50vw;
				font-family: helvetica;
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
        <a class="nav-link text-secondary" href="contact_us.php" tabindex="-1" aria-disabled="true">Contact Us</a>
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

<div> 
	<div id="formstuff">
	<form method="post" action="">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email"class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pass"class="form-control" id="pass" placeholder="Password">
  </div>
  <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" name="login" value="Login" class="btn btn-outline-dark btn-lg btn-block">Login</button>
		</table> </form> </div>
		<div id ="new">
			<a class="btn btn-outline-dark btn-lg btn-block" href="customer_register.php" role="button">Signup</a>
	    </div>
	</form>
	
	
	<?php 
	if(isset($_POST['login'])){
	
		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];
		
		$sel_c = "select * from customers where customer_pass='$c_pass' AND customer_email='$c_email'";
		
		$run_c = mysqli_query($con, $sel_c);
		
		$check_customer = mysqli_num_rows($run_c); 
		
		if($check_customer==0){

		
		echo "<script>alert('Password or email is incorrect, please try again!')</script>";
		exit();
		}
		
		if($check_customer>0 ){

		
		$_SESSION['customer_email']=$c_email; 
		
		echo "<script>alert('You logged in successfully, Thanks!')</script>";
		echo "<script>window.open('customer/my_account.php','_self')</script>";
		
		
		}
		else {
		
		
		
		}
	}
	
	
	?>
	
	
	

</div>