
<?php if (isset($_GET["createaccount"])) {?>
    <div class="form">

        <form action="index.php?login" method="POST">
            <h1>Create a new account</h1>
            <div class="forminput">
                <label for="name">Name: </label>
                <input name="name" type="text">
            </div>
            <div class="forminput">
                <label for="pass">Password: </label>
                <input name="pass" type="text">
            </div>
            <button class="submitButton" name="createaccount" type="submit">Create account</button>
        </form>
    </div>
<?php }
if (isset($_GET["login"])) {?>
<div class="form">
    <form action="index.php?program" method="POST">
        <h1>Login to an existing account</h1>
        <div class="forminput">
            <label for="name">Name: </label>
            <input name="name" type="text">
        </div>
        <div class="forminput">
            <label for="pass">Password: </label>
            <input name="pass" type="text">
        </div>
        <button class="submitButton" name="login" type="submit">Login</button>
    </form>
    </div>
<?php }?>

