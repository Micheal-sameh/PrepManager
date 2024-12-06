<?php

namespace App\Enums;

use Illuminate\Support\Facades\App;

class Grads
{
    public const PREPARATORY_ONE = 1;

    public const PREPARATORY_TWO = 2;

    public const PREPARATORY_THREE = 3;

    public static function all()
    {
        App::isLocale('ar') ?
            $grad = [
                [
                    "name" => 'اولى اعدادي',
                    "value" => self::PREPARATORY_ONE,
                ],
                [
                    "name" => 'ثانيه اعدادي',
                    "value" => self::PREPARATORY_TWO,
                ],
                [
                    "name" => 'ثالثه اعدادي',
                    "value" => self::PREPARATORY_THREE,
                ],
            ]
            :
            $grad = [
                [
                    "name" => 'prep 1',
                    "value" => self::PREPARATORY_ONE,
                ],
                [
                    "name" => 'prep 2',
                    "value" => self::PREPARATORY_TWO,
                ],
                [
                    "name" => 'prep 3',
                    "value" => self::PREPARATORY_THREE,
                ],
            ];
        return $grad;
    }

    public static function getStringValue($value): string
    {
        switch ($value) {
            case self::PREPARATORY_ONE:
                return 'Prep 1';
            case self::PREPARATORY_TWO:
                return 'Prep 2';
            case self::PREPARATORY_THREE:
                return 'Prep 3';
            }
    }
}
