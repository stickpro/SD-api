<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->json('slug');
            $table->unsignedBigInteger('filter_id')
                ->nullable();
            $table->unsignedBigInteger('mockup_id')
                ->nullable();
            $table->unsignedBigInteger('image_id')
                ->nullable();
            $table->json('seo_title')
                ->nullable();
            $table->json('seo_description')
                ->nullable();
            $table->json('seo_keywords')
                ->nullable();
            $table->json('title');
            $table->json('description');
            $table->string('external_link');
            $table->boolean('show_home');
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
        Schema::dropIfExists('portfolios');
    }
}
