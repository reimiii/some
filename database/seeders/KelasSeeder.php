<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class KelasSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $kelas = [
            [
                'guru_id'      => 1,
                'nama_kelas'   => 'XI RPL 1',
                'kode_kelas'   => Str::random(10),
                'jumlah_siswa' => '10',
                'keterangan'   => '',

            ],
            [
                'guru_id'      => 2,
                'nama_kelas'   => 'XI RPL 2',
                'kode_kelas'   => Str::random(10),
                'jumlah_siswa' => '11',
                'keterangan'   => '',

            ],
            [
                'guru_id'      => 3,
                'nama_kelas'   => 'XI RPL 3',
                'kode_kelas'   => Str::random(10),
                'jumlah_siswa' => '12',
                'keterangan'   => '',

            ],
            [
                'guru_id'      => 4,
                'nama_kelas'   => 'XI RPL 4',
                'kode_kelas'   => Str::random(10),
                'jumlah_siswa' => '14',
                'keterangan'   => '',

            ],
            [
                'guru_id'      => 5,
                'nama_kelas'   => 'XI RPL 5',
                'kode_kelas'   => Str::random(10),
                'jumlah_siswa' => '10',
                'keterangan'   => '',

            ],
        ];

        $mapels = [
            [
                'guru_id'    => 1,
                'nama_mapel' => 'Pemrograman',
            ],
            [
                'guru_id'    => 2,
                'nama_mapel' => 'Pemrograman',
            ],
            [
                'guru_id'    => 3,
                'nama_mapel' => 'Pemrograman',
            ],
            [
                'guru_id'    => 4,
                'nama_mapel' => 'Pemrograman',
            ],
            [
                'guru_id'    => 5,
                'nama_mapel' => 'Pemrograman',
            ],
        ];

        $connect = [
            [
                'guru_id'   => 1,
                'instagram' => 'https://www.instagram.com/',
                'facebook'  => 'https://www.facebook.com/',
                'twitter'   => 'https://www.twitter.com/',
            ],
            [
                'guru_id'   => 2,
                'instagram' => 'https://www.instagram.com/',
                'facebook'  => 'https://www.facebook.com/',
                'twitter'   => 'https://www.twitter.com/',
            ],
            [
                'guru_id'   => 3,
                'instagram' => 'https://www.instagram.com/',
                'facebook'  => 'https://www.facebook.com/',
                'twitter'   => 'https://www.twitter.com/',
            ],
            [
                'guru_id'   => 4,
                'instagram' => 'https://www.instagram.com/',
                'facebook'  => 'https://www.facebook.com/',
                'twitter'   => 'https://www.twitter.com/',
            ],
            [
                'guru_id'   => 5,
                'instagram' => 'https://www.instagram.com/',
                'facebook'  => 'https://www.facebook.com/',
                'twitter'   => 'https://www.twitter.com/',
            ],
        ];

        $dsc_guru = [
            [
                'guru_id'    => 1,
                'phone'      => '081234567890',
                'education'  => 'S1 Teknik Informatika',
                'experience' => '5 tahun',
                'serials'    => Str::uuid(),
            ],
            [
                'guru_id'    => 2,
                'phone'      => '081234567890',
                'education'  => 'S2 Teknik Informatika',
                'experience' => '3 tahun',
                'serials'    => Str::uuid(),
            ],
            [
                'guru_id'    => 3,
                'phone'      => '081234567890',
                'education'  => 'S1 Teknik Sistem Informasi',
                'experience' => '1 tahun',
                'serials'    => Str::uuid(),
            ],
            [
                'guru_id'    => 4,
                'phone'      => '081234567890',
                'education'  => 'S2 Teknik Informatika',
                'experience' => '6 tahun',
                'serials'    => Str::uuid(),
            ],
            [
                'guru_id'    => 5,
                'phone'      => '081234567890',
                'education'  => 'S2 Teknik Informatika',
                'experience' => '10 tahun',
                'serials'    => Str::uuid(),
            ],
        ];


        DB::table('desc_gurus')->insert($dsc_guru);
        DB::table('conntects')->insert($connect);
        DB::table('mapels')->insert($mapels);
        DB::table('kelas')->insert($kelas);

    }

}
