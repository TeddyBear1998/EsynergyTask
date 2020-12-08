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

$helper = new Helper();
if (isset($_GET['product'])){
  $productData = $helper->getProduct($_GET['product']);
}else{
  header("Location: /ESY/private/cms.php");
  die();
}

echo "<form name='edit_product' method='POST' action='save_product.php' >";
echo "Product</br>";
echo "<input name='product' type='text' required value='{$productData['product']}' required />";
echo "<input name='stock' type='number' value='{$productData['stock']}' required />";
echo "<input name='price' type='number' min='0' step='.01' value='{$productData['price']}' required />";
echo "<input name='id' type='hidden' value='{$productData['id']}' />";
echo "<input name='submit' type='submit' value='submit' />";
echo "</form>";

?>
