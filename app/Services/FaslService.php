<?php


namespace App\Services;

use App\Models\Fasl;
use App\Repositories\FaslRepository;

class FaslService
{
    public function __construct(protected FaslRepository $faslRepository)
    {

    }
    public function index()
    {
        $fasls = $this->faslRepository->index();
        $fasls->load('members', 'create');

        return $fasls;
    }

    public function store($name, $grad)
    {
        $fasl = $this->faslRepository->store($name, $grad);
        $fasl->load('creat');

        return $fasl;
    }

    public function update(Fasl $id, $name = null, $grad = null)
    {
        $fasl = $this->faslRepository->update($id, $name, $grad);

        return $fasl;
    }
}
