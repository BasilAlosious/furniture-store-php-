<!DOCTYPE html>
<?php 
session_start();
include("includes/db.php");

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AMSI</title> 
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Bevan|Fugaz+One|Lobster|Oleo+Script|Titan+One" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="styles/style.css">
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
</head>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 7px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  padding: 12px 20px;
  cursor: pointer;
  margin-top: 10px;
}


.container {
  position: absolute;
  margin-left: 20vw;
  margin-top:50px;
  border-radius: 5px;
  padding: 30px;
  background:#A9A9A9;
}
</style>



<body>
 <div id= "box1"> 
    <nav class="navbar navbar-expand-lg navbar-light ">
      <a class="navbar-brand text-secondary" href="index.php">Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav mr-auto">
       <li class="nav-item active">
        <a class="nav-link text-secondary" href="#box2">About<span class="sr-only"></span></a>
       </li>
       <li class="nav-item active">
        <a class="nav-link text-secondary" href="customer_login.php">Login</a>
       </li>
       <li class="nav-item active">
        <a class="nav-link text-secondary" href="shop.php">Shop</a>
       </li>
       <li class="nav-item active">
        <a class="nav-link text-secondary" href="contact_us.php" >Contact Us</a>
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
   <h1 style="text-align:center;color:#A9A9A9;">Contact Us</h1>
   <div class="container">
      <form action="contact_us.php" method="post" enctype="multipart/form-data">

       <label for="fname">First Name</label>
       <input type="text" id="fname" name="firstname" placeholder="Your name..">

       <label for="lname">Last Name</label>
       <input type="text" id="lname" name="lastname" placeholder="Your last name..">

        <label for="state">State</label>
       <select id="state" name="state">
         <option value="karnataka">karnataka</option>
         <option value="Hyderabad">Hyderabad</option>
         <option value="Maharashtra">Maharashtra</option>
       </select>

       <label for="subject">Subject</label>
       <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
       <input type="submit" name="insert_form" class="btn btn-outline-dark" value="Submit">
      </form>
   </div>
 </div>
</body>
</html>
<?php

   if (isset($_POST['insert_form'])) {
 
       //getting text data from the fields
       $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
           $state = $_POST['state'];
          $subject= $_POST['subject'];

          if (!$con) {
                 die("Connection failed: " . mysqli_connect_error());
        }
         $insert_form= "INSERT INTO contact_us (firstname, lastname, state, subject) 
         VALUES ('$firstname','$lastname','$state','$subject')";
         echo $insert_form;
       $insert_for = mysqli_query($con, $insert_form);
 
       if ($insert_for) {
          echo "<script>alert('Form has been submitted')</script>";
          echo "<script>window.open('contact_us.php', '_self')</script>";
       }
       else {
            echo "Error: " . $contact_us . "<br>" . mysqli_error($con);
            echo "<script>alert('Oops! Form was not submitted')</script>";
       }   
   }
     
?>
 

