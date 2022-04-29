<?php 
    include_once "./DBConnectandFuncs.php";
    include_once "./modifyWeights.php";
    include "./header.php";

    $query = "SELECT * FROM elaston";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $elaston = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
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
        <p>increase weight weekly</p>
        <div class="sets">
            <div>
            <?php 
            foreach (array_slice($elaston, 0, 5) as $row => $value) {?>
                
                <h3><?=$value["practice"]?></h3>
                <p><?=$value["reps"]?> reps for <?=$value["sets"]?> sets </p>
                <form action="elaston.php" method="POST">
                <p>Weight <input class="textarea" name=<?=$value["weightColumn"]?> value="<?=$weights[$value["weightId"]][$value['weightColumn']]?>kg" /> </p>
                    <input name="id" value=<?=$value['trainingNumber']?> hidden/>
                    <input name="column" value=<?=$value['weightColumn']?> hidden>
                    <button name="add" type="submit">Add 1.25 kilo</button>
                    <button name="updateWeight" value=<?=$value["weightColumn"]?> type="submit">Update weight</button>
                </form>
                <?php } ?>
                <p>lastsession <?=$weights[0]["lastsession"]?></p>
            </div>
        </div>
        <h2>Strenght practice B</h2>
        <p>increase weight weekly</p>
        <div class="sets">
            <div>
            <?php 
            foreach (array_slice($elaston, 5, 6) as $row => $value) {?>
                
                <h3><?=$value["practice"]?></h3>
                <p><?=$value["reps"]?> reps for <?=$value["sets"]?> sets </p>
                <form action="elaston.php" method="POST">
                <p>Weight <input class="textarea" name=<?=$value["weightColumn"]?> value="<?=$weights[$value["weightId"]][$value['weightColumn']]?>kg" /> </p>
                    <input name="id" value=<?=$value['trainingNumber']?> hidden/>
                    <input name="column" value=<?=$value['weightColumn']?> hidden>
                    <button name="add" type="submit">Add 1.25 kilo</button>
                    <button name="updateWeight" value=<?=$value["weightColumn"]?> type="submit">Update weight</button>
                </form>
                <?php } ?>
                <p>lastsession <?=$weights[1]["lastsession"]?></p>
            </div>
        </div>
        <h2>Hypertropfy practice A</h2>
        <p>increase reps weekly</p>
        <div class="sets">
            <div>
            <?php 
            foreach (array_slice($elaston, 11, 6) as $row => $value) {
                $column = "rep" . $value["weightColumn"];?>   
                <h3><?=$value["practice"]?></h3>
                <p> <input name="reps" value="<?=$weights[$value["weightId"]][$column]?>"/> reps for <?=$value["sets"]?> sets </p>
                <form action="elaston.php" method="POST">
                <p>Weight <input class="textarea" name=<?=$value["weightColumn"]?> value="<?=$weights[$value["weightId"]][$value['weightColumn']]?>kg" /> </p>
                    <input name="id" value=<?=$value['trainingNumber']?> hidden/>
                    <input name="column" value=<?=$value['weightColumn']?> hidden>
                    <button name="addreps" value="1" type="submit">Add 1 rep</button>
                    <button name="addreps" value="-1" type="submit">Remove 1 rep</button>
                    <button name="updateWeight" value=<?=$value["weightColumn"]?> type="submit">Update weight</button>
                </form>
                <?php } ?>
                <p>lastsession <?=$weights[2]["lastsession"]?></p>
            </div>
        </div>
        <h2>Hypertropfy practice B</h2>
        <p>increase reps weekly</p>
        <div class="sets">
            <div>
            <?php 
            foreach (array_slice($elaston, 17, 6) as $row => $value) {
                $column = "rep" . $value["weightColumn"];?>
                
                <h3><?=$value["practice"]?></h3>
                <p> <input name="reps" value="<?=$weights[$value["weightId"]][$column]?>"/> reps for <?=$value["sets"]?> sets </p>
                <form action="elaston.php" method="POST">
                <p>Weight <input class="textarea" name=<?=$value["weightColumn"]?> value="<?=$weights[$value["weightId"]][$value['weightColumn']]?>kg" /> </p>
                    <input name="id" value=<?=$value['trainingNumber']?> hidden/>
                    <input name="column" value=<?=$value['weightColumn']?> hidden>
                    <button name="addreps" value="1" type="submit">Add 1 rep</button>
                    <button name="addreps" value="-1" type="submit">Remove 1 rep</button>
                    <button name="updateWeight" value=<?=$value["weightColumn"]?> type="submit">Update weight</button>
                </form>
                <?php } ?>
                <p>lastsession <?=$weights[3]["lastsession"]?></p>
            </div>
        </div>
    </section>

<?php include "./footer.php"; ?>