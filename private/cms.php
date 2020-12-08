<head>
  <link rel="stylesheet" type="text/css" href="../styles/cms.css" >
</head>
<?php
session_start();

require_once("cms_helper.php");

echo "<a class='btn blue' href='logout.php'>LOGOUT</a>";

if (!isset($_SESSION["logged_in"]) && $_SESSION['logged_in'] != TRUE){
  header("Location: /ESY/");
  die();
}

$cms = new Helper();
$cms_data = $cms->getData("SELECT * FROM product");
$i = 1;
?>
<a class="btn" href="/ESY/private/create.php">Add new product!</a>
<table class="table">
  <tr>
    <th>#</th>
    <th>Name</th>
    <th>Stock</th>
    <th>Price</th>
    <th>Created</th>
    <th>Modified</th>
    <th>User</th>
    <th>Actions</th>
  </tr>
  <?php
    $role = $cms->getRole($_SESSION['username']);
    if (!empty($cms_data)){
      foreach ($cms_data as $data){
        echo "<tr>";
        foreach($data as $d){
          echo "<td>" . $d . "</td>";
        }
        if($role == "Admin"){
          echo "<td><a href='/ESY/private/edit.php?product={$data['id']}'>Edit</a> | <a href='/ESY/private/delete.php?product={$data['id']}'>Delete</a></td>";
        }
        echo "</tr>";
      }
    }
  ?>
</table>
