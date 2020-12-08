<?php

class DB {

  protected $servername = "localhost";
  protected $username = "root";
  protected $password = "";
  protected $database = "esy";

  public function connect(){
    $connect = new mysqli( $this->servername, $this->username, $this->password, $this->database );

    if ( mysqli_connect_errno() ) {
			printf("Connection failed: %s\
      ", mysqli_connect_error());
			exit();
		}
		return $connect;
  }

  public function disconnect($connection){
    $connection->close();
  }

}

?>
