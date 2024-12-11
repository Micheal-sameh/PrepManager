<?php

namespace App\DTOs;

use App\Attributes\HasEmptyPlaceholders;
use App\DTOs\DTO;
use Illuminate\Support\Carbon;

#[HasEmptyPlaceholders]
class EventCreateDTO extends DTO
{
    public ?string $name;

    public ?int $event_category;

    public ?string $description;

    public ?string $goal;

    public ?string $location;

    public ?int $points_1;

    public ?int $points_2;

    public ?int $points_3;

    public function __construct(
        string $name = parent::STRING,
        string $event_category = parent::INT,
        string $description = parent::STRING,
        string $goal = parent::STRING,
        string $location = parent::STRING,
        int $points_1 = parent::INT,
        int $points_2 = parent::INT,
        int $points_3 = parent::INT,

    ) {
        parent::__construct(compact(...$this->getParameterList()));
    }
}
