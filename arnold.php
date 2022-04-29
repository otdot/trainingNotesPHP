<?php 
    include_once "./DBConnectandFuncs.php";
    include_once "./modifyWeights.php";
    include "./header.php";

    $query = "SELECT * FROM arnold";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        $arnold = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } 
   ?>

<div class="about">
    <h2 class=abouth2>About program Arnold program: </h2>
    <div>
        <p>Gain strenght and muscle mass</p>
        <p>1-3 sessions per week</p>
        <p>1 session</p>
        <p>Focuses on building strength and muscle</p>
        <a href="https://www.myworkoutplans.net/arnolds-golden-six-muscle-mass-and-strength/">More information here</a>
    </div>
</div>

<section class="session">
        <h2>Arnold golden 6</h2>
        <p>Increase weight when you are able to do an exercise with 3 more reps</p>
        <div class="sets">
            <div>
            <?php 
            foreach ($arnold as $row => $value) {
                $column = "rep" . $value["weightColumn"];?>
                
                <h3><?=$value["practice"]?></h3>
                <p> <input name="reps" value="<?=$weights[$value["weightId"]][$column]?>"/> reps for <?=$value["sets"]?> sets </p>
                <form action="arnold.php" method="POST">
                <p>Weight <input class="textarea" name=<?=$value["weightColumn"]?> value="<?=$weights[$value["weightId"]][$value['weightColumn']]?>kg" /> </p>
                    <input name="id" value=<?=$value['trainingNumber']?> hidden/>
                    <input name="column" value=<?=$value['weightColumn']?> hidden>
                    <button name="addreps" value="1" type="submit">Add 1 rep</button>
                    <button name="addreps" value="-1" type="submit">Remove 1 rep</button>
                    <button name="updateWeight" value=<?=$value["weightColumn"]?> type="submit">Update weight</button>
                </form>
                <?php } ?>
                <p>lastsession <?=$weights[4]["lastsession"]?></p>
            </div>
        </div>
</section>


<?php include "./footer.php"; ?>