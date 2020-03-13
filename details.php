<!DOCTYPE>
<?php 
 include("includes/db.php");
 include("Functions/functions.php");
  $msg='';

   $code = $_GET['code'];
    $result= $con->query("SELECT * FROM images WHERE code='$code'");
    $pro_result="SELECT * FROM products WHERE code='$code'";
    $run_c = mysqli_query($con, $pro_result);              
    $row_c = mysqli_fetch_array($run_c); 

    $pro_title =  $row_c['product_title'];
    $pro_price =  $row_c['product_price'];
    $pro_desc =   $row_c['product_desc'];
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $pro_title; ?> Details</title> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
    margin-left:70px;
    margin-top:100px;
    margin-bottom:10px; 

     }
#detail_title{
width:400px;
height:400px;
background: white;
color:#A9A9A9;
font-size:22px;
font-family: Optima; 
padding:20px;
position: absolute;
 margin-left:950px;
margin-top:100px;

}


        </style>
<body>
<div id= "box1">
	    <nav class="navbar navbar-expand-lg navbar-dark;">
      <a class="navbar-brand text-secondary" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto " >
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
        <a class="nav-link text-secondary" href="contact_us.php" tabindex="-1">Contact Us</a>
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
       <div class="content_wrapper">		
			</div>			
</div>

	<div id="products_box">   
  <div class="container-fluid">
    <div class="row">
        <div class="col-lg-10">
           <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
          <ul class="carousel-indicators">
              <?php
                $i=0;
               foreach ($result as $row) {
                        $actives='';
                if($i==0){
                  $actives = 'active';
                       }
              ?> 
              <li data-target="#demo" data-slide-to="<?= $i; ?>" class="<?= $actives; ?>"></li>

              <?php $i++; } ?>

           </ul>

            <!-- The slideshow -->
            <div class="carousel-inner">
                <?php
                $i=0;
               foreach ($result as $row) {
                $actives='';
                if($i==0){
                   $actives = 'active';
                  }
              ?> 
              <div class="carousel-item <?= $actives; ?>">
             <img src="Admin_panel/<?= $row['image']?>"   width="100%" height="400">
              </div>
              <?php $i++; } ?>
            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
           </div>
               
      </div>
       </div>
       </div>
      </div>

      <div id= "detail_title">
      	<h1><?php echo $pro_title; ?></h1>
      	<h2>₹<?php echo  $pro_price; ?></h2>
      	<p>Size:<?php echo  $pro_desc; ?> </p>
      </div>

</div> 
 
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
