<?php 
include("includes/db.php");
include("Functions/functions.php");

$msg='';

   $result= $con->query("SELECT banner_image FROM banner")

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CSS Practice</title> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
</head>
<body> 
  <h2 class="text-center bg-dark text-light pb-2"> Inserting images to carrousel</h2>     
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
					      <img src="<?= $row['banner_image']?>"  width="100%" height="400">
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

					      <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Popper JS -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   </body>
</html>