<?php


namespace App\Services;

use App\Models\FaslMember;
use App\Repositories\FaslMemberRepository;

class FaslMemberService
{
    public function __construct(protected FaslMemberRepository $faslMemberRepository)
    {

    }
    public function index()
    {
        $members = $this->faslMemberRepository->index();
        $members->load('user');

        return $members;
    }

    public function store($fasl_id, $user_id, $type)
    {
        $member = $this->faslMemberRepository->store($fasl_id, $user_id, $type);
        $member->load('user');

        return $member;
    }

    public function update(FaslMember $id, $fasl_id = null, $type = null)
    {
        $fasl = $this->faslMemberRepository->update($id, $fasl_id, $type);

        return $fasl;
    }
}
