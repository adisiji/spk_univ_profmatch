<?php
// check if value was posted
// include database and object file
 include_once 'includes/config.php';
 include_once 'includes/data.inc.php';

 // get database connection
 $database = new Config();
 $db = $database->getConnection();

 // prepare product object
 $table = 'universitas';
 $product = new Data($db,$table);

 // set product id to be deleted
 $product->id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: missing ID.');

 // delete the product
 if($product->delete()){
  echo "<script>location.href='show_list.php'</script>";
 }

 // if unable to delete the product
 else{
  echo "<script>alert('Gagal menghapus data')</script>";

 }
?>
