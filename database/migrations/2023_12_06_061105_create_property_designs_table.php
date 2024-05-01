<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyDesignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_designs', function (Blueprint $table) {
            $table->id();
            $table->string('design_name');
            $table->string('icon_1');
            $table->string('icon_2');
            $table->string('image');
            $table->string('description')->nullable();
            $table->integer('is_active')->default(1)->comment('0 => deactive , 1=> active');
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
        Schema::dropIfExists('property_designs');
    }
}
