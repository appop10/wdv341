<?php
    /* This file will select the records and format the output */

    // The PDO process
    // 1. Connect to the database, using the dbConnect.php
    require "../assignments/dbConnect.php"; 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Create SQL command
    $sql = "SELECT name, description, presenter FROM wdv341_events";    
        // using a named variable instead of hardcoding
        // will have to bind parameters
    
    // 3. Prepare your statement/statement object
    $stmt = $conn->prepare("$sql");     

    // 4. Bind parameters, if any
    // none

    // 5. Execute the prepared statement
    $stmt->execute();   

    // 6. Process the result set
    $stmt->setFetchMode(PDO::FETCH_ASSOC);   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .courseCard {
            background-color: beige;
            width: 55%;
        }
    </style>
</head>
<body>
    <h1>WDV 341 - Intro to PHP</h1>
    <h2>SELECT Example</h2>

    <div class="courseCard">
        <h3>WDV 221 Intro JavaScript</h3>
        <p>This course discusses the JavaScript programming language</p>
        <p>Presenter: Matt Hall</p>
    </div>

    <?php
        while ($row = $stmt->fetch()) {
    ?>

    <div class="courseCard">
        <h3><?php echo $row['name'] ?></h3>
        <p><?php echo $row['description'] ?></p>
        <p><strong>Presenter: </strong><?php echo $row['presenter'] ?></p>
    </div>

    <?php
        }
    ?>
</body>
</html>