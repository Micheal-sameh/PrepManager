<?php


namespace App\Services;

use App\Models\EventCategory;
use App\Models\FaslMember;
use App\Repositories\EventCategoryRepository;

class EventCategoryService
{
    public function __construct(protected EventCategoryRepository $eventCategoryRepository)
    {

    }
    public function index()
    {
        $categories = $this->eventCategoryRepository->index();
        $categories->load('createdBy');

        return $categories;
    }

    public function store($name, $description)
    {
        $member = $this->eventCategoryRepository->store($name, $description);
        $member->load('createdBy');

        return $member;
    }

    public function update(EventCategory $category, $name = null, $description = null)
    {
        $category = $this->eventCategoryRepository->update($category, $name, $description);

        return $category;
    }
}
