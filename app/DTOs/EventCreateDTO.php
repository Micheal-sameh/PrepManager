<?php

namespace App\DTOs;

use App\Attributes\HasEmptyPlaceholders;
use App\DTOs\DTO;
use Illuminate\Support\Carbon;

#[HasEmptyPlaceholders]
class EventCreateDTO extends DTO
{
    public ?string $name;

    public ?string $description;

    public ?string $goal;

    public ?string $location;

    public ?int $bonus_1;

    public ?int $bonus_2;

    public ?int $bonus_3;

    public function __construct(
        string $name = parent::STRING,
        string $description = parent::STRING,
        string $goal = parent::STRING,
        string $location = parent::STRING,
        int $bonus_1 = parent::INT,
        int $bonus_2 = parent::INT,
        int $bonus_3 = parent::INT,

    ) {
        parent::__construct(compact(...$this->getParameterList()));
    }
}
