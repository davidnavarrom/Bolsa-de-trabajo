<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PivotJobOffersCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('categories_job');

        Schema::create('categories_job', function (Blueprint $table) {
            $table->BigInteger('job_offers_id')->unsigned();
            $table->BigInteger('employment_categories_id')->unsigned();

            $table->foreign('job_offers_id')->references('id')->on('job_offers');
            $table->foreign('employment_categories_id')->references('id')->on('employment_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_job');

    }
}
