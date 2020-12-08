<?php
session_start();
require_once("db_connection.php");

// In the DB I have 1 user defined with username: peteris and password: mySecurePassword123, role: Admin

$baseUrl = "localhost";

$username = $_POST["username"];
$password = $_POST["password"];

if (isset($username) && !empty($username)){
  if (isset($password) && !empty($password)){
    login($username, $password);
  }
}

// TODO: Throw error message if login data is incorrect
function login($username, $password){
  $contents = db_content($username);
  if (!empty($contents)){
    if ($username == $contents["uname"]){
      if (password_verify($password, $contents["upass"])){
        $_SESSION['username'] = $username;
        $_SESSION['logged_in'] = TRUE;
        header("Location: {$baseUrl}/ESY/private/cms.php");
        die();
      }else{
        header("Location: /ESY/index.php?data=incorrect");
      }
    }else{
      header("Location: /ESY/index.php?data=incorrect");
    }
  }
}

function db_content($username){
  $conn = new DB();
  $connection = $conn->connect();
  $query = "SELECT * FROM users WHERE username = ? LIMIT 1";

  if($stmt = $connection->prepare($query)){
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($uid, $uuname, $upass, $urole);
    $stmt->fetch();
    $stmt->close();
    return ["id" => $uid, "uname" => $uuname, "upass" => $upass, "urole" => $urole];
  }
}

?>
