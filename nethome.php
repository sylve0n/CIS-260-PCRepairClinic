<?php
	session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <!-- PC Repair Clinic - Net Side Menu
    Created by Hannah Sartin, Adam Stover, and Steven Golden 
    May 2018 
    Version 1.0 -->
    <title>Net</title>
    <?php include "global/imports.php" ?>
  </head>

  <body>
    <?php include "global/net-header.php"?>
    <div class="container main-icons"> 
        <div class="row">
            <div class="col s4">
                <a href="search.php?side=net&mode=search&type=pSearch"  class="icon-links">
                    <i class="material-icons">search</i>
                    <h2 class="icons-text">Search Part</h2>
                </a>
                </div>
            <div class="col s4">
                <a href="search.php?side=net&mode=remove&type=bSearch" class="icon-links">
                    <i class="material-icons">remove_from_queue</i>
                    <h2 class="icons-text">Remove Part</h2>
                </a>
            </div>
            <div class="col s4">
                <a href="search.php?side=net&mode=return&type=bSearch" class="icon-links">
                    <i class="material-icons">keyboard_return</i>
                    <h2 class="icons-text">Return Part</h2>
                </a>
            </div> 
        </div>
        <div class="row">
            <div class="col s4">
                <a href="search.php?side=net&mode=add&type=pSearch" class="icon-links">
                    <i class="material-icons">add_to_queue</i>
                    <h2 class="icons-text">Add Part</h2>
                </a>
            </div>
            <div class="col s4">
                <a href="search.php?side=net&mode=edit&type=pSearch" class="icon-links">
                    <i class="material-icons">edit</i>
                    <h2 class="icons-text">Edit Part</h2>
                </a>
            </div>
            <div class="col s4 hidden"> 
                <a href="search.php?side=net&mode=reprint&type=bSearch" class="icon-links"> 
                    <i class="fas fa-barcode"></i> 
                    <h2 class="icons-text">Reprint Barcode - Future Use</h2>  
                </a> 
            </div> 
            <!--<div class="col s4">
                <a href="search.php?side=net&mode=reprint&type=pSearch" class="icon-links">
                    <i class="material-icons fas fa-barcode"></i>
                    <h2 class="icons-text">Future Use</h2> 
                </a>
            </div>-->
        </div>
    </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="global/materialize/js/materialize.min.js"></script>
  </body>
</html>