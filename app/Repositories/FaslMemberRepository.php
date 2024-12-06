<?php


namespace App\Repositories;

use App\Models\FaslMember;
use Illuminate\Support\Facades\Auth;

class FaslMemberRepository
{
    public function __construct(protected FaslMember $model)
    {

    }

    public function index()
    {
        $members = $this->model->all();

        return $members;
    }

    public function store($fasl_id, $user_id, $type)
    {
        $fasl = $this->model->create([
            'fasl_id' => $fasl_id,
            'user_id' => $user_id,
            'type' => $type,
        ]);

        return $fasl;
    }


    public function update(FaslMember $member, $fasl_id, $type)
    {
        $member->update([
            'fasl_id' => $fasl_id ?? $member->fasl_id,
            'type' => $type ?? $member->type,
        ]);

        return $member;
    }
}
