<?php

class Event {
    /*
        This class will be used to build an Event obejct from the wdv341 database of events 
        This will provide a standard way of building the Event object
    */

    /** properties **/ 
    public $eventName;
    public $eventDescription;
    public $eventPresenter;
    public $eventDate;
    public $eventTime;

    /** methods **/
    function __construct() {
        $eventName = "Event Name";
        $eventDescription = "Event Description";
        $eventPresenter = "Event Presenter";
    }   // automatically called when you create a new object from the class

    /** setters and getters, processing functions **/
    // eventName
    function set_eventName($inName) {
        $this->eventName = $inName;  
    }
    function get_eventName() {
        return $this->eventName;
    }
    // eventDescription
    function set_eventDescription($inDescription) {
        $this->eventDescription = $inDescription;  
    }
    function get_eventDescription() {
        return $this->eventDescription;
    }
    // eventPresenter
    function set_eventPresenter($inPresenter) {
        $this->eventPresenter = $inPresenter;  
    }
    function get_eventPresenter() {
        return $this->eventPresenter;
    }
    // eventDate
    function set_eventDate($inDate) {
        $this->eventDate = $inDate;  
    }
    function get_eventDate() {
        return $this->eventDate;
    }
    // eventTime
    function set_eventTime($inTime) {
        $this->eventTime = $inTime;  
    }
    function get_eventTime() {
        return $this->eventTime;
    }
}

?>