<head>
  <link rel="stylesheet" type="text/css" href="../styles/cms.css" >
</head>
<?php

session_start();

require_once("cms_helper.php");

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: /ESY/");
  die();
}

// TODO: Refactor this so products has a class and all of the functions - create, edit, delete.
?>
<form name='edit_product' method='POST' action='create_product.php' >
Product</br>
<label for="product">Name</label>
<input id="product" name='product' type='text' required required />
<label for="stock">Stock</label>
<input id="stck" name='stock' type='number' required />
<label for="price">Price</label>
<input id="price" name='price' type='number' min='0' step='.01' required />
<input name='submit' type='submit' value='submit' />
</form>
