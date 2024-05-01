<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnsOfQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotations', function (Blueprint $table) {
            $table->dropColumn('extend_part_id');
            $table->dropColumn('extend_sub_part_id');
            $table->dropColumn('other_service');
            $table->dropColumn('professionals');
            $table->string('reference_id')->nullable()->change();
        });                                                              
    } 
 
     /** 
     * Reverse the migrations.
     *
      * @return void
     */                                                              
    public function down()
    {
              
        Schema::table('quotations', function (Blueprint $table) {
            $table->integer('extend_sub_part_id')->after('design_id');    
            $table->integer('extend_part_id')->after('design_id');  
            $table->string('professionals')->after('design_process_start');  
            $table->string('other_service')->after('design_process_start'); 
            $table->string('reference_id')->nullable(false)->change(); 
        });      
    }
}
 