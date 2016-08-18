<?php
include "includes/config.php";
$database = new Config();
$db = $database->getConnection();

if($_GET['column'] and $_GET['id'] and $_GET['data'] and $_GET['nam_tab'])
{
  $nama_tab = $_GET['nam_tab'];
  $column = $_GET['column'];
	$id = $_GET['id'];
	$data = $_GET['data'];

	$query = "UPDATE $nama_tab SET $column='$data' where id='$id'";
  $stmt = $db->prepare( $query );
  if($stmt->execute()) {
    echo 'success';
}
}
?>
