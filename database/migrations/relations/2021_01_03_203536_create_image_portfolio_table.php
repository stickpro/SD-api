<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagePortfolioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_portfolio', function (Blueprint $table) {
            $table->unsignedBigInteger('image_id');
            $table->unsignedBigInteger('portfolio_id');
            $table->primary(['image_id', 'portfolio_id']);
            $table->foreign('image_id')
                ->references('id')->on('images')
                ->onUpdate('cascade');
            $table->foreign('portfolio_id')
                ->references('id')->on('portfolios')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image_portfolio');
    }
}
