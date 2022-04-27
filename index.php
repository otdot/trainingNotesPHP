<?php 
include_once "./DBConnectandFuncs.php";

$query = "SHOW tables;";
$stmt = $conn->prepare($query);
if ($stmt->execute()) {
  $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
}else {
  echo "no connection to database";
}


if (!isset($_COOKIE["name"])) {
  setcookie("name", "unknown", time() + 3600*24*30);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["name"])) {
    setcookie("name", sanitazeInput($_POST["name"]), time() + 3600*24*30);
    header("location: ./elaston.php");
  }
}

?>

    <?php include "./header.php" ?>
    <main>
      <?php include "./programs.php";
       
      if (isset($_GET["program"])) {
        include "./form.php";
      }
      if (isset($_POST["createaccount"])) {
        $name = $_POST["name"];
        createPersonalDB($conn, $tables);
      }
      ?>
      </main>
      <?php include "./footer.php" ?>
