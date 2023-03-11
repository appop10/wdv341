<?php

/* 
    This program will test the Event class
*/
    include "Event.php";

    $eventObject = new Event();

    // test each property
    $eventObject->set_eventName("WDV341");
    echo "Event Name: ".$eventObject->get_eventName();

    $eventObject->set_eventDescription("Intro to PHP");
    echo "<br>Event Description: ".$eventObject->eventDescription;

    // test JSON output
    $JSONEventObejct = json_encode($eventObject);
    echo "<br>".$JSONEventObejct;
?>