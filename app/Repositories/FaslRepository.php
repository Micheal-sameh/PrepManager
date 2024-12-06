<?php


namespace App\Repositories;

use App\Models\Fasl;
use Illuminate\Support\Facades\Auth;

class FaslRepository
{
    public function __construct(protected Fasl $model)
    {

    }

    public function index()
    {
        $fasls = $this->model->all();

        return $fasls;
    }

    public function store($name, $grad)
    {
        $fasl = $this->model->create([
            'name' => $name,
            'grad' => $grad,
            'created_by' => Auth::id(),
        ]);

        return $fasl;
    }


    public function update(Fasl $id, $name = null, $grad = null)
    {
        $fasl = $this->model->find($id);
        $fasl->update([
            'name' => $name ?? $fasl->name,
            'grad' => $grad ?? $fasl->grad,
        ]);

        return $fasl;
    }
}
