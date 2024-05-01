<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyServiceItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_service_items', function (Blueprint $table) {
            $table->id();
            $table->integer('property_service_id');
            $table->string('property_service_item_name');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('property_service_items');
    }
}
