<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $translate = config()->get('language.list');

        if (empty($translate)) {
            throw new \Exception('Error: config/language.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        $language = config()->get('app.locale');

        if (empty($language)) {
            throw new \Exception('Error: config/app.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::create('users', function (Blueprint $table) use ($translate, $language) {
            $table->id();
            $table->string('username')->unique();
            $table->string('name');
            $table->string('phone')->unique();
            $table->enum('language', $translate)->default($language);
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
};
