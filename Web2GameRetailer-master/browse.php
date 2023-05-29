<!DOCTYPE html>
<html lang="en">
<head>
<?php $pagetitle = "Browse - Funity"; require_once "include/head.inc.php"; ?>
</head>

<body>

  <?php require_once "include/banner.inc.php";
  
        require_once "include/dbconn.inc.php";



       
        
        $sql = "SELECT product_id,name,price,product_id FROM products";
        
        $statement1 = mysqli_stmt_init($conn);

        
            
            $result= mysqli_query($conn,$sql);

            //mysqli_stmt_close($statement1);

            if($result){
                $num_rows = mysqli_num_rows($result);
                if($num_rows>0){
                    echo"<ul>";
                    
                    while($row = mysqli_fetch_assoc($result))
                     {
        
                        $name = $row["name"];
                        
                        $price = $row["price"];

                        $id = $row["product_id"];


                        echo "<div class='bcontainer'>";





                        // print out rest of product information
                        echo "<a href='product.php?id=$id' class='searchResult'>$name</a> - $$price AUD<br><br>";



                        // search for a single image of the product

                        $sql2 = 'SELECT file_location FROM productpicture WHERE product_id=?';

                        $statement2 = mysqli_stmt_init($conn);

                        if (mysqli_stmt_prepare($statement2, $sql2)) {

                            mysqli_stmt_bind_param($statement2, "s", $id);
                        
                            mysqli_stmt_execute($statement2);
                        

                            $result2 = mysqli_stmt_get_result($statement2);
                            if ($file_location = mysqli_fetch_row($result2))
                            {
                                echo "<a href='product.php?id=$id'><img src=\"" . $file_location[0] . "\" class=\"browsePicture\"></a>";
                            }

                            /* close statement */
                            mysqli_stmt_close($statement2);
                        }
                       
                        echo "<form action=\"addToCart.php\" method=\"post\">";
                        echo "<input type=\"hidden\" name=\"product_id\" value=\"" . $id . "\">";
                        echo "<input type=\"hidden\" name=\"add_amount\" value='1'>";
                        echo "<input class=\"center\" type=\"submit\" value=\"Add to cart\" />"; 
                        echo "</div></form>";



                      
                    }
                   
                   
    


                    
                }
             
    
                 }
                  ?>
                
       
              

            
