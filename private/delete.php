<?php

session_start();

require_once("cms_helper.php");

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: /ESY/");
  die();
}

$helper = new Helper();
if (isset($_GET['product'])){
  $productData = $helper->deleteProduct($_GET['product']);
  header("Location: /ESY/private/cms.php");
}else{
  header("Location: /ESY/private/cms.php");
  die();
}

?>
