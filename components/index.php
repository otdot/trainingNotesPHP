<?php include_once "../functions/sessions.php";
include_once "../functions/DBConnectandFuncs.php";

$query = "SHOW tables;";
$stmt = $conn->prepare($query);
if ($stmt->execute()) {
  $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
}else {
  echo "no connection to database";
}


if (!isset($_COOKIE["name"])) {
  setcookie("name", "", time() + 3600*24*30);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["login"])) {
    if (verify_login($conn)) {
        $program = $_GET["program"];
        $_SESSION["loggedin"] = true;
        setcookie("name", sanitazeInput($_POST["name"]), time() + 3600*24*30);
        header("location: ./index.php?program");
    }
  }
}

?>

    <?php include "./header.php";
      include "./backgroundimages.php";
      include "./form.php";
      if (isset($_GET["program"])) {
        include "./programs.php";
      }
      
      if (isset($_POST["login"])) {
        verify_login($conn);
      }
      if (isset($_POST["createaccount"])) {
        $name = $_POST["name"];
        createPersonalDB($conn, $tables);
      }
      ?>
      <?php include "./footer.php" ?>
