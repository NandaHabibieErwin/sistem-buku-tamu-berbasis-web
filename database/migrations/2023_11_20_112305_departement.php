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
        Schema::create('departement', function (Blueprint $table) {
            $table->id('id_departement');
            $table->string('nama_departement');
            $table->string('desc_departement');
            $table->foreignId('id')->constrained();
        });

        DB::table('departement')->insert([
            ['nama_departement' => 'Bidang Kesehatan Masyarakat Veteriner', 'desc_departement' => ''],
            ['nama_departement' => 'Bidang Produksi Peternakan', 'desc_departement' => ''],
            ['nama_departement' => 'Bidang Agribisnis Peternakan', 'desc_departement' => 'Kepala Bidang Agribisnis Peternakan mempunyai tugas melakukan koordinasi, fasilitasi dan evaluasi pada Seksi Sumber Daya dan Kelembagaan Peternakan, Seksi Pengembangan Kawasan Peternakan, dan Seksi Pengolahan, Pemasaran dan Pengembangan Usaha Peternakan.'],
            ['nama_departement' => 'Bidang Keuangan', 'desc_departement' => ''],
            ['nama_departement' => 'Bidang Kepegawaian Umum', 'desc_departement' => ''],
            ['nama_departement' => 'Bidang Kesehatan Hewan', 'desc_departement' => 'Kepala Bidang Kesehatan Hewan mempunyai tugas melakukan koordinasi, fasilitasi dan evaluasi pada Seksi Pengamatan Penyakit Hewan, Seksi Pencegahan dan Pemberantasan Penyakit Hewan serta Seksi Kelembagaan, Sumber Daya Kesehatan Hewan dan Pengawasan Obat Hewan.'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
