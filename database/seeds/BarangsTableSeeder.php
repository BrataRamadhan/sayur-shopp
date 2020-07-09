<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class BarangsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
            DB::table('barangs')->insert([
                'nama_barang' => $faker->text($maxNbChars = 20),
                // 'gambar' => $faker->imageUrl($width = 320, $height = 240, 'cats'),
                'gambar' => 'guarnatee.png',
                'harga' => $faker->numberBetween(10000,100000),
                'stok' => $faker->numberBetween(5,50),
                'keterangan' => $faker->text($maxNbChars = 130)  
            ]);
        }
    }
}
