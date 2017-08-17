<?php
include_once 'header.php';
$destroy = session_destroy();
if($destroy){
	header('location:index.php');
}
?>
