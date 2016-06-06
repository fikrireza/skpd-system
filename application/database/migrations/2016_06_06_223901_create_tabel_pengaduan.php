<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelPengaduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('pengaduan', function(Blueprint $table)
      {
        $table->increments('id');
        $table->string('judul_pengaduan');
        $table->string('isi_pengaduan');
        $table->string('warga_id');
        $table->string('topik_id');
        $table->string('skpd_id');
        // 1 = Aktif/Verifikasi/Mutasi/Tayang/Rahasia/Anonim; 0 = Tidak Semua
        // Aksi Dari SKPD
        $table->integer('flag_verifikasi')->default(0);
        $table->integer('flag_mutasi')->default(0);
        $table->integer('flag_tayang')->default(0);
        // Aksi Dari Warga
        $table->integer('flag_rahasia')->default(0);
        $table->integer('flag_anonim')->default(0);
        $table->timestamps();
      });

      Schema::table('pengaduan', function(Blueprint $table)
      {
        $table->foreign('warga_id')->references('id')->on('users')->onDelete('restrict')->onUpdate('restrict');
        $table->foreign('skpd_id')->references('id')->on('master_skpd')->onDelete('restrict')->onUpdate('restrict');
        $table->foreign('topik_id')->references('id')->on('topik_pengaduan')->onDelete('restrict')->onUpdate('restrict'); //Topik atau Kategori
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('pengaduan', function(Blueprint $table)
      {
        $table->dropForeign('pengaduan_warga_id_foreign');
        $table->dropForeign('pengaduan_topik_id_foreign');
        $table->dropForeign('pengaduan_skpd_id_foreign');
      });

      Schema::drop('pengaduan');
    }
}
