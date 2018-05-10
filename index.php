<?php
	session_start();
	$_SESSION['start'] = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php 
        include "global/imports.php";
    ?>
</head>
<body>
    <h1>Choose a Side</h1>
    <div class="row main-icons">
        <div class="col s6">
            <a href="clinichome.php"  class="icon-links">
                <i class="material-icons teal-text text-darken-2">healing</i>
                <h2 class="icons-text teal-text text-darken-3">Clinic</h2>
            </a>
        </div>
        <div class="col s6">
            <a href="nethome.php"  class="icon-links">
                <i class="material-icons">language</i>
                <h2 class="icons-text">Net</h2>
            </a>
        </div>
    </div>
    
</body>
</html>