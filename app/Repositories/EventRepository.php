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
            'description' => $input->description,
            'goal' => $input->goal,
            'location' => $input->location,
            'bonus_1' => $input->bonus_1,
            'bonus_2' => $input->bonus_2,
            'bonus_3' => $input->bonus_3,
            'created_by' => Auth::id(),
        ]);

        return $event;
    }

    public function update(EventCategory $category, $name, $description)
    {
        $category->update([
            'name' => $name ?? $category->name,
            'description' => $description ?? $category->description,
        ]);

        return $category;
    }
}
