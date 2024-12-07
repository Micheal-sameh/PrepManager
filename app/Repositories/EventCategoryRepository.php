<?php


namespace App\Repositories;

use App\Models\EventCategory;
use App\Models\FaslMember;
use Illuminate\Support\Facades\Auth;

class EventCategoryRepository
{
    public function __construct(protected EventCategory $model)
    {

    }

    public function index()
    {
        $categories = $this->model->latest()->get();

        return $categories;
    }

    public function store($name, $description)
    {
        $category = $this->model->create([
            'name' => $name,
            'description' => $description,
            'created_by' => Auth::id(),
        ]);

        return $category;
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
