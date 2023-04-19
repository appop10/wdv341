<?php
    session_start();
    // called by the displayEvents.php to delete a selected event from the database

    if ($_SESSION['validUser']) {
        // pull get parameter eventID from the URL and display on this page
        $eventID = $_GET["eventID"];  

        // do the actual delete
        try {
            require "../../databases/dbConnect.php";
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            $sql = "DELETE FROM wdv341_events WHERE id=:eventID";

            $stmt = $conn->prepare("$sql");
            $stmt->bindParam(':eventID', $eventID);
            
            $stmt->execute();

            header("Location: displayEvents.php");
        } catch(PDOException $e) {
            echo "Oops, something went wrong";
        }
    } else {
        header("Location: loginPage.php");
    }
?>