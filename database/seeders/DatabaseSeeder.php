<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterKecamatan;
use App\Models\MasterKelurahan;
use App\Models\MasterCaleg;
use App\Models\MasterPartai;
use App\Models\DataLengkap;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'role' => 'Superadmin',
            'name' => 'Arif Laksonodhewo',
            'email' => 'arifldhewo234@gmail.com',
            'telp' => '087882552668',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'role' => 'Admin',
            'name' => 'Arif Laksonodhewo',
            'email' => 'arifldhewo@gmail.com',
            'telp' => '087882552669',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'role' => 'Member',
            'name' => 'Rohim Nur Islam',
            'email' => 'ghaunther@gmail.com',
            'telp' => '081111111111',
            'password' => bcrypt('password'),
        ]);

        User::factory(5)->create();
        DataLengkap::factory(1000)->create();

        //MASTER CALEG

        MasterCaleg::create(['name' => 'Gembong Warsono', 'partai_id' => '1']);
        MasterCaleg::create(['name' => 'Ochi', 'partai_id' => '1']);

        //END MASTER CALEG


        //MASTER KECAMATAN JAKARTA SELATAN

        MasterKecamatan::create(['name' => 'Pesanggrahan']);
        MasterKecamatan::create(['name' => 'Kebayoran Lama']);
        MasterKecamatan::create(['name' => 'Setiabudi']);
        MasterKecamatan::create(['name' => 'Pancoran']);
        MasterKecamatan::create(['name' => 'Jagakarsa']);
        MasterKecamatan::create(['name' => 'Pasar Minggu']);
        MasterKecamatan::create(['name' => 'Tebet']);
        MasterKecamatan::create(['name' => 'Mampang Prapatan']);
        MasterKecamatan::create(['name' => 'Cilandak']);
        MasterKecamatan::create(['name' => 'Kebayoran Baru']);

        //ENDMASTER KECAMATAN JAKARTA SELATAN

        //MASTER KELURAHAN PESANGGRAHAN

        MasterKelurahan::create(['name' => 'Petukangan Utara', 'kecamatan_id' => '1']);
        MasterKelurahan::create(['name' => 'Petukangan Selatan', 'kecamatan_id' => '1']);
        MasterKelurahan::create(['name' => 'Ulujami', 'kecamatan_id' => '1']);
        MasterKelurahan::create(['name' => 'Bintaro', 'kecamatan_id' => '1']);
        MasterKelurahan::create(['name' => 'Pesanggrahan', 'kecamatan_id' => '1']);

        //END MASTER KELURAHAN PESANGGRAHAN

        //MASTER KELURAHAN KEBAYORAN LAMA

        MasterKelurahan::create(['name' => 'Grogol Utara', 'kecamatan_id' => '2']);
        MasterKelurahan::create(['name' => 'Grogol Selatan', 'kecamatan_id' => '2']);
        MasterKelurahan::create(['name' => 'Cipulir', 'kecamatan_id' => '2']);
        MasterKelurahan::create(['name' => 'Kebayoran Lama Utara', 'kecamatan_id' => '2']);
        MasterKelurahan::create(['name' => 'Kebayoran Lama Selatan', 'kecamatan_id' => '2']);
        MasterKelurahan::create(['name' => 'Pondok Pinang', 'kecamatan_id' => '2']);

        //END MASTER KELURAHAN KEBAYORAN LAMA

        // MASTER KELURAHAN SETIABUDI

        MasterKelurahan::create(['name' => 'Setiabudi', 'kecamatan_id' => '3']);
        MasterKelurahan::create(['name' => 'Karet', 'kecamatan_id' => '3']);
        MasterKelurahan::create(['name' => 'Karet Semanggi', 'kecamatan_id' => '3']);
        MasterKelurahan::create(['name' => 'Karet Kuningan', 'kecamatan_id' => '3']);
        MasterKelurahan::create(['name' => 'Kuningan Timur', 'kecamatan_id' => '3']);
        MasterKelurahan::create(['name' => 'Menteng Atas', 'kecamatan_id' => '3']);
        MasterKelurahan::create(['name' => 'Pasar Manggis', 'kecamatan_id' => '3']);
        MasterKelurahan::create(['name' => 'Guntur', 'kecamatan_id' => '3']);

        //END MASTER KELURAHAN SETIABUDI

        //MASTER KELURAHAN PANCORAN

        MasterKelurahan::create(['name' => 'Pancoran', 'kecamatan_id' => '4']);
        MasterKelurahan::create(['name' => 'Cikoko', 'kecamatan_id' => '4']);
        MasterKelurahan::create(['name' => 'Pengadegan', 'kecamatan_id' => '4']);
        MasterKelurahan::create(['name' => 'Rawajati', 'kecamatan_id' => '4']);
        MasterKelurahan::create(['name' => 'Kalibata', 'kecamatan_id' => '4']);
        MasterKelurahan::create(['name' => 'Duren Tiga', 'kecamatan_id' => '4']);

        //END MASTER KELURAHAN PANCORAN

        //MASTER KELURAHAN JAGAKARSA

        MasterKelurahan::create(['name' => 'Tanjung Barat', 'kecamatan_id' => '5']);
        MasterKelurahan::create(['name' => 'Lenteng Agung', 'kecamatan_id' => '5']);
        MasterKelurahan::create(['name' => 'Jagakarsa', 'kecamatan_id' => '5']);
        MasterKelurahan::create(['name' => 'Ciganjur', 'kecamatan_id' => '5']);
        MasterKelurahan::create(['name' => 'Srengseng Sawah', 'kecamatan_id' => '5']);
        MasterKelurahan::create(['name' => 'Cipedak', 'kecamatan_id' => '5']);

        //END MASTER KELURAHAN JAGAKARSA

        //MASTER KELURAHAN PASAR MINGGU

        MasterKelurahan::create(['name' => 'Pejaten Barat', 'kecamatan_id' => '6']);
        MasterKelurahan::create(['name' => 'Pejaten Timur', 'kecamatan_id' => '6']);
        MasterKelurahan::create(['name' => 'Pasar Minggu', 'kecamatan_id' => '6']);
        MasterKelurahan::create(['name' => 'Kebagusan', 'kecamatan_id' => '6']);
        MasterKelurahan::create(['name' => 'Jati Padang', 'kecamatan_id' => '6']);
        MasterKelurahan::create(['name' => 'Ragunan', 'kecamatan_id' => '6']);
        MasterKelurahan::create(['name' => 'Cilandak Timur', 'kecamatan_id' => '6']);

        //END MASTER KELURAHAN PASAR MINGGU

        //MASTER KELURAHAN TEBET

        MasterKelurahan::create(['name' => 'Bukit Duri', 'kecamatan_id' => '7']);
        MasterKelurahan::create(['name' => 'Kebon Baru', 'kecamatan_id' => '7']);
        MasterKelurahan::create(['name' => 'Manggarai', 'kecamatan_id' => '7']);
        MasterKelurahan::create(['name' => 'Manggarai Selatan', 'kecamatan_id' => '7']);
        MasterKelurahan::create(['name' => 'Menteng Dalam', 'kecamatan_id' => '7']);
        MasterKelurahan::create(['name' => 'Tebet Barat', 'kecamatan_id' => '7']);
        MasterKelurahan::create(['name' => 'Tebet Timur', 'kecamatan_id' => '7']);

        //END MASTER KELURAHAN TEBET

        //MASTER KELURAHAN MAMPANG PRAPATAN

        MasterKelurahan::create(['name' => 'Kuningan Barat', 'kecamatan_id' => '8']);
        MasterKelurahan::create(['name' => 'Pela Mampang', 'kecamatan_id' => '8']);
        MasterKelurahan::create(['name' => 'Bangka', 'kecamatan_id' => '8']);
        MasterKelurahan::create(['name' => 'Tegal Parang', 'kecamatan_id' => '8']);
        MasterKelurahan::create(['name' => 'Mampang Prapatan', 'kecamatan_id' => '8']);

        //END MASTER KELURAHAN MAMPANG PRAPATAN

        //MASTER KELURAHAN CILANDAK

        MasterKelurahan::create(['name' => 'Cipete Selatan', 'kecamatan_id' => '9']);
        MasterKelurahan::create(['name' => 'Gandaria Selatan', 'kecamatan_id' => '9']);
        MasterKelurahan::create(['name' => 'Cilandak Barat', 'kecamatan_id' => '9']);
        MasterKelurahan::create(['name' => 'Lebak Bulus', 'kecamatan_id' => '9']);
        MasterKelurahan::create(['name' => 'Pondok Labu', 'kecamatan_id' => '9']);

        //END MASTER KELURAHAN CILANDAK

        //MASTER KELURAHAN KEBAYORAN BARU

        MasterKelurahan::create(['name' => 'Selong', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Gunung', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Kramat Pela', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Gandaria Utara', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Cipete Utara', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Pulo', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Melawai', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Petogogan', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Rawa Barat', 'kecamatan_id' => '10']);
        MasterKelurahan::create(['name' => 'Senayan', 'kecamatan_id' => '10']);

        //END MASTER KELURAHAN KEBAYORAN BARU

        //MASTER PARTAI

        MasterPartai::create(['name' => 'PDIP']);
        MasterPartai::create(['name' => 'PAN']);
        MasterPartai::create(['name' => 'PKS']);
        MasterPartai::create(['name' => 'GOLKAR']);
        MasterPartai::create(['name' => 'DEMOKRAT']);

        //END MASTER PARTAI
    }
}
