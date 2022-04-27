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


function createPersonalDB($conn, $tables) {
    $name = sanitazeInput($_POST['name']);
    if (!in_array($name, $tables)) {
      $query = "create table $name(
        trainingId integer not null primary key,
        a decimal(5,2) not null,
        b decimal(5,2) not null,
        c decimal(5,2) not null,
        d decimal(5,2),
        e decimal(5,2),
        f decimal(5,2),
        lastsession date
      );";
      $stmt = $conn->prepare($query);
      if ($stmt->execute()) {
        $query = "insert into $name values(1, 0, 0, 0, 0, 0, 0, null);";
        $query .= "insert into $name values(2, 0, 0, 0, 0, 0, 0, null);";
        $query .= "insert into $name values(3, 0, 0, 0, 0, 0, 0, null);";
        $query .= "insert into $name values(4, 0, 0, 0, 0, 0, 0, null);";
        $query .= "insert into $name values(5, 0, 0, 0, 0, 0, 0, null);";
        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
          echo "New training profile $name has been created!🏋️‍♀️";
        }
      }
    }else {
      echo "name already in use, please try another name";
      
    }
  }

  function add($conn) {
    $id = $_POST["id"];
    $column = $_POST["column"];
    $name = $_COOKIE['name'];
    $query = "UPDATE $name set $column = $column + '1.25' where trainingId=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}

function updateRow($conn, $row) {
  $name = $_COOKIE["name"];
  $id = $_POST[$row];
  $a = $_POST['a'] ?? 0;
  $b = $_POST['b'] ?? 0;
  $c = $_POST['c'] ?? 0;
  $d = $_POST['d'] ?? 0;
  $e = $_POST['e'] ?? 0;
  $f = $_POST['f'] ?? 0;
  echo $a . $b . $f . $name . $id;
  $query = "update $name set lastsession=now(), a=$a, b='$b', c=$c, d=$d, e=$e, f=$f where trainingId=$id";
  $stmt = $conn->prepare($query);
  if ($stmt->execute()) {
    echo "weights updated";
  }
}

?>