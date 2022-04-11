<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $data = [
            [
                "mahasiswa_id" => "2041720132",
                "matakuliah_id" => "1",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720132",
                "matakuliah_id" => "2",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720132",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720132",
                "matakuliah_id" => "4",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "1941720133",
                "matakuliah_id" => "1",
                "nilai" => "A"
            ],
            [
                "mahasiswa_id" => "1941720133",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "1941720133",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "1941720133",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2141720135",
                "matakuliah_id" => "1",
                "nilai" => "A"
            ],
            [
                "mahasiswa_id" => "2141720135",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2141720135",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2141720135",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720136",
                "matakuliah_id" => "1",
                "nilai" => "A"
            ],
            [
                "mahasiswa_id" => "2041720136",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720136",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720136",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720137",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2041720137",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720137",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720137",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720138",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2041720138",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720138",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720138",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720139",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2041720139",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720139",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720139",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720140",
                "matakuliah_id" => "1",
                "nilai" => "B"
            ],
            [
                "mahasiswa_id" => "2041720140",
                "matakuliah_id" => "2",
                "nilai" => "B"

            ],
            [
                "mahasiswa_id" => "2041720140",
                "matakuliah_id" => "3",
                "nilai" => "A"

            ],
            [
                "mahasiswa_id" => "2041720140",
                "matakuliah_id" => "4",
                "nilai" => "B"

            ],
        ];

        DB::table('mahasiswa_matakuliah')->insert($data);
    }

}