<?php

namespace App\DTOs;

use App\Attributes\HasEmptyPlaceholders;
use App\DTOs\DTO;
use Illuminate\Support\Carbon;

#[HasEmptyPlaceholders]
class UserCreateDTO extends DTO
{
    public ?string $name;

    public ?string $phone;

    public ?string $email;

    public ?int $grad;

    public ?int $fasl;

    public ?int $role_id;

    public ?string $motherName;

    public ?string $motherPhone;

    public ?string $fatherName;

    public ?string $fatherPhone;

    public ?string $address;


    public function __construct(
        string $name = parent::STRING,
        string $phone = parent::STRING,
        string $email = parent::STRING,
        int $grad = parent::INT,
        int $fasl = parent::INT,
        int $role_id = parent::INT,
        string $motherName = parent::STRING,
        string $motherPhone = parent::STRING,
        string $fatherName = parent::STRING,
        string $fatherPhone = parent::STRING,
        string $address = parent::STRING,

    ) {
        parent::__construct(compact(...$this->getParameterList()));
    }
}
