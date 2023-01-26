<?php
    // global variables
    $timestamp = time();
    $phoneNumber = "1234567890";

    // function to format a timestamp
    function formatTimestamp($inTimestamp) {
        $formatDate = date("m/d/Y", $inTimestamp);

        return $formatDate;
    }

    // function to format a timestamp for international dates
    function formatInternationalTimestamp($inTimestamp) {
        $formatDate = date("d/m/Y", $inTimestamp);

        return $formatDate;
    }

    // function to format into a phone number
    // I assume I'm supposed to use substr()
    function formatPhoneNumber($inPhoneNumber) {
        // break up the string
        $partOne = substr($inPhoneNumber, 0, 3);
        $partTwo = substr($inPhoneNumber, 3, 3);
        $partThree = substr($inPhoneNumber, 6);

        // format the output and return
        return "$partOne - $partTwo - $partThree";
    }

    // function to format to US currency
    function formatCurrency($inCurrency) {
        $formattedAmount = number_format($inCurrency, 2);

        return "$".$formattedAmount;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Unit 4 PHP Functions assingment">
    <meta name="author" content="Abby Poplawski">
    <title>Unit 4 PHP Functions</title>
    <style>
        body {
            width: fit-content;
            margin: 50px;
            border: 1px solid black;
            padding: 50px;
            font-family: tahoma, arial;
        }
        h1, h2 {
            margin: 5px;
        }
        p {
            font-size: 1.3em;
        }
    </style>
</head>
<body>
    <h1>WDV 341 - Intro to PHP</h1>
    <h2>4-1 PHP Functions</h2>

    <p><strong>Original timestamp:</strong> <?php echo "$timestamp"; ?></p>
    <p><strong>Function 1:</strong> <?php echo formatTimestamp($timestamp); ?></p>
    <p><strong>Function 2:</strong> <?php echo formatInternationalTimestamp($timestamp); ?></p>
    <p><strong>Function 3:</strong> <br>
        <?php 

            // function to modify a string
            function modifyString($inString) {

                // I assume I need to trim any whitespace before counting the number of characters
                $trimString = trim($inString);
                $stringLength = strlen($trimString);
                $lowercaseString = strtolower($inString);
                $containsDMACC = strpos($lowercaseString, "dmacc");
                $isTrue = "False";

                // if statement to check the result of strpos()
                // I want to make the result show up as true or false for better readability
                if ($containsDMACC != "") {
                    $isTrue = "True";
                }

                // display results
                echo "<br>"."Number of characters: $stringLength";
                echo "<br>"."String in all lowercase: $lowercaseString";
                echo "<br>"."String contains DMACC: $isTrue";
            }

            echo modifyString("DMACC says hello!");

        ?>
    </p>
    <p><strong>Function 4:</strong> <?php echo formatPhoneNumber("1234567890"); ?></p>
    <p><strong>Function 5:</strong> <?php echo formatCurrency("1234.56"); ?></p>
</body>
</html>