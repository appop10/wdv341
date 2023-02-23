<?php
    $readyStmt = true;

    // connect to the database and pull the necessary data
    include "../databases/dbConnect.php";
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT name, description, presenter, date, time FROM wdv341_events";

    $stmt = $conn->prepare("$sql");
    
    // if data can't be found, it won't break the code
        // error message will appear in the body
    try {
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        $readyStmt = false;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Unit 7 Assignment 1 Create selectEvents file">
    <meta name="author" content="Abby Poplawski">
    <title>Assignment 7-1</title>
    <style>
        body {
            background-color: lightgrey;
            font-family: Helvetica, Arial, sans-serif;
        }
        .container {
            width: 65%;
            border: 1px solid black;
            border-radius: 5px;
            padding: 50px;
            margin: 30px auto;
            background-color: white;
        }
        h3 {
            color: red;
        }
        table, tr, th, td {
            border: 1px solid lightgrey;
            border-collapse: collapse;
            padding: 10px 15px;
            text-align: left;
        }
        tr:nth-child(2n) {
            background-color: lightblue;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>WDV 341 - Intro to PHP</h1>
        <h2>Assignment 7-1 Create selectEvents.php</h2>

        <table><!-- table that displays the data -->
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Presenter</th>
                <th>Date</th>
                <th>Time</th>
            </tr>
            <?php

                if ($readyStmt == false) {
                    echo "<h3>No Data Found</h3>";
                } else {
                    while ($row = $stmt->fetch()) {
                        echo "<tr>
                        <td>".$row['name']."</td>
                        <td>".$row['description']."</td>
                        <td>".$row['presenter']."</td>
                        <td>".$row['date']."</td>
                        <td>".$row['time']."</td>
                        </tr>";
                    }
                }

            ?>
        </table>
    </div>
</body>
</html>