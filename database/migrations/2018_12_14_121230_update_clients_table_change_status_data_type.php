<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//NASAYOP KO
class UpdateClientsTableChangeStatusDataType extends Migration
// LOL THIS IS SUPPOSED TO BE RENAMING OF STATUS COLUMN NOT CHANGING OF DATA TYPE
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('status', 'is_deleted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->renameColumn('is_deleted', 'status');
        });
    }
}
