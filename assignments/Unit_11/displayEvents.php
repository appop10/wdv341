<?php
    session_start();
    /*
    Delete an event
        display all available events
            connnect to database
            pull information - SELECT query
            display - format as table?
    */

    if ($_SESSION['validUser']) {
        try {
            require "../../databases/dbConnect.php";
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
            $sql = "SELECT id, name, description, presenter, date, time FROM wdv341_events";
    
            $stmt = $conn->prepare("$sql");
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
        } catch(PDOException $e) {
            
        }
    } else {
        header("Location: loginPage.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Event</title>

    <!-- stylesheets -->
    <link rel="stylesheet" href="stylesheets/display-event-page.css">
</head>
<body>
    <nav>
        <p><a href="loginPage.php">Admin Area</a></p>

        <ul>
            <li><a href="unit_11_self_posting_form.php">New Event</a></li>
            <li><a href="displayEvents.php">Display Events</a></li>
            <li><a href="logoutPage.php">Sign out</a></li>
        </ul>
    </nav>

    <main>
        <table>
            <tr class="first-row">
                <td>Event Name</td>
                <td>Event Description</td>
                <td>Presenter</td>
                <td>Date</td>
                <td>Time</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php
                while ($row = $stmt->fetch()) {
            ?>
                <tr>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["presenter"]; ?></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td><?php echo $row["time"]; ?></td>
                    <td><a href="#"><button>Edit</button></a></td>
                    <td><a href="deleteEvent.php?eventID=<?php echo $row["id"]; ?>"><button>Delete</button></a></td>
                </tr>
            <?php
                }
            ?>
        </table>
    </main>
</body>
</html>