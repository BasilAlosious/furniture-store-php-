<!DOCTYPE>
<?php 
session_start();
include("Functions/functions.php");

?>
<html>
	<head>
		<title>My Account</title>	
	 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="style.css">	
	<link rel="stylesheet" href="../styles/style.css" media="all" /> 
	</head>
	<style >
		#wel{
     position: absolute;
    margin-left: 35vw;
    margin-top: 7px;
    font-size: 30px;
    color: #A9A9A9 ;   
  }
  #logout{
    position: absolute;
    margin-left: 56vw;
    margin-top: -120px;
  }

        #sc{
    margin-left: 30vw;
    margin-top: -420px;
    font-size: 30px;
    color: #A9A9A9;      
  }
	#acc_nav{

     position: absolute;
   margin-top: 10vh;
			  margin-left: 50vh;
         color: #A9A9A9; 

		}
   



	</style>
	
<body>
   <div id ="acc_nav"     
   ul class="nav ">
    <li class="nav-item">
      <a class="nav-link active text-secondary" href="my_account.php?my_orders">My Orders</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-secondary" href="my_account.php?edit_account">Edit Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-secondary" href="my_account.php?change_pass">Change password</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-secondary" href="my_account.php?delete_account">Delete Account</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active text-secondary" href="logout.php">Logout</a>
    </li
   /ul>

  </div>
	
	<div id= "box1">
  <div id="shopping_cart"> 
                    
       <span style="float:left; font-size:25px; padding:5px; line-height:50px; font-family: helvetica;">
          <div id="wel">
             <?php 
             if(isset($_SESSION['customer_email'])) {
            echo "<b>Welcome</b>" . $_SESSION['customer_email']  ;
                  }
            else {
                echo "<b>Welcome Guest</b>";
                   }
                ?> 

                
          </div> 
        </span>
      </div> 
	 <nav class="navbar navbar-expand-lg navbar-light bg-transparent ">
      <a class="navbar-brand text-secondary" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="../index.php#box2">About<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link text-secondary" href="../customer_login.php">Login</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link text-secondary" href="../shop.php">Shop</a>
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
 
        <div id="navigation" class="top">
        <div class="nav-link">
        </div>
         <div class="nav-link">
        </div>
        <div class="nav-link">
        </div>
         <div class="nav-link">
        </div>    
         <div class="nav-link">
			</div>
    
					
		
		
			
				<div id="products_box">

   
				
				<?php 
				if(!isset($_GET['my_orders'])){
					if(!isset($_GET['edit_account'])){
						if(!isset($_GET['change_pass'])){
							if(!isset($_GET['delete_account'])){
							
				
				}
				}
				}
				}
				?>
				
				<?php 
        if(isset($_GET['my_orders'])){
        include("my_orders.php");
        }
				if(isset($_GET['edit_account'])){
				include("edit_account.php");
				}
				if(isset($_GET['change_pass'])){
				include("change_pass.php");
				}
				if(isset($_GET['delete_account'])){
				include("delete_account.php");
				}
			   ?>	
	</div> 
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>