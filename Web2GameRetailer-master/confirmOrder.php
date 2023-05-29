<!DOCTYPE html>
<html lang="en">
<head>
  <?php $pagetitle = "Shopping Cart"; require_once "include/head.inc.php"; ?>
</head>
<body>
    <?php require_once "include/banner.inc.php";?>

<?php
require_once "include/dbconn.inc.php";



$thisOrderId;
$successful = false;

// create an orderDetail
// order_id = automatically set
// order_date = now()
// email_address = $_POST["email_address"]

if(isset($_POST["email_address"]) && isset($_POST["credit_card"])){

    $email_address = $_POST["email_address"];

    // do validation here
    $credit = $_POST["credit_card"];
    $credit_hash = hash("sha512", $credit);

    $coupon_id = 1;


    if(isset($_POST["appliedCoupon"])){

        $appliedCode = $_POST["appliedCoupon"];

        //echo "coupon= " . $appliedCode . "<br>";

        $sql = "SELECT coupon_id FROM Coupons WHERE code=?;";

        $statement = mysqli_stmt_init($conn);
    
    
        if(mysqli_stmt_prepare($statement, $sql)){
            mysqli_stmt_bind_param($statement, 's', $appliedCode);
    
            if(mysqli_stmt_execute($statement)){
                mysqli_stmt_bind_result($statement, $coupon_id);
    
                mysqli_stmt_fetch($statement);

                mysqli_stmt_close($statement);
            }
        }
    } 
    else{
        $coupon_id = 1;
    }




    $sql = "INSERT INTO orderDetail(credit_card, email_address, coupon_id) VALUES (?, ?, ?);";

    $statement = mysqli_stmt_init($conn);


    if(mysqli_stmt_prepare($statement, $sql)){
        mysqli_stmt_bind_param($statement, 'ssi', $credit_hash, htmlspecialchars($email_address), $coupon_id);

        if(mysqli_stmt_execute($statement)){
            mysqli_stmt_close($statement);

            // make a call to LAST_INSERT_ID()
            $sql = "SELECT LAST_INSERT_ID();";

            if($result = mysqli_query($conn, $sql)){
                $thisOrderId = mysqli_fetch_assoc($result)["LAST_INSERT_ID()"];
                $successful = true;

                //echo "Created order with ID: " . $thisOrderId;

                //echo "coupon id: " . $coupon_id;

            }

        }
    }

}




// first get highest product id from database
// dont need stmt_prepare because it's a static statement

if($successful){
    $sql = "SELECT MAX(product_id) as max_id FROM products";

    if($result = mysqli_query($conn, $sql)){
        $max_id = mysqli_fetch_assoc($result)["max_id"];
    
        //echo $max_id;
    
        // iterate through isset($_POST["product" . i]) for each product id
        for($i = $max_id; $i > 0; $i--){
    
            $check = "product" . $i;
    
            if(isset($_POST[$check])){
                $quantity = $_POST[$check];
                if(is_numeric($quantity)){
                    // add a Value to orderedProduct with SQL
                    // order_id = $thisOrderId
                    // product_id = $i
                    // quantity = $quantity
    
                    $sql = "INSERT INTO orderedProduct(order_id, product_id, quantity) VALUES (?, ?, ?);";
    
                    $statement = mysqli_stmt_init($conn);
                
                    if(mysqli_stmt_prepare($statement, $sql)){
                        mysqli_stmt_bind_param($statement, 'iii', $thisOrderId, $i, $quantity);
                
                        if(mysqli_stmt_execute($statement)){
                            mysqli_stmt_close($statement);
                        }
                    }
    
                }
            }
    
        }
    
    }
    echo "<script> clearCart(); </script>";

    // display amount of items ordered and total amount charges
    echo "<br>receipt sent to " . $email_address . ".";

} else{
    echo "Order couldn't be completed, no charges were made";
}




mysqli_close($conn);

?>
</body>