<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_parts', function (Blueprint $table) {
            $table->id();
            $table->string('part_name');
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
        Schema::dropIfExists('property_parts');
    }
}
