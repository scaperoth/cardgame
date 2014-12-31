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
        $deck = new MyDeck();
        echo $deck->id;
        // put your code hereaa
        ?>
    </body>
</html>
