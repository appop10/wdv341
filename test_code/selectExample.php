<?php 
    /* 
        Database work flow
            1. Connect to the database
            2. create your SQL command
            3. Prepare your statement
            4. Bind any parameters as needed
            5. Execute your SQL command/prepared statement
            6. Process your result-set/object
    */

    // The PDO process
    // 1. Connect to the database, using the dbConnect.php
    require "../assignments/dbConnect.php"; // connect to the database
        // if in same folder, will look there = default pathname
        // creates a connection object called $conn
        // -> is the equvalent to object.notation in JavaScript because the period is the concatination symbol in PHP
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Create SQL command
    $sql = "SELECT name, description FROM wdv341_events";    // SQL syntax and format inside the quotes

    // 3. Prepare your statement/statement object
    $stmt = $conn->prepare("$sql");     // prepare the SQL statement and store results into the statement object
        // -> replaces the object.notation

    // 4. Bind parameters, if any
    // None for this version

    // 5. Execute the prepared statement
    $stmt->execute();   // the $stmt will CATCH the returned result-set/object

    // 6. Process the result set
    $stmt->setFetchMode(PDO::FETCH_ASSOC);    // set result as an associative array 

    // printed the result in the body

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>WDV 341 - Intro to PHP</h1>
    <h2>SELECT Example</h2>

    <?php 
        while ($row = $stmt->fetch()) {
            echo "<p>".$row['name']."<br>".$row['description']."</p>";
        }
    ?>
</body>
</html>