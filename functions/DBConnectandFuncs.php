<?php

function sanitazeInput($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

class DBConnect {
    private $server = "db";
    private $dbname = "trainingnotes";
    private $user = "root";
    private $pass = "lionPass";

    public function connect() {
        try {
            $conn = new PDO('mysql:host=' .$this->server . ';dbname=' . $this->dbname, $this->user, $this->pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch (\Exception $e) {
        echo "Databse Error: " . $e->getMessage();
        }
    }
}

$objectConn = new DBConnect;
$conn = $objectConn->connect();

function createAccount($conn) {
    $pass = htmlspecialchars($_POST["pass"]);
    $username = htmlspecialchars($_POST["name"]);
      if (preg_match("/[a-z]/", $pass) && (strlen($pass) >= 8) && preg_match("/[A-Z]/", $pass) && preg_match("/[0-9]/", $pass)) {
          $hashFormat = "$2y$10$";
          $salt = "littlebitofsaltasdasdasdasdasdasdasd";
          $hashNsalt = $hashFormat . $salt;
          $pass = crypt($pass, $hashNsalt);
          $query = "INSERT into users values('$username', '$pass', null);";
          $stmt = $conn->prepare($query);
          if ($stmt->execute()) {
            return true;   
            }
      }else {
          echo "<p class='errmsg'>password needs contain numbers, upper and lower case charactes and have atleast 8 characters.</p>";
          return false;
      }
}

function verify_login($conn) {
  $loginName = $_POST["name"];
  $loginPass = $_POST["pass"];
  $query = "select * from users where name='$loginName'";
  $stmt = $conn->prepare($query);
  if ($stmt->execute()) {
    $userInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if (password_verify($loginPass, $userInfo[0]["password"])) {
      return true;
    }else {
      return false;
    }
  }
}

function logout() {
  setcookie("name", "", time() - 10);
  session_destroy();
  header("location: ./index.php?program");
}



function createPersonalDB($conn, $tables) {
    $name = sanitazeInput($_POST['name']);
    if (createAccount($conn)) {
      if (!in_array($name, $tables)) {
        $query = "create table $name(
          trainingId integer not null primary key,
          a decimal(5,2),
          b decimal(5,2),
          c decimal(5,2),
          d decimal(5,2),
          e decimal(5,2),
          f decimal(5,2),
          lastsession date,
          repa integer,
          repb integer,
          repc integer,
          repd integer,
          repe integer,
          repf integer
        );";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
          $query = "insert into $name values(1, 0, 0, 0, 0, 0, 0, null, 0, 0, 0, 0, 0, 0);";
          $query .= "insert into $name values(2, 0, 0, 0, 0, 0, 0, null, 0, 0, 0, 0, 0, 0);";
          $query .= "insert into $name values(3, 0, 0, 0, 0, 0, 0, null, 8, 8, 8, 8, 8, 8);";
          $query .= "insert into $name values(4, 0, 0, 0, 0, 0, 0, null, 8, 8, 8, 8, 8, 8);";
          $query .= "insert into $name values(5, 0, 0, 0, 0, 0, 0, null, 10, 10, 10, 10, 10, 10);";
          $stmt = $conn->prepare($query);
          if ($stmt->execute()) {
            echo "<p class='errmsg'>New training profile $name has been created!🏋️‍♀️</p>";
          }
        }
      }else {
        echo "<p class='errmsg'> name already in use, please try another name</p>";
      }
    }
  }
    
    function add($conn, $amount) {
      $id = $_POST["id"];
      $column = $_POST["column"];
      $name = $_COOKIE['name'];
      if ($amount > 999) {
        return;
      }
      else if (str_contains($amount, "kg")) {
        $amount = substr($amount, 0, -2);
        $query = "UPDATE $name set $column = $amount, lastsession=now() where trainingId=$id";
      }else if ($amount == "1.25"){
      $query = "UPDATE $name set $column = $column + $amount, lastsession=now() where trainingId=$id";
    }else {
      $query = "UPDATE $name set $column = $amount, lastsession=now() where trainingId=$id";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute();
    
}

  function modifyReps($conn, $amount) {
    $column = "rep" .$_POST["column"];
    $id = $_POST["id"];
    $name = $_COOKIE['name'];
    $query = "UPDATE $name set $column = $column + $amount where trainingId=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}

?>