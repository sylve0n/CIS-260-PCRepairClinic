<!DOCTYPE html>
<html>
  <head>
    <!-- PC Repair Clinic - Net Side Menu
    Created by Hannah Sartin, Adam Stover, and Steven Golden 
    May 2018 
    Version 1.0 -->

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Net Home</title>
  </head>

  <body>
      <div>
          <!-- Navbar Section -->
          <nav>
              <div class="nav-wrapper">
              <a href="#!" class="brand-logo center">Net Main Menu</a>
              <ul class="left hide-on-med-and-down">
                  <li><a href="index.php">Home</a></li>
              </ul>
              </div>
          </nav> <!-- End Navbar -->

           <div class="container main-icons"> 
               <div class="row">
                    <div class="col s4">
                        <a href="search.php?mode=search"  class="icon-links">
                            <i class="material-icons">search</i>
                            <h2 class="icons-text">Search Part</h2>
                        </a>
                        </div>
                    <div class="col s4">
                        <a href="search.php?mode=remove" class="icon-links">
                            <i class="material-icons">remove_from_queue</i>
                            <h2 class="icons-text">Remove Part</h2>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="search.php?mode=return" class="icon-links">
                            <i class="material-icons">keyboard_return</i>
                            <h2 class="icons-text">Return Part</h2>
                        </a>
                    </div> 
                </div>
                <div class="row">
                    <div class="col s4">
                        <a href="search.php?mode=add" class="icon-links">
                            <i class="material-icons">add_to_queue</i>
                            <h2 class="icons-text">Add Part</h2>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="search.php?mode=edit" class="icon-links">
                            <i class="material-icons">edit</i>
                            <h2 class="icons-text">Edit Part</h2>
                        </a>
                    </div>
                    <div class="col s4">
                        <a href="search.php?mode=reprint" class="icon-links">
                            <i class="material-icons fas fa-barcode"></i>
                            <h2 class="icons-text">Future Use</h2> 
                        </a>
                    </div>
                </div>
            </div>
         
          <!-- JavaScript -->
          <script>

          </script>
      </div>

    <!--Import jQuery before materialize.js-->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
  </body>
</html>