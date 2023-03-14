<?php
    // most APIs that return JSON formated content will NOT need any HTML

    include "Event.php";

    try {
        // pull the events from the database
        require "../../databases/dbConnect.php"; 
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM wdv341_events WHERE id= :recordId"; 
        $stmt = $conn->prepare("$sql");
        $recordId = 2;
        $stmt->bindParam(':recordId', $recordId);
        $stmt->execute();   
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // load Event into PHP Object
        $row = $stmt->fetch();

        $eventObject = new Event();
        $eventObject->eventName = $row['name'];
        $eventObject->eventDescription = $row['description'];
        $eventObject->eventPresenter = $row['presenter'];
        $eventObject->eventDate = $row['date'];
        $eventObject->eventTime = $row['time'];

        // convert PHP Object into JSON and echo it
        echo json_encode($eventObject);

    } catch (PDOException $e) {

        echo "Oops! JSON formatting failed";

    }
    
?>