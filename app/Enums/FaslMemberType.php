<?php

namespace App\Enums;

use Illuminate\Support\Facades\App;

class FaslMemberType
{
    public const LEADER = 1;
    public const SERVANT = 2;
    public const STUDENT = 3;

    /**
     * Get all types based on the current locale.
     *
     * @return array
     */
    public static function all()
    {
        $types = [
            self::LEADER => [
                'ar' => 'مسؤول الفصل',
                'en' => 'leader',
            ],
            self::SERVANT => [
                'ar' => 'خادم',
                'en' => 'servant',
            ],
            self::STUDENT => [
                'ar' => 'مخدوم',
                'en' => 'student',
            ],
        ];

        // Return localized types based on current locale
        $locale = App::getLocale(); // Gets the current locale
        return array_map(fn($type) => $type[$locale] ?? $type['en'], $types);
    }

    /**
     * Get the string value for a specific type.
     *
     * @param int $value
     * @return string
     */
    public static function getStringValue($value): string
    {
        switch ($value) {
            case self::LEADER:
                return App::isLocale('ar') ? 'مسؤول الفصل' : 'leader';
            case self::SERVANT:
                return App::isLocale('ar') ? 'خادم' : 'servant';
            case self::STUDENT:
                return App::isLocale('ar') ? 'مخدوم' : 'student';
            default:
                return '';
        }
    }

    /**
     * Get all values as an array of integers (to use in validation).
     *
     * @return array
     */
    public static function values()
    {
        return [
            self::LEADER,
            self::SERVANT,
            self::STUDENT,
        ];
    }
}
