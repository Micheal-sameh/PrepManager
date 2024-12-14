<?php


namespace App\Services;

use App\Models\Event;
use App\Models\EventCategory;
use App\Repositories\EventMembersRepository;
use App\Repositories\EventRepository;

class EventMembersService
{
    public function __construct(protected EventMembersRepository $eventMembersRepository)
    {

    }
    public function index()
    {
        $members = $this->eventMembersRepository->index();
        $members->load('createdBy', 'eventCategory', 'user');

        return $members;
    }

    public function store($input)
    {
        $event = $this->eventMembersRepository->store($input);
        $event->load('createdBy', 'eventCategory');

        return $event;
    }

}
