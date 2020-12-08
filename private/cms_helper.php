<?php

require_once("db_connection.php");

class Helper {

  public function getData($query){
      $conn = new DB();
      $connection = $conn->connect();
      $data = [];
      // TODO: make sure 0 records exception gets handled properly.
      if($stmt = $connection->prepare($query)){
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $stmt->close();
      }
      $conn->disconnect($connection);
      return $data;
  }

  // TODO: Make sure that a record exists, if not throw error message
  public function getProduct($id){
    $conn = new DB();
    $connection = $conn->connect();

    $query = "SELECT * FROM product WHERE id = ? LIMIT 1";
    if($stmt = $connection->prepare($query)){
      $stmt->bind_param("s", $id);
      $stmt->execute();
      $stmt->bind_result($pid, $pproduct, $pstock, $pprice, $pcreated, $pmodified, $pmod);
      $stmt->fetch();
      $stmt->close();
    }
      return ["id" => $pid, "product" => $pproduct, "stock" => $pstock, "price" => $pprice, "created" => $pcreated, "modified" => $pmodified, "mod_user" => $pmod];
  }

  public function deleteProduct($id){
    $conn = new DB();
    $connection = $conn->connect();

    $query = "DELETE FROM product WHERE id = ? LIMIT 1";
    if($stmt = $connection->prepare($query)){
      $stmt->bind_param("s", $id);
      $stmt->execute();
      $stmt->close();
    }
      return True;
  }

  // TODO: Make sure this executes without errors with any data provided.
  public function saveProductData($data){
    $conn = new DB();
    $connection = $conn->connect();
    $query = "UPDATE product SET name=?, stock=?, price=?, modified=?, mod_user=? WHERE id = ?";
    if($stmt = $connection->prepare($query)){
      $stmt->bind_param("sidssi", $data['product'], $data['stock'], $data['price'], $data['modified'], $data['mod_user'], $data['id']);
      $stmt->execute();
      $stmt->close();
    }
    return true;
  }

  // TODO: Make sure this executes without errors with any data provided.
  public function createProductData($data){
    $conn = new DB();
    $connection = $conn->connect();
    $query = "INSERT INTO product(name, stock, price, created, mod_user) VALUES (?,?,?,?,?)";
    if($stmt = $connection->prepare($query)){
      $stmt->bind_param("sidss", $data['product'], $data['stock'], $data['price'], $data['created'], $data['mod_user']);
      $stmt->execute();
      $stmt->close();
    }
    return true;
  }

  public function getRole($username){
    $conn = new DB();
    $connection = $conn->connect();

    $query = "SELECT role FROM users WHERE username=? LIMIT 1";
    if($stmt = $connection->prepare($query)){
      $stmt->bind_param("s", $username);
      $stmt->execute();
      $stmt->bind_result($role);
      $stmt->fetch();
      $stmt->close();
    }
    return $role;
  }

}


?>
