<!DOCTYPE>
<?php 
include("Functions/functions.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSS Practice</title> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="Styles/style.css">
</head>
<style>
#wel{
     position: absolute;
    margin-left: 40vw;
    margin-top: 5px;
    font-size: 60px;
    color: #A9A9A9 ;   
  }

  #sc{
     margin-left: 35vw;
    margin-top: 45px;
    font-size: 30px;
    color: #A9A9A9;      
  }

  #products_box{
  		position: absolute;
  		margin-left: 40vw;
  		margin-top: 25vh;
  }
  #details{
      position: absolute;
      margin-left: 17vw;
      margin-top: 1.1vh;

  }

  #add_button{
      position: absolute;
      margin-top: 1.1vh;

  }

 #products_box{
    width:980px; 
    text-align:center;
    position: absolute;
    margin-left:550px;
    margin-top:190px;
    margin-bottom:10px; 

     }

  #single_product {float:left; margin-left:30px; padding:10px;}
	
  #single_product img {border:2px solid white;}


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
      <button class="btn btn-outline-light" type="submit"href="results.php">Search</button>
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
       <div class="content_wrapper">		
			</div>
			
</div>
		<!--Content wrapper starts-->
		
			        
    <div id="content_area">
            <?php cart(); ?>

            <div id="shopping_cart"> 
                    
                    <span style="float:left; font-size:25px; padding:5px; line-height:50px; font-family: helvetica;">
                    <div id="wel">
                    <?php 
                    if(isset($_SESSION['customer_email'])){
                    echo "<b>Welcome</b>" . $_SESSION['customer_email'] . "<b style='color: #A9A9A9;' >Your</b>" ;
                    }
                    else {
                    echo "<b>Welcome Guest</b>";
                    }
                    ?> </div> <br>  

                    <div id="sc">
                    
                    <b style="color:#2F4F4F">Shopping Cart -</b> Total Items: <?php total_items();?> Total Price:<?php total_price(); ?> <a href="cart.php" style="color:#2F4F4F">Go to Cart</a>
                    
                    
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
    </div>

	<div id="products_box">
   <?php getCats(); ?> 
   <?php getCatPro(); ?>
	}
	}
?>
				</div>
			</div>
		</div>	
	</div> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>