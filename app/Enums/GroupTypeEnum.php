<?php
/*
 * Eurofurence Identity Provider Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/ef-idp
 */

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