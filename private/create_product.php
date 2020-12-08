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

$data = $_POST;
$today = date("d.m.Y");
$username = $_SESSION['username'];
$data["created"] = $today;
$data["mod_user"] = $username;
$helper = new Helper();
$helper->createProductData($data);

header("Location: /ESY/private/cms.php");
die();
