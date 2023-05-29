<!DOCTYPE html>
<html lang="en">
<head>
  <?php $pagetitle = "Search - Funity"; require_once "include/head.inc.php"; ?>
  <script src="scripts/script.js" defer></script>
</head>
<body>
    <?php require_once "include/banner.inc.php";?>



<?php

require_once "include/dbconn.inc.php";


if(isset($_GET["q"])){
    $query = "%" . $_GET["q"] . "%";

    echo "<h2 id=sres>Search results for: \"" . $_GET["q"] . "\"</h2><br>";

    // going to need some major input valdiation here

    $sql = "SELECT product_id, name, price from products WHERE name LIKE ?";

    $id;
    $name;
    $price;


    $statement = mysqli_stmt_init($conn);

    if(mysqli_stmt_prepare($statement, $sql)){

        mysqli_stmt_bind_param($statement, 's', htmlspecialchars($query));

        if(mysqli_stmt_execute($statement)){
            mysqli_stmt_bind_result($statement, $id, $name, $price);

            while(mysqli_stmt_fetch($statement) == true){
                // echo out each result
                echo "<div class='searchcontainer'><a href='product.php?id=$id' class='searchResult'>$name</a> - $$price AUD<br><br>";

                echo "<form action=\"addToCart.php\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $id . "\">";
                echo "<input type=\"hidden\" name=\"add_amount\" value='1'>";
                echo "<input type=\"submit\" value=\"Add to cart\" />"; 
                echo "</div></form>";
            }
            

            mysqli_stmt_close($statement);
        }
    } else{
        echo "prepare failed";
    }
}


mysqli_close($conn);


?>

</body>
