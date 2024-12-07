<?php


namespace App\Services;

use App\Models\EventCategory;
use App\Repositories\EventRepository;

class EventService
{
    public function __construct(protected EventRepository $eventRepository)
    {

    }
    public function index()
    {
        $categories = $this->eventRepository->index();
        $categories->load('createdBy');

        return $categories;
    }

    public function store($input)
    {
        $member = $this->eventRepository->store($input);
        $member->load('createdBy');

        return $member;
    }

    public function update(EventCategory $category, $name = null, $description = null)
    {
        $category = $this->eventRepository->update($category, $name, $description);

        return $category;
    }
}
