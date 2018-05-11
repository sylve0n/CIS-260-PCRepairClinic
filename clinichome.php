<?php
	session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- PC Repair Clinic - Clinic Side Menu
    Created by Hannah Sartin, Adam Stover, and Steven Golden 
    May 2018 
    Version 1.0 -->

    <?php include "global/imports.php" ?>
    <title>Clinic</title>
  </head>

  <body>
  <?php include "global/clinic-header.php"?>
    <div class="container main-icons"> 
        <div class="row">
            <div class="col s4">
                <a href="search.php?side=clinic&mode=search&type=pSearch" class="icon-links">
                    <i class="material-icons teal-text text-darken-2">search</i>
                    <h2 class="icons-text teal-text text-darken-4">Search Part</h2>
                </a>
                </div>
            <div class="col s4">
                <a href="search.php?side=clinic&mode=remove&type=bSearch" class="icon-links">
                    <i class="material-icons teal-text text-darken-2">remove_from_queue</i>
                    <h2 class="icons-text teal-text text-darken-4">Remove Part</h2>
                </a>
            </div>
            <div class="col s4">
                <a href="search.php?side=clinic&mode=return&type=bSearch" class="icon-links">
                    <i class="material-icons teal-text text-darken-2">keyboard_return</i>
                    <h2 class="icons-text teal-text text-darken-4">Return Part</h2>
                </a>
            </div> 
        </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="global/materialize/js/materialize.min.js"></script>
  </body>
</html>