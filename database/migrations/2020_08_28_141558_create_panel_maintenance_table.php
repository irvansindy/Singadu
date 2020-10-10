<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanelMaintenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panel_maintenance', function (Blueprint $table) {
            $table->id();
            $table->string('id_maintenance');
            $table->string('id_client');
            $table->string('id_pic');
            $table->string('title');
            $table->string('id_type');
            $table->string('description');
            $table->string('description_from_teknisi');
            $table->string('status');
            $table->string('file1');
            $table->string('file2');
            $table->string('file3');
            $table->date('tanggal_pengajuan');
            $table->date('tanggal_selesai');
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
        Schema::dropIfExists('panel_maintenance');
    }
}
