<!--
    File content:
        Review of PHP basics
        Work with functions basics
        Work with dates basics
-->
<?php
    /*
        MVC Design pattern used in a lot of application development
            M - Model   your data, databases, stored data, variables and content
            V - View    the HTML, keep as much PHP out of the view as possible!
                        the main PHP in the view is "echo"
            C - Controller  the program business logic, where you do most of the work
        
        1. Keep as much PHP code at the top of the page as you can
        2. Define and assign variables at the top of the page, when possible

    */

    // when you define a variable, you MUST assing it a value
    $firstName = "John";
    $lastName = "Smith";

    // PHP will process $variables even inside quotes - a unique feature of PHP

    function displayName() {
        // tell the function to use the Global version of a variable
        // otherwise it assumes you're using a local version first

        global $firstName, $lastName;

        echo "$firstName $lastName";
    }

    $deliveryDate = date_create("2023-01-20");  // creates a Date/Time Object
    $formatDate = date_format($deliveryDate, "l n/d/Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Abby Poplawski"> 
    <title>Test Code 1 File</title>
</head>
<body>
    <h1>WDV 341 - Intro to PHP</h1>
    <h2>Test Code 1 File</h2>

    <h3>Basic PHP</h3>
    <p>Welcome <?php echo $lastName.", ".$firstName; ?></p>

    <p>Coded differently:</p>
    <p>Welcome <?php echo "$lastName, $firstName"; ?></p>

    <h3>Function</h3>
    <p>Thank you, <?php displayName(); ?></p>

    <h3>Date/Time</h3>
    <!-- Used the W3School reference -->
    <p>Day on the Appache server: <?php echo date("l"); ?></p>
    
    <p>Formatted date: <?php echo date("n/d/y"); ?></p> 

    <p>Delivery Date: <?php echo $formatDate; ?></p>
</body>
</html>