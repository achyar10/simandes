<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizens', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('fullname');
            $table->string('password');
            $table->enum('gender', ['LAKI-LAKI', 'PEREMPUAN']);
            $table->string('pob');
            $table->date('dob');
            $table->text('address');
            $table->string('relationship');
            $table->enum('religion', ['ISLAM', 'KRISTEN', 'KATHOLIK', 'HINDU', 'BUDHA', 'KHONGHUCU']);
            $table->string('blood_type')->nullable();
            $table->enum('status_married', ['BELUM KAWIN', 'KAWIN', 'JANDA/DUDA']);
            $table->timestamps();
        });

        Schema::table('citizens', function (Blueprint $table) {
            $table->foreignId('education_id')
                ->nullable()
                ->constrained('education')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('work_id')
                ->nullable()
                ->constrained('works')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('rt_id')
                ->nullable()
                ->constrained('master_rts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('family_id')
                ->nullable()
                ->constrained('family_cards')
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
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropForeign(['education_id']);
            $table->dropForeign(['work_id']);
            $table->dropForeign(['rt_id']);
            $table->dropForeign(['family_id']);
            $table->dropColumn(['education_id', 'work_id', 'rt_id', 'family_id']);
        });
        Schema::dropIfExists('citizens');
    }
}
