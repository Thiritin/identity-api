<?php

namespace App\Enums;

/**
 * @method static self none()
 * @method static self department()
 */
class GroupTypeEnum extends \Spatie\Enum\Laravel\Enum
{
    protected static function values(): array
    {
        return [
            'none' => null,
            'department' => 'department',
        ];
    }
    protected static function labels(): array
    {
        return [
            'none' => __('none'),
            'department' => __('department'),
        ];
    }
}