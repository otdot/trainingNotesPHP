<?php include_once "../functions/sessions.php" ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculate your reps and sets!</title>
    <link rel="stylesheet" href="../assets/styles.css">
  </head>
  <body>
    <header class="header">
      <h1><a href="index.php?program">Home</a></h1>
      <h1 class="headerProgramOwner"> <?php if (isset($_COOKIE["name"])) { echo $_COOKIE["name"] . "'s program"; } ?>  </h1>
      <ul>
        <?php 
        if ($logged_in) {?>
          <li><a href="logout.php">Logout</a> <?php
        }else {?>
          <li><a href="index.php?login">Login</a></li>
          <li><a href="index.php?createaccount">Create Account</a></li><?php
        }?>
      </ul>
    </header>
    <main>