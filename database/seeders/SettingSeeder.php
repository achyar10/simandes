<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->truncate();
        DB::table('settings')->insert([
            'name' => 'Waringin Jaya',
            'email' => 'info@waringinjaya.id',
            'phone' => '0251123456',
            'pic' => 'Rohmat, SE',
            'address' => 'Kp. Waringin Jaya',
            'village' => 'Desa Waringin Jaya',
            'sub_district' => 'Bojonggede',
            'city' => 'Kab. Bogor',
            'province' => 'Jawa Barat',
            'zip' => '16925',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s"),
        ]);
    }
}
