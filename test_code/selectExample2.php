<?php
    /* This file will select ONE record with the WHERE clause */

    // The PDO process
    // 1. Connect to the database, using the dbConnect.php
    require "../assignments/dbConnect.php"; 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Create SQL command
    $sql = "SELECT name, description FROM wdv341_events WHERE id= :recordId";    
        // using a named variable instead of hardcoding
        // will have to bind parameters
    
    // 3. Prepare your statement/statement object
    $stmt = $conn->prepare("$sql");     

    // 4. Bind parameters, if any
    $recordId = 2;
    $stmt->bindParam(':recordId', $recordId);

    // 5. Execute the prepared statement
    $stmt->execute();   

    // 6. Process the result set
    $stmt->setFetchMode(PDO::FETCH_ASSOC);   

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