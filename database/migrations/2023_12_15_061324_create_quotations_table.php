<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id');
            $table->integer("design_id");
            $table->integer('extend_part_id');
            $table->integer('extend_sub_part_id');
            $table->string('bed_rooms');
            $table->string('design_process_start');
            $table->string('other_service');
            $table->string('professionals')->nullable();
            $table->string('expecting_service')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('address')->nullable();
            $table->string('post_code')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('message')->nullable();
            $table->string('hear_about_us')->nullable();
            $table->integer('keep_me_update')->comments(' 0 => No , 1 => Yes')->default(0)->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
