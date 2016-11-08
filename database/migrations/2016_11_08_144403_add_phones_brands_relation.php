<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPhonesBrandsRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('phones', function ($table) {
	 $table->dropColumn('brand');
	 $table->integer('brand_id')->unsigned()->index();

         $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::table('areas', function (Blueprint $table) {
	    $table->dropForeign('brand_id_foreign');
	    $table->dropColumn('brand_id');
	    $table->string('brand');
	});
    }
}
