<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostCategoryTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_category_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_category_id');

            $table->string('title');
            $table->string('locale');
            $table->string('slug');

            $table->addSeo();

            $table->unique(['locale', 'post_category_id']);
            $table->unique(['locale', 'slug']);
            $table->foreign('post_category_id')
                ->references('id')
                ->on('post_categories')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_category_translations');
    }
}
