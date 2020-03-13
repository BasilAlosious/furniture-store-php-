<!DOCTYPE>
<?php 

include("Functions/functions.php");

include("includes/db.php");
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="Styles/style.css">
</head>

<style>

		#box{
			position: absolute;
			margin-left:30vw;
			margin-top: 30vh; 
		}

		#wel{
            position: absolute;
             margin-left: -30vw;
             margin-top: 5px;
             font-size: 60px;
             color: #A9A9A9 ; 
             text-align: center;   
        }

       #sc{
           position: absolute;
           margin-left: -30vw;
           margin-top: 50px;
           font-size: 30px;
           color: #A9A9A9 ;   
        }

</style>
<body>
<div id= "box1">
	    <nav class="navbar navbar-expand-lg navbar-dark "style="background-color:#A9A9A9;">
      <a class="navbar-brand" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php#box2">About<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="customer_login.php">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="shop.php">Shop</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="contact_us.php" tabindex="-1">Contact Us</a>
      </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-warning" type="submit"href="results.php">Search</button>
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
	
			<div id="content_area">
			
			<?php cart(); ?>
			
			<div id="shopping_cart"> 
					
					<span style="float:left; font-size:25px; padding:5px; line-height:50px; font-family: helvetica;">
					<div id="wel">
                    <?php 
                    if(isset($_SESSION['customer_email'])){
                    echo "<b>Welcome</b>" . $_SESSION['customer_email'] ;
                    }
                    else {
                    echo "<b>Welcome Guest</b>";
                    }
                    ?> </div> <br>  

                    <div id="sc">
                    
                    <b style='color: #A9A9A9;' >Your</b> <b style="color:#2F4F4F">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price:<?php total_price(); ?>

                    <?php 
                    if(!isset($_SESSION['customer_email'])){
                    
                    echo "<a href='customer_login.php' style='color:#696969;'>Login</a>";
                    
                    }
                    else {
                    echo "<a href='logout.php' style='color:#2F4F4F;'>Logout</a>";
                    }
                    
                    
                    
                    ?> </div>
					
					</span>
			</div>
      <div id="products_box">
        
        <?php 
        if(!isset($_SESSION['customer_email'])){
          
          include("customer_login.php");
        }
        else {
        
        include("index_razor.php");
        
        }
        
        ?>
        
        </div>
      
       </div>
</body>
</html>