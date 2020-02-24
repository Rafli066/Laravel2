<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;
use Illuminate\Support\Facades\DB;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        //MEMBUAT DATA DOSEN
        $dosen = Dosen::create([
            'nama' => 'Gunawan',
            'nipd' => '128461498'
        ]);
        $this->command->info('Data Dosen Berhasil Dibuat');

        //MEMBUAT DATA MAHASISWA
        $kipli = Mahasiswa::create([
            'nama' => 'Kiplii',
            'nim' => '130103',
            'id_dosen' => $dosen->id
        ]);
        $dobleh = Mahasiswa::create([
            'nama' => 'Dobleh',
            'nim' => '091265',
            'id_dosen' => $dosen->id
        ]);
        $soleh = Mahasiswa::create([
            'nama' => 'Soleh',
            'nim' => '102938',
            'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil Dibuat');

        //MEMBUAT DATA WALI
        $bancet = Wali::create([
            'nama' => 'Bancet',
            'id_mahasiswa' => $kipli->id
        ]);
        $koswara = Wali::create([
            'nama' => 'Koswara',
            'id_mahasiswa' => $dobleh->id
        ]);
        $jajang = Wali::create([
            'nama' => 'Jajang',
            'id_mahasiswa' => $soleh->id
        ]);

        //MEMBUAT DATA HOBI
        $nguseup = Hobi::create([
            'hobi' => 'Nguseup Rezeki'
        ]);
        $shopping = Hobi::create([
            'hobi' => 'Belanja di Indomart'
        ]);
        $ngaji = Hobi::create([
            'hobi' => 'Ngaji Peuting'
        ]);

        $kipli->hobi()->attach($nguseup->id);
        $dobleh->hobi()->attach($shopping->id);
        $soleh->hobi()->attach($ngaji->id);
    }
}
