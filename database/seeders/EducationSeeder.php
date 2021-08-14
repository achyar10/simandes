<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('education')->truncate();
        $data = [
            'TIDAK / BELUM SEKOLAH',
            'BELUM TAMAT SD / SEDERAJAT',
            'TAMAT SD / SEDERAJAT',
            'SLTP / SEDERAJAT',
            'SLTA / SEDERAJAT',
            'DIPLOMA I / II',
            'AKADEMI / DIPLOMA III / S.MUDA',
            'DIPLOMA IV / STRATA I',
            'STRATA II',
            'STRATA III'
        ];
        $arr = [];
        foreach ($data as $key) {
            array_push($arr, [
                'name' => $key,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        DB::table('education')->insert($arr);
    }
}
