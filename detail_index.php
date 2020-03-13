<?php
session_start();
include("Functions/functions.php");
include 'DB_Controller.php';
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
<?php
   if(!empty($_GET["code"])){
    

    $productResult = $db_handle->runQuery("SELECT * FROM tbl_product WHERE code= '" . $_GET["code"] . "");
if (! empty($productResult)) {
    ?>
     
        <div id="product-view">
    <?php 
    $productImageResult = $db_handle->runQuery("SELECT * FROM tbl_product_image WHERE id='" . $_GET["code"] . "' ");
    if(! empty($productImageResult)) {
    ?> 
            <div class="preview-image">
            <div id="preview-enlarged">
            <img src="<?php echo $productImageResult[0]["preview_source"] ; ?>" />
            </div>
            
            <div id="thumbnail-container">
            <?php foreach($productImageResult as $key=>$value) { 
                $focused = "";
                if($key == 0) {
                    $focused = "focused";
                }
                ?>
                <img class="thumbnail <?php echo $focused; ?>" src="<?php echo $productImageResult[$key]["preview_source"] ; ?>" />
            <?php } ?>
            </div>
        </div>
        <?php } ?>
<div class="product-info">
                <div class="product-title"><?php echo $productResult[0]["name"] ; ?></div>
              
                <div class="product-category"><?php echo $productResult[0]["category"] ; ?>
                
                </div>
                <div><?php echo $productResult[0]["price"] ; ?> USD</div>
                <div><a href="index.php"><button class="btn-info">View Gallery</button></a><button class="btn-info">Add to Cart</button></div>
            </div>    
<?php
}
}
?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
$("#thumbnail-container img").click(function() {
	$("#thumbnail-container img").css("border", "1px solid #ccc");
    var src = $(this).attr("src");
    $("#preview-enlarged img").attr("src", src);
    $(this).css("border", "#fbb20f 2px solid");
    
});
</script>
</body>
</html>