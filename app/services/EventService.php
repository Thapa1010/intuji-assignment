<?php 

namespace App\Services;

use Exception;
use Google\Client;
use Google\Service\Calendar;
use Google\Service\Calendar\Event;


class EventService{

    protected Client $googleClient;
    protected  Calendar $calendar;
    public function __construct()
    {
        $this->googleClient = new Client();
        $this->googleClient->setAuthConfig(__DIR__.'/../../google-config.json');
        $this->googleClient->addScope(Calendar::CALENDAR);
        $this->googleClient->setAccessToken(getSession('google_oauth_token'));
        $this->calendar = new Calendar($this->googleClient);
    }

    public function getEvents()
    {
        return $this->calendar->events->listEvents(
            'primary',
            [
                'maxResults' => 20,
                'singleEvents' => true,
                'orderBy' => 'startTime',
                'timeMin' => date_format(new \DateTime(),'c')
            ]
            );      
    }

    public function createNewEvent(string $title, string $description, string $startDateTime,string $endDateTime )
    {
        //sanitazing the payload according to the requirement
        $start = [
            'dateTime' => date_format(new \DateTime($startDateTime),'c'),
            'timeZone' => date_default_timezone_get()
        ];
        $end = [
            'dateTime' => date_format(new \DateTime($endDateTime),'c'),
            'timeZone' => date_default_timezone_get()
        ];
        $eventData['summary'] = $title;
        $eventData['description'] = $description;
        $eventData['start'] = $start;
        $eventData['end'] = $end;

        $newEvent = new Event($eventData);

        try{
            $this->calendar->events->insert('primary',$newEvent);
            putSession('success_message','Event Sucessfully Created!');
        }catch(Exception $e)
        {
            print_r($e->getMessage());
            putSession('error_message',$e->getMessage());
        }

        header('Location:' . '/events');
    }

    public function deleteEvent($eventId)
    {
        try{
            $this->calendar->events->delete('primary',$eventId);
            putSession('success_message','Event Deleted');
        }catch(Exception $e){
            putSession('error_message',$e->getMessage());
        }

        header('Location:' .'/events');
    }

}