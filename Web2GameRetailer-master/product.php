<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once "include/head.inc.php"; ?>
</head>

<?php 
    require_once "include/banner.inc.php";


    require_once "include/dbconn.inc.php";

    $id;


    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "SELECT name, publisher, price, age_rating, description FROM products WHERE product_id=?";

        $statement = mysqli_stmt_init($conn);

        if(mysqli_stmt_prepare($statement, $sql)){
            mysqli_stmt_bind_param($statement, 's', htmlspecialchars($id));

            if(mysqli_stmt_execute($statement)){
                mysqli_stmt_bind_result($statement, $name, $publisher, $price, $age_rating, $description);
    
                mysqli_stmt_fetch($statement);

                mysqli_stmt_close($statement);

                $pagetitle = $name . " - Funity";
                echo "<script> document.title = \"" . $pagetitle . "\";</script>";
                echo "<body>";
                
                echo "<div class='faq'>";

        
                echo "<h2>" . $name . "</h2><br>";
                echo "By: " . $publisher . "<br>";
                echo $price . " AUD<br>";
                echo "For: " . $age_rating . "<br>";
                echo "<h1>Description</h1>";
                echo $description . "<br><br>";


                // make add-to-cart button
                echo "<form action=\"addToCart.php\" method=\"post\">";
                echo "<input id=\"submitadd\" type=\"number\" name=\"add_amount\" min=\"1\" value=\"1\">";
                echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $id . "\">";
                echo "<input type=\"submit\" value=\"Add to cart\" />"; 
                echo "</form>";

                echo "</div>";

                // loading images...
        
                $sql2 = 'SELECT file_location FROM productpicture WHERE product_id=?';
        
                $statement2 = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($statement2, $sql2)) {

                    mysqli_stmt_bind_param($statement2, "s", $id);
                
                    mysqli_stmt_execute($statement2);
                

                    $result = mysqli_stmt_get_result($statement2);
                    while ($file_location = mysqli_fetch_row($result))
                    {
                        echo "<img src=\"" . $file_location[0] . "\" class=\"productPicture\">";
                    }


                
                    /* close statement */
                    mysqli_stmt_close($statement2);
                }

                
                
                           
            }
        }

    } else{
        echo "Error: invalid product";
    }






 








    echo "</body></html>";

    mysqli_close($conn);

    //require_once "include/footer.inc.php";


?>