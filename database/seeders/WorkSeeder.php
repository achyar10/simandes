<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('works')->truncate();
        $data = [
            'Ahli Pengobatan Alternatif',
            'Anggota kabinet kementrian',
            'Anggota mahkamah konstitusi',
            'Arsitektur/Desainer',
            'Biarawati',
            'Bupati/walikota',
            'Buruh jasa perdagangan hasil bumi',
            'Buruh Tani',
            'Buruh usaha jasa hiburan dan pariwisata',
            'Buruh usaha jasa transportasi dan perhubungan',
            'Dosen swasta',
            'Dukun/paranormal/supranatural',
            'Gubernur',
            'Ibu Rumah Tangga',
            'Jasa pengobatan alternatif',
            'Juru Masak',
            'Karyawan Perusahaan Pemerintah',
            'Kepala Daerah',
            'Kontraktor',
            'Nelayan',
            'Pedagang barang kelontong',
            'Pegawai Negeri Sipil',
            'Pelaut',
            'Pemilik perusahaan',
            'Pemilik usaha informasi dan komunikasi',
            'Pemilik usaha jasa transportasi dan perhubungan',
            'Pemuka Agama',
            'Penambang',
            'Pengacara',
            'Pengrajin industri rumah tangga lainnya',
            'Pengusaha perdagangan hasil bumi',
            'Perangkat Desa',
            'Petani',
            'Pialang',
            'POLRI',
            'Pskiater/Psikolog',
            'Satpam/Security',
            'Sopir',
            'TNI',
            'Tukang Batu',
            'Tukang Cukur',
            'Tukang Jahit',
            'Tukang Kue',
            'Tukang Listrik',
            'Tukang Sumur',
            'Wakil bupati',
            'Wakil presiden',
            'Wiraswasta',
            'Akuntan',
            'Anggota Legislatif',
            'Apoteker',
            'Belum Bekerja',
            'Bidan swasta',
            'Buruh Harian Lepas',
            'Buruh Migran',
            'Buruh usaha hotel dan penginapan lainnya',
            'Buruh usaha jasa informasi dan komunikasi',
            'Dokter swasta',
            'Dukun Tradisional',
            'Duta besar',
            'Guru swasta',
            'Jasa Konsultansi Manajemen dan Teknis',
            'Jasa penyewaan peralatan pesta',
            'Karyawan Honorer',
            'Karyawan Perusahaan Swasta',
            'Konsultan Manajemen dan Teknis',
            'Montir',
            'Notaris',
            'Pedagang Keliling',
            'Pelajar',
            'Pembantu rumah tangga',
            'Pemilik usaha hotel dan penginapan lainnya',
            'Pemilik usaha jasa hiburan dan pariwisata',
            'Pemilik usaha warung, rumah makan dan restoran',
            'Pemulung',
            'Peneliti',
            'Pengrajin',
            'Pengusaha kecil, menengah dan besar',
            'Penyiar radio',
            'Perawat swasta',
            'Peternak',
            'Pilot',
            'Presiden',
            'Purnawirawan/Pensiunan',
            'Seniman/artis',
            'Tidak Mempunyai Pekerjaan Tetap',
            'Tukang Anyaman',
            'Tukang Cuci',
            'Tukang Gigi',
            'Tukang Kayu',
            'Tukang Las',
            'Tukang Rias',
            'Usaha jasa pengerah tenaga kerja',
            'Wakil Gubernur',
            'Wartawan',
            'Pegawai BUMN'
        ];
        $arr = [];
        foreach ($data as $key) {
            array_push($arr, [
                'name' => $key,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        DB::table('works')->insert($arr);
    }
}
