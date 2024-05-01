<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatedDateColumnToProjectDocumentHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('project_document_histories', function (Blueprint $table) {
            $table->dateTime('created_date')->nullable()->after('document_src');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('project_document_histories', function (Blueprint $table) {
            $table->dropColumn('created_date');
        });
    }
}
