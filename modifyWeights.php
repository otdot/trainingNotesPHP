<?php     

$query = "SHOW tables;";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }else {
    echo "no connection to database";
    }

    if (isset($_POST["add"])) {
        add($conn, "1.25");
    }
    if (isset($_POST["updateWeight"])) {
        add($conn, $_POST[$_POST["updateWeight"]]);
    }
    if (isset($_POST["addreps"])) {
        modifyReps($conn, $_POST["addreps"]);
    }


    $name = $_COOKIE["name"];
    $query = "SHOW tables;";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        if (in_array($name, $tables)) {
            $query = "SELECT * FROM $name";
            $stmt = $conn->prepare($query);
            if ($stmt->execute()) {
                $weights = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }
        }
    }
        ?>