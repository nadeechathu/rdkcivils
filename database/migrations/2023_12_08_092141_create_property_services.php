<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyServices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_services', function (Blueprint $table) {
            $table->id();
            $table->string('property_service_name');
            $table->string('description')->nullable();
            $table->integer('allow_comments')->default(0)->comment('0=>no, 1=>yes');
            $table->integer('is_active')->default(1)->comment('0=> Inactive, 1=>Active');
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
        Schema::dropIfExists('property_services');
    }
}
