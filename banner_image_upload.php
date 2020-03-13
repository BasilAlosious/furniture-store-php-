<?php 
include("includes/db.php");
include("Functions/functions.php");

$msg='';

if(isset($_POST['upload'])) {
	$image = $_FILES['image']['name'];
	$path = 'images/' .$image;

	$sql = $con->query("INSERT INTO banner (banner_image) VALUES ('$path')");

	if($sql){
	 move_uploaded_file($_FILES['image']['tmp_name'],$path);
	 $msg = 'Image Uploaded Sucessfully';
    }
    else {
     $msg='Image Upload Failed';
    }
  }
 ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banner Image Upload</title> 
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
</head>
<body> 
  <div class="row justify-content-center">
	  <div class="col-lg-4 bg-dark rounded px-4">
		 <h4 class="text-center text-light p-1">Select Image to Upload</h4>
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="file" name="image" class="form-control p-1"required>
				</div>

			   <div class="form-group">
					<input type="submit" name="upload" class="btn btn-warning btn-block value="Upload Image">
				</div>

			    <div class="form-group">
				  <h5 class="text-center text-light"> <?= $msg ?></h5>
				</div>
			</form>
		    </div>
</body>
</html>