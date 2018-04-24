<head><?php 
    include "../global/imports.php";
?></head>

<body>
    <?php 
        include "net-header.php";
        print "<h2>Add a Part </h2>";
        print "<h4>Choose a Category:</h4>";
        include "../global/database.php";
        $sql = "select * from category";
        $qry = mysqli_query($db, $sql);
    
        print "<ul class='collection'>";
        while ($rs = mysqli_fetch_array($qry)){
            extract ($rs);
            print "<a href='add${CategoryName}.php' class='collection-item'>${CategoryName}</a>";
        }
        print "</ul>"
    ?>
    
</body>