<h1>Create a new account</h1>
<form action="index.php?program=elaston" method="POST">
    <label for="name">Name: </label>
    <input name="name" type="text">
    <input name="createaccount" type="submit">
</form>
<h1>Or login to an existing one</h1>
<form action="<?=$_GET['program']?>.php?program=arnold" method="POST">
<label for="name">Name: </label>
    <input name="name" type="text">
    <input name="login" type="submit">
</form>