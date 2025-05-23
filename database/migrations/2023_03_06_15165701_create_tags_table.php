<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use JamstackVietnam\Tag\Models\Tag;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();

            $table->string('text_color')->nullable();
            $table->string('background_color')->nullable();
            $table->text('icon')->nullable();
            $table->integer('position')->nullable();

            $table->string('status', 30)->default(Tag::STATUS_ACTIVE);
            $table->string('type', 30)->nullable();
            $table->integer('view_count')->default(0);
            $table->addInjectCode();
            $table->addTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
