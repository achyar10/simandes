<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_cards', function (Blueprint $table) {
            $table->id();
            $table->string('number')->unique();
            $table->string('head_of_family');
            $table->text('address')->nullable();
            $table->string('zip')->nullable();
            $table->date('print_date');
            $table->timestamps();
        });

        Schema::table('family_cards', function (Blueprint $table) {
            $table->foreignId('rt_id')
                ->nullable()
                ->constrained('master_rts')
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
        Schema::table('family_cards', function (Blueprint $table) {
            $table->dropForeign(['rt_id']);
            $table->dropColumn(['rt_id']);
        });
        Schema::dropIfExists('family_cards');
    }
}
