<?php


namespace App\Repositories;

use App\Models\Event;
use App\Models\EventCategory;
use App\Models\EventMember;
use Illuminate\Support\Facades\Auth;

class EventMembersRepository
{
    public function __construct(protected EventMember $model)
    {

    }

    public function index()
    {
        $events = $this->model->latest()->get();

        return $events;
    }

    public function store($input)
    {
        $eventMember = $this->model->where('event_id', $input->event_id)->where('user_id', $input->user_id)->first();
        $eventMember = ($eventMember)
        ? $eventMember->update([
            'points' => $input->points + $eventMember->points,
            'bonus' => $input->bonus + $eventMember->bonus,
        ])
        : $this->model->create([
            'event_id' => $input->event_id,
            'user_id' => $input->user_id,
            'created_by' => auth()->user()->id,
            'points' => $input->points,
            'bonus' => $input->bonus,
        ]);

        return $eventMember;
    }
}
