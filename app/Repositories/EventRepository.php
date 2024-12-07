<?php


namespace App\Repositories;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Auth;

class EventRepository
{
    public function __construct(protected Event $model)
    {

    }

    public function index()
    {
        $events = $this->model->latest()->get();

        return $events;
    }

    public function store($input)
    {
        $event = $this->model->create([
            'name' => $input->name,
            'event_category_id' => $input->event_category,
            'description' => $input->description,
            'goal' => $input->goal,
            'location' => $input->location,
            'points_1' => $input->points_1,
            'points_2' => $input->points_2,
            'points_3' => $input->points_3,
            'created_by' => Auth::id(),
        ]);

        return $event;
    }
}
