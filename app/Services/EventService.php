<?php


namespace App\Services;

use App\Models\Event;
use App\Models\EventCategory;
use App\Repositories\EventRepository;

class EventService
{
    public function __construct(protected EventRepository $eventRepository)
    {

    }
    public function index()
    {
        $events = $this->eventRepository->index();
        $events->load('createdBy', 'eventCategory');

        return $events;
    }

    public function store($input)
    {
        $event = $this->eventRepository->store($input);
        $event->load('createdBy', 'eventCategory');

        return $event;
    }

}
