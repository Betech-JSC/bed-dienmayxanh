<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JamstackVietnam\Agency\Models\Agency;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->id();
            $table->string('status', 30)->default(Agency::STATUS_ACTIVE);
            $table->string('region')->nullable();
            $table->float('longitude', 13, 10)->nullable();
            $table->float('latitude', 13, 10)->nullable();
            $table->string('link_google_map')->nullable();
            $table->boolean('is_headquarter')->nullable()->default(0);
            $table->boolean('is_featured')->nullable()->default(0);
            $table->integer('position')->nullable();
            $table->json('image')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('agencies');
    }
}
