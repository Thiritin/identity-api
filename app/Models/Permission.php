<?php
/*
 * Eurofurence Identity Provider Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/ef-idp
 */

namespace App\Models;


use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Jamesh\Uuid\HasUuid;

class Permission extends \Spatie\Permission\Models\Permission
{
    use HasUuid, CrudTrait;
}