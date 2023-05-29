
<?php

    // define a $pagetitle individually for that page

    if(!isset($pagetitle)){
        $pagetitle = "Funity";
    }

    echo "<title>" . $pagetitle . "</title>
        <meta charset=\"UTF-8\" />
        <meta name=\"author\" content=\"Group Frodo\" />
        <link rel=\"stylesheet\" href=\"styles/style.css\">
        <script src=\"scripts/cart.js\"></script>
        <link rel='icon' href='pictures/icon2.png'>";
?>
