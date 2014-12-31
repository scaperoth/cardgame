<?php 
include "MyDeck.php";

?>

<!DOCTYPE html>
<!--

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $deck = new MyDeck();
        
        echo $deck->draw_card();
        // put your code hereaa
        ?>
    </body>
</html>
