<h1>Create a new account</h1>
<!--<form action="index.php?program=<?=$_GET["program"]?>" method="POST">-->
<form action="index.php?>" method="POST">
    <label for="name">Name: </label>
    <input name="name" type="text">
    <label for="pass">Password: </label>
    <input name="pass" type="text">
    <input name="createaccount" type="submit">
</form>
<h1>Or login to an existing one</h1>
<form action="index.php?program=<?=$_GET["program"]?>" method="POST">
<label for="name">Name: </label>
    <input name="name" type="text">
    <label for="pass">Password: </label>
    <input name="pass" type="text">
    <input name="login" type="submit">
</form>