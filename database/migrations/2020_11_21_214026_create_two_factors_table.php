<?php
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

class CreateTwoFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();

        Schema::create(
            'two_factors',
            function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->foreignUuid('user_id')->references('id')->on('users')->onDelete('cascade');
                $table->string('secret')->nullable()->unique();
                $table->string('type');
                $table->timestamps();
            }
        );

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('two_factors');
    }
}
