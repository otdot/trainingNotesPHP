    <?php 
    include_once "./DBConnectandFuncs.php";

    $query = "SHOW tables;";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    }else {
    echo "no connection to database";
    }

    if (isset($_POST["id"])) {
        add($conn);
    }
    if (isset($_POST["1"])) {
        updateRow($conn, "1");
    }
    if (isset($_POST["2"])) {
        updateRow($conn, "2");
    }
    if (isset($_POST["3"])) {
        updateRow($conn, "3");
    }
    if (isset($_POST["4"])) {
        updateRow($conn, "4");
    }
    if (isset($_POST["5"])) {
        updateRow($conn, "5");
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
    $query = "SELECT * FROM elaston";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $elaston = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
    
    include "./header.php";
    ?>


    
<div class="about">
    <h2 class=abouth2>About program Elaston2 program: </h2>
    <div>
        <p>Gain strenght and muscle mass</p>
        <p>Four training sessions in a week</p>
        <p>Divided to 4 sessions</p>
        <p>Two of the practices focus on strength and two focus on durability</p>
        <a href="https://www.treeniohjelma.org/elaston-2-jakoinen-treeniohjelma/">More information here</a>
    </div>
</div>



    <section class="session">
        <h2>Strenght practice A</h2>
    <div class="sets">
            <div>
            <?php 
            foreach ($elaston as $row => $value) {?>
                
                <h3><?=$value["practice"]?></h3>
                <p><?=$value["reps"]?> reps for <?=$value["sets"]?> sets </p>
                <p>Weight <input class="textarea" name=<?=$value["weightColumn"]?> value=<?=$weights[$value["weightId"]][$value['weightColumn']]?> /> </p>
                <form action="elaston.php" method="POST">
                    <input name="id" value=<?=$value['trainingNumber']?> hidden/>
                    <input name="column" value=<?=$value['weightColumn']?> hidden>
                    <button name="add" type="submit">Add 1 kilo</button>
                </form>
                <?php } ?>
            </div>
            <!--updatebutton ei toimi jos kaksi formia, addbutton ei toimi jos yksi formi -->
            <form action="elaston.php" method="POST">
            <button class="updatebutton" name="1" value="1" type="submit">Update weights</button>
            </form>
    </div>
    </section>

<?php include "./footer.php"; ?>