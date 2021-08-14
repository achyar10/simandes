<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterRtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_rts', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->string('pic');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('password');
            $table->timestamps();

        });

        Schema::table('master_rts', function (Blueprint $table) {
            $table->foreignId('rw_id')
            ->constrained('master_rws')
            ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('master_rts', function (Blueprint $table) {
            $table->dropForeign(['rw_id']);
            $table->dropColumn('rw_id');
        });
        Schema::dropIfExists('master_rts');
    }
}
