<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FaslCreateRequest;
use App\Http\Requests\FaslUpdateRequest;
use App\Http\Resources\FaslResource;
use App\Models\Fasl;
use App\Services\FaslService;
use App\Traits\HttpResponses;

class FaslController extends Controller
{
    use HttpResponses;
    public function __construct(protected FaslService $faslService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fasls = $this->faslService->index();

        return $this->success(FaslResource::collection($fasls)) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaslCreateRequest $request)
    {
        $fasl = $this->faslService->store(...$request->only(
            'name', 'grad'
        ));

        return $this->success(new FaslResource($fasl)) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Fasl $fasl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fasl $fasl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaslUpdateRequest $request, Fasl $id)
    {
        $fasl = $this->faslService->update($id, ...$request->only(
            'name', 'grad'
        ));

        return $this->success(new FaslResource($fasl)) ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fasl $fasl)
    {
        //
    }
}
