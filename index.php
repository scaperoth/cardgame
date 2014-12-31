<?php
include dirname(__FILE__) . '/config/config.php';
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
        $deck = new PokerDeck();
        
        $card = $deck->draw_card();
        
        echo $card->title. " of ". $card->suit;
        // put your code hereaa
        ?>
    </body>
</html>
