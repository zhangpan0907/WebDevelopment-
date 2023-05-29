<?php

echo "<div id=\"header1\">
    <a href=\"index.php\">
    <img src=\"pictures/logo.png\" width=\"140\" height=\"140\">
    </a>

    <ul id=\"menu\">
    <li><a href=\"browse.php\">Browse</a></li>
    <li><a href=\"faq.php\">FAQ</a></li>
    <li><a href=\"cart.php\">Cart</a></li>
    </ul>
    </div>
    <form action=\"productSearch.php\" method=\"get\">
    <div id = \"searchBox\">
    <input type=\"text\" name=\"q\" placeholder=\"Search for a product...\" required />
    <input type=\"submit\" id='searchSubmit' value='Search'>
    </form>
    </div>
    ";