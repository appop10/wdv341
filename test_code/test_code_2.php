<!--
    File content:
        Work with functions - custom functions
        Work with date and string handling
-->
<?php

    /* 
        Three main ways to 'return' values
        1. display the value to the output
        2. catch in a variable
        3. pass as a parameter into a function

        PHP doesn't have access to the client, so passing information through parameters isn't directly possible. Would have to pass parameters to JavaScript.
    */

    $backgroundColor = "green";
    $fontColor = "orange";

    function displayFavoriteColor($inColor) {
        echo $inColor;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Abby Poplawski"> 
    <title>Test Code 2 File</title>
    <script>

        function changeBackgroundColor(inColor) {
            document.querySelector("body").style.backgroundColor = inColor;
        }

        function pageLoad() {
            document.querySelector("button").onclick = function() {
                changeBackgroundColor(<?php echo "'$backgroundColor'"; ?>);
            }
        }

    </script>
</head>
<body onload=pageLoad();>
    <h1>WDV 341 - Intro to PHP</h1>
    <h2>Test Code 2 File</h2>

    <p><?php echo date("U"); ?></p>
    <p><?php echo date("n/d/y"); ?></p>
    <p>Expected Delivery Date: 
        <?php 
            $deliveryDate = date_create("2023-01-20");
            echo date_format($deliveryDate, "l n/d/Y"); 
        ?>
    </p>

    <p>Your favorite color is: <?php displayFavoriteColor($backgroundColor) ?></p>

    <p>
        <button>Change Background Color</button>
    </p>
</body>
</html>