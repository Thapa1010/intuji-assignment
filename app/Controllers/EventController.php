<?php 

namespace App\Controllers;

use App\Services\EventService;

class EventController{

    protected $eventService;
    public function __construct()
    {
        $this->eventService = new EventService();
    }

    public function index(){

        $events = $this->eventService->getEvents();
        include_once(__DIR__.'/../../views/events.php');
    }

    public function create()
    {
        include_once(__DIR__.'/../../views/newEvent.php');
    }

    public function store()
    {
        $title = $_POST['eventName'];
        $description = $_POST['description'];
        $startDateTime = $_POST['startDate'];
        $endDateTime = $_POST['endDate'];

        $this->eventService->createNewEvent($title,$description,$startDateTime,$endDateTime);
    }

    public function delete(){

        $eventId = $_POST['eventId'];
        
        if(empty($eventId)){
            putSession('error_message','Failed to delete event!');
            header('Location:' . '/events');
        }

        $this->eventService->deleteEvent($eventId);
    }
}