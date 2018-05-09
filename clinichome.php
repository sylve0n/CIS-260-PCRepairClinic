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
                <a href="search.php?mode=search&type=pSearch" class="icon-links">
                    <i class="material-icons">search</i>
                    <h2 class="icons-text">Search Part</h2>
                </a>
                </div>
            <div class="col s4">
                <a href="search.php?mode=remove&type=bSearch" class="icon-links">
                    <i class="material-icons">remove_from_queue</i>
                    <h2 class="icons-text">Remove Part</h2>
                </a>
            </div>
            <div class="col s4">
                <a href="search.php?mode=return&type=bSearch" class="icon-links">
                    <i class="material-icons">keyboard_return</i>
                    <h2 class="icons-text">Return Part</h2>
                </a>
            </div> 
        </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  </body>
</html>