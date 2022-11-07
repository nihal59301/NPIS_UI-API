<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('jenis_pengguna_id')->constrained('ref_jenis_pengguna');
            $table->foreignId('agensi_id')->constrained('ref_agensi');
            $table->foreignId('jawatan_id')->constrained('ref_jawatan');
            $table->foreignId('jabatan_id')->constrained('ref_jabatan');
            $table->foreignId('negeri_id')->constrained('ref_negeri');
            $table->foreignId('gred_jawatan_id')->constrained('ref_gred_jawatan');
            $table->foreignId('bahagian_id')->constrained('ref_bahagian');
            $table->foreignId('daerah_id')->constrained('ref_daerah');            
            $table->string('no_ic');
            $table->boolean('status_pengguna_id');
            $table->boolean('first_time');
            $table->string('gambar_profil');
            $table->integer('dibuat_oleh')->nullable();
            $table->dateTime('dibuat_pada')->nullable();
            $table->integer('dikemaskini_oleh')->nullable();
            $table->dateTime('dikemaskini_pada')->nullable();
            $table->boolean('row_status')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('temp_users');
    }
};
