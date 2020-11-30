<?php
require_once 'KLogger.php';

class Dao {

  private $host = "us-cdbr-east-02.cleardb.com";
  private $db = "heroku_ec87ebcbdbee7a7";
  private $user = "b41139d2ce73ec";
  private $pass = "b65b319c";
  private $logger;

  public function __construct () {
    $this->logger = new KLogger ("log.txt" , KLogger::DEBUG);
  }

  public function getConnection () {
    $this->logger->LogDebug("getting a connection");
    try {
      $conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
      return $conn;
    } catch (Exception $e) {
      //echo print_r($e,1);
      $this->logger->LogFatal("Ooops the database could not connect: " . print_r($e, 1));
      exit;
    }
  }

  public function saveUser($first, $last, $password, $email, $phone){
	  $this->logger->LogInfo("adding a user [{$email}]");
	  $conn = $this->getConnection();
	  $saveQuery = "insert into user (firstName, lastName, email, password, phone) values (:first, :last, :email, :password, :phone)";
	  $q = $conn->prepare($saveQuery);
	  $q->bindParam(":first", $first);
	  $q->bindParam(":last", $last);
	  $q->bindParam(":email", $email);
	  $q->bindParam(":password", hash("sha256", $password . "@#$%"));
	  $q->bindParam(":phone", $phone);
	  $q->execute();
  }
  
  public function deleteUser($id){
	  $conn = $this->getConnection();
	  $this->logger->LogInfo("deleting user [{$email}]");
	  $deleteQuery = "delete from user where id = :id";
	  $q = $conn->prepare($deleteQuery);
	  $q->bindParam(":id", $id);
	  $q->execute();
  }

  public function userExists($email, $password){
	$conn = $this->getConnection();
	$this->logger->LogDebug("Trying to log in [{$email}]");
	$query = "select * from user where email like :email and password like :password";
	$q = $conn->prepare($query);
	$q->bindParam(":email", $email);
	$q->bindParam(":password", hash("sha256", $password . "@#$%"));
	$q->execute();
	$result = $q->fetchAll();
	$this->logger->LogDebug("{$result}");
	return $result;
  }

  public function getPermissions($email, $password){
	$conn = $this->getConnection();
	$this->logger->LogDebug("Trying to find permissions for [{$email}]");
	$query = "select access from user where email like :email and password like :password";
	$q = $conn->prepare($query);
	$q->bindParam(":email", $email);
	$q->bindParam(":password", $password);
	$q->execute();
	$result = $q->fetchAll();
	$rtxt = print_r($result);
	$this->logger->LogDebug($rtxt);
	return $rtxt;
  }

  public function saveGallery($name, $pOne, $pTwo, $pThree, $pFour){
	$conn = $this->getConnection();
	$this->logger->LogDebug("Trying to create new gallery: [{$name}]");
	$saveQuery = "insert into galleries(path, highlightOne, highlightTwo, highlightThree, highlightFour) values (:path, :highlightOne, :highlightTwo, :highlightThree, :highlightFour)";
	$q = $conn->prepare($saveQuery);
	$q->bindParam(":path", $name);
	$q->bindParam(":highlightOne", $pOne);
	$q->bindParam(":highlightTwo", $pTwo);
	$q->bindParam(":highlightThree", $pThree);
	$q->bindParam(":highlightFour", $pFour);
	$this->logger->LogDebug($q->execute());
  }

  public function getGallery($path){
	$conn = $this->getConnection();
	$query = "select * from galleries where path like :path";
	$q = $conn->prepare($query);
	$q->bindParam(":path", $path);
	$q->execute();
	return $q->fetchAll();
  }
  
  public function getGalleryByID($id){
	$conn = $this->getConnection();
	$query = "select * from galleries where id = :id";
	$q = $conn->prepare($query);
	$q->bindParam(":id", $id);
	$q->execute();
	return $q->fetchAll();
  }

  public function deleteGallery($id){
	$this->logger->LogDebug("Deleting id: " . $id);  
	$conn = $this->getConnection();
	$query = "delete from galleries where id = :id";
	$q = $conn->prepare($query);
	$q->bindParam(":id", $id);
	$q->execute();
  }
 
}
?>
