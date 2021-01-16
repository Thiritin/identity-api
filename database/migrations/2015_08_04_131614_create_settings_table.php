<?php
/*
 * Eurofurence Identity Provider Authentication Backend
 *
 * @copyright	Copyright (c) 2021 Martin Becker (https://martin-becker.ovh)
 * @license		GNU AGPLv3 (GNU Affero General Public License v3.0)
 * @link		https://github.com/Thiritin/ef-idp
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('name');
            $table->string('description')->nullable();
            $table->text('value')->nullable();
            $table->text('field');
            $table->tinyInteger('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
