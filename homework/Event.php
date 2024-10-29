<?php

//this is a class file for the wdv341_events table
//author: Karin Brun
//date: 10/22/24

class Event {
    //properties
    private $eventsID;
    public $eventsName;
    public $eventsDescription;
    public $eventsPresenter;
    public $eventsDate;
    public $eventsTime;
    public $eventsDateInserted;
    public $eventsDateUpdated;

    //constructor method - it sets the default values of the properties in the NEW objects
    //                      DOES NOT CREATE THE NEW OBJECT
    function __construct(){
        //usually use an empty (no parameters)
        //set the default values of the properties of the new object
        $this->eventsID = 0;
        $this->eventsName = "";
        $this->eventsDescription = "";
        $this->eventsPresenter = "";
        $this->eventsDate = "";
        $this->eventsTime = "";
        $this->eventsDateInserted = "";
        $this->eventsDateUpdated = "";
    }


    //methods
        //setter/getters
        //      setter - takes an input value and applies to a property
        //      getter - returns the value of a property
    function setEventsID($inID){
        $this->eventsID = $inID;        //assign the input value to a property
    }

    function getEventsID(){
        return $this->eventsID;         //return the value to the function call
    }

    function setEventsName($inName){
        $this->eventsName = $inName;
    }

    function getEventsName(){
        return $this->$eventsName;
    }

    function setEventsDescription($inDescription){
        $this->eventsDescription = $inDescription;
    }

    function getEventsDescription(){
        return $this->eventsDescription;
    }

    function setEventsPresenter($inPresenter){
        $this->eventsPresenter = $inPresenter;
    }

    function getEventsPresenter(){
        return $this->eventsPresenter;
    }

    function setEventsDate($inDate){
        $this->eventsDate = $inDate;
    }

    function getEventsDate(){
        return $this->eventsDate;
    }

    function setEventsTime($inTime){
        $this->eventsTime = $inTime;
    }

    function getEventsTime(){
        return $this->eventsTime;
    }

    function setEventsDateInserted($inInserted){
        $this->eventsDateInserted = $inInserted;
    }

    function getEventsDateInserted(){
        return $this->eventsDateInserted;
    }

    function setEventsDateUpdated($inUpdated){
        $this->eventsDateUpdated = $inUpdated;
    }

    function getEventsDateUpdated(){
        return $this->eventsDateUpdated;
    }

        //processing methods

}



?>