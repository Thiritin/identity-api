<?php
/*
 * Strive Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/strive
 */

/*
 * Strive Authentication Backend
 *
 * @copyright	Copyright (c) 2020 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/strive
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('permission.table_names');
        $columnNames = config('permission.column_names');

        if (empty($tableNames)) {
            throw new Exception(
                'Error: config/permission.php not loaded. Run [php artisan config:clear] and try again.'
            );
        }

        Schema::create(
            $tableNames['permissions'],
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('name');
                $table->string('guard_name');
                $table->timestamps();
            }
        );

        Schema::create(
            $tableNames['roles'],
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('name');
                $table->string('guard_name');
                $table->timestamps();
            }
        );

        Schema::create(
            $tableNames['model_has_permissions'],
            function (Blueprint $table) use ($tableNames, $columnNames) {
                $table->uuid('permission_id')->index();

                $table->string('model_type');
                $table->uuid($columnNames['model_morph_key'])->index();
                $table->index(
                    [$columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_model_id_model_type_index'
                );

                $table->foreign('permission_id')
                    ->references('id')
                    ->on($tableNames['permissions'])
                    ->onDelete('cascade');

                $table->primary(
                    ['permission_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_permissions_permission_model_type_primary'
                );
            }
        );

        Schema::create(
            $tableNames['model_has_roles'],
            function (Blueprint $table) use ($tableNames, $columnNames) {
                $table->uuid('role_id')->index();

                $table->string('model_type');
                $table->uuid($columnNames['model_morph_key'])->index();
                $table->index(
                    [$columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_model_id_model_type_index'
                );

                $table->foreign('role_id')
                    ->references('id')
                    ->on($tableNames['roles'])
                    ->onDelete('cascade');

                $table->primary(
                    ['role_id', $columnNames['model_morph_key'], 'model_type'],
                    'model_has_roles_role_model_type_primary'
                );
            }
        );

        Schema::create(
            $tableNames['role_has_permissions'],
            function (Blueprint $table) use ($tableNames) {
                $table->uuid('permission_id')->index();
                $table->uuid('role_id')->index();

                $table->foreign('permission_id')
                    ->references('id')
                    ->on($tableNames['permissions'])
                    ->onDelete('cascade');

                $table->foreign('role_id')
                    ->references('id')
                    ->on($tableNames['roles'])
                    ->onDelete('cascade');

                $table->primary(['permission_id', 'role_id'], 'role_has_permissions_permission_id_role_id_primary');
            }
        );

        app('cache')
            ->store(config('permission.cache.store') != 'default' ? config('permission.cache.store') : null)
            ->forget(config('permission.cache.key'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('permission.table_names');

        if (empty($tableNames)) {
            throw new Exception(
                'Error: config/permission.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.'
            );
        }

        Schema::drop($tableNames['role_has_permissions']);
        Schema::drop($tableNames['model_has_roles']);
        Schema::drop($tableNames['model_has_permissions']);
        Schema::drop($tableNames['roles']);
        Schema::drop($tableNames['permissions']);
    }
}
