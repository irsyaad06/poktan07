<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Petani;
use App\Models\HasilPanen;
use App\Models\Agen;
use App\Models\Kegiatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin Poktan 07',
            'email' => 'admin@poktan07.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'is_approved' => true,
        ]);

        $petanis = [
            [
                'id' => 1,
                'name' => 'Ibu Karina Frity',
                'role' => 'Petani Hidroponik',
                'whatsapp' => '0812-3456-7891',
                'image' => 'https://images.unsplash.com/photo-1595841696677-6489ff3f8cd1?auto=format&fit=crop&w=500&q=60',
                'location' => 'Blok Utara, RW 07',
                'area' => '2 Hektar',
                'cert' => 'Sertifikat Organik SNI',
                'desc' => 'Berpengalaman 15 tahun dalam budidaya padi organik unggulan dengan metode irigasi modern.'
            ],
            [
                'id' => 2,
                'name' => 'Ibu Siti Aminah',
                'role' => 'Petani Sayur',
                'whatsapp' => '0812-3456-7892',
                'image' => 'https://images.unsplash.com/photo-1592424001815-56906201a039?auto=format&fit=crop&w=500&q=60',
                'location' => 'Blok Selatan, RW 07',
                'area' => '0.5 Hektar',
                'cert' => 'Praktik Pertanian Baik (GAP)',
                'desc' => 'Spesialis sayuran hidroponik dan hortikultura bebas pestisida kimia.'
            ],
            [
                'id' => 3,
                'name' => 'Bapak Joko Widodo (Pakde)',
                'role' => 'Petani Buah',
                'whatsapp' => '0812-3456-7893',
                'image' => 'https://images.unsplash.com/photo-1589923188900-85dae523342b?auto=format&fit=crop&w=500&q=60',
                'location' => 'Blok Timur, RW 07',
                'area' => '1.5 Hektar',
                'cert' => 'Sertifikat Prima 3',
                'desc' => 'Fokus pada perkebunan mangga dan jeruk dengan kualitas ekspor.'
            ],
            [
                'id' => 4,
                'name' => 'Bapak Tono Suhendra',
                'role' => 'Petani Palawija',
                'whatsapp' => '0812-3456-7894',
                'image' => 'https://images.unsplash.com/photo-1534073828943-f801091bb18c?auto=format&fit=crop&w=500&q=60',
                'location' => 'Blok Barat, RW 07',
                'area' => '3 Hektar',
                'cert' => 'Standar Mutu Palawija',
                'desc' => 'Mengelola ladang jagung, kedelai, dan kacang tanah dengan sistem rotasi tanam yang optimal.'
            ],
            [
                'id' => 5,
                'name' => 'Ibu Ratna Ningsih',
                'role' => 'Petani Tanaman Obat',
                'whatsapp' => '0812-3456-7895',
                'image' => 'https://images.unsplash.com/photo-1584473457406-6240486418e9?auto=format&fit=crop&w=500&q=60',
                'location' => 'Blok Tengah, RW 07',
                'area' => '0.8 Hektar',
                'cert' => 'Herbal Terstandarisasi',
                'desc' => 'Membudidayakan tanaman obat keluarga (Toga) seperti jahe merah, kunyit, dan temulawak.'
            ],
            [
                'id' => 6,
                'name' => 'Bapak Agus Supriyanto',
                'role' => 'Petani Sayur',
                'whatsapp' => '0812-3456-7896',
                'image' => 'https://images.unsplash.com/photo-1605000797499-95a51c5269ae?auto=format&fit=crop&w=500&q=60',
                'location' => 'Blok Selatan, RW 07',
                'area' => '1 Hektar',
                'cert' => 'Praktik Pertanian Baik (GAP)',
                'desc' => 'Menyuplai berbagai jenis kubis, tomat, dan cabai dengan kualitas pasar swalayan.'
            ]
        ];

        foreach ($petanis as $petani) {
            Petani::create($petani);
        }

        $hasilPanens = [
            [ 'petani_id' => 1, 'name' => 'Beras Cianjur (Pandan Wangi)', 'qty' => '2.5 Ton', 'price' => 'Rp 14.500/kg', 'image' => 'https://images.unsplash.com/photo-1586201375761-83865001e31c?auto=format&fit=crop&w=500&q=60', 'type' => 'Organik', 'grade' => 'Grade A' ],
            [ 'petani_id' => 1, 'name' => 'Beras Merah Premium', 'qty' => '800 Kg', 'price' => 'Rp 18.000/kg', 'image' => 'https://images.unsplash.com/photo-1600188769045-8bc261a87e0f?auto=format&fit=crop&w=500&q=60', 'type' => 'Organik', 'grade' => 'Grade A' ],
            [ 'petani_id' => 2, 'name' => 'Bayam Hijau Hidroponik', 'qty' => '150 Kg', 'price' => 'Rp 8.000/ikat', 'image' => 'https://images.unsplash.com/photo-1576045057995-568f588f82fb?auto=format&fit=crop&w=500&q=60', 'type' => 'Hidroponik', 'grade' => 'Premium' ],
            [ 'petani_id' => 2, 'name' => 'Selada Air (Lettuce)', 'qty' => '100 Kg', 'price' => 'Rp 12.000/kg', 'image' => 'https://images.unsplash.com/photo-1622206151226-18ca2c9ab4a1?auto=format&fit=crop&w=500&q=60', 'type' => 'Hidroponik', 'grade' => 'Premium' ],
            [ 'petani_id' => 2, 'name' => 'Wortel Manis Berastagi', 'qty' => '300 Kg', 'price' => 'Rp 10.000/kg', 'image' => 'https://images.unsplash.com/photo-1598170845058-32b9d6a5da37?auto=format&fit=crop&w=500&q=60', 'type' => 'Non-Pestisida', 'grade' => 'Grade A' ],
            [ 'petani_id' => 3, 'name' => 'Mangga Harum Manis', 'qty' => '500 Kg', 'price' => 'Rp 25.000/kg', 'image' => 'https://images.unsplash.com/photo-1553279768-865429fa0078?auto=format&fit=crop&w=500&q=60', 'type' => 'Organik', 'grade' => 'Ekspor' ],
            [ 'petani_id' => 3, 'name' => 'Jeruk Medan Manis', 'qty' => '400 Kg', 'price' => 'Rp 18.000/kg', 'image' => 'https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?auto=format&fit=crop&w=500&q=60', 'type' => 'Organik', 'grade' => 'Grade A' ],
            [ 'petani_id' => 4, 'name' => 'Jagung Manis Super', 'qty' => '1.2 Ton', 'price' => 'Rp 7.500/kg', 'image' => 'https://images.unsplash.com/photo-1551754655-cd27e38d2076?auto=format&fit=crop&w=500&q=60', 'type' => 'Konvensional', 'grade' => 'Premium' ],
            [ 'petani_id' => 4, 'name' => 'Kacang Tanah Kupas', 'qty' => '400 Kg', 'price' => 'Rp 22.000/kg', 'image' => 'https://images.unsplash.com/photo-1599307767316-776affad8bf5?auto=format&fit=crop&w=500&q=60', 'type' => 'Konvensional', 'grade' => 'Grade A' ],
            [ 'petani_id' => 4, 'name' => 'Kedelai Lokal', 'qty' => '600 Kg', 'price' => 'Rp 11.000/kg', 'image' => 'https://images.unsplash.com/photo-1596547609652-9cb5d8d736bb?auto=format&fit=crop&w=500&q=60', 'type' => 'Konvensional', 'grade' => 'Grade B' ],
            [ 'petani_id' => 5, 'name' => 'Jahe Merah Super', 'qty' => '200 Kg', 'price' => 'Rp 45.000/kg', 'image' => 'https://images.unsplash.com/photo-1615486171448-4cbafcc28b52?auto=format&fit=crop&w=500&q=60', 'type' => 'Organik', 'grade' => 'Premium' ],
            [ 'petani_id' => 5, 'name' => 'Kunyit Segar', 'qty' => '300 Kg', 'price' => 'Rp 15.000/kg', 'image' => 'https://images.unsplash.com/photo-1615486511484-92e172cb4fec?auto=format&fit=crop&w=500&q=60', 'type' => 'Organik', 'grade' => 'Grade A' ],
            [ 'petani_id' => 6, 'name' => 'Cabai Merah Keriting', 'qty' => '150 Kg', 'price' => 'Rp 40.000/kg', 'image' => 'https://images.unsplash.com/photo-1588252303782-cb80119de0db?auto=format&fit=crop&w=500&q=60', 'type' => 'Non-Pestisida', 'grade' => 'Premium' ],
            [ 'petani_id' => 6, 'name' => 'Tomat Ceri Merah', 'qty' => '100 Kg', 'price' => 'Rp 20.000/kg', 'image' => 'https://images.unsplash.com/photo-1592924357228-91a4daadcfea?auto=format&fit=crop&w=500&q=60', 'type' => 'Non-Pestisida', 'grade' => 'Grade A' ]
        ];

        foreach ($hasilPanens as $hp) {
            HasilPanen::create($hp);
        }

        $agens = [
            [
                'name' => 'PT. Makmur Jaya Agrikultur',
                'contact' => '0878-9105-4742',
                'address' => 'Pasar Induk Kramat Jati, Blok C No. 12, Jakarta',
                'image' => 'https://images.unsplash.com/photo-1578916171728-46686eac8d58?auto=format&fit=crop&w=500&q=60',
                'coverage' => 'Jabodetabek',
                'type' => 'Distributor Skala Besar',
                'joined' => 'Sejak 2020'
            ],
            [
                'name' => 'CV. Toko Segar Abadi',
                'contact' => '0878-9105-4742',
                'address' => 'Kawasan Pasar Senen Raya, Gudang No. 5',
                'image' => 'https://images.unsplash.com/photo-1601598851547-4302969d0614?auto=format&fit=crop&w=500&q=60',
                'coverage' => 'Jakarta Pusat & Utara',
                'type' => 'Pengepul Ritel',
                'joined' => 'Sejak 2021'
            ],
            [
                'name' => 'Distributor Pangan Nusantara',
                'contact' => '0878-9105-4742',
                'address' => 'Jl. Jendral Sudirman No. 10, Jakarta Selatan',
                'image' => 'https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=500&q=60',
                'coverage' => 'Nasional (Pulau Jawa)',
                'type' => 'Distributor Nasional',
                'joined' => 'Sejak 2018'
            ],
            [
                'name' => 'Koperasi Tani Mandiri',
                'contact' => '0878-9105-4742',
                'address' => 'Jl. Raya Bogor KM 22, Depok',
                'image' => 'https://images.unsplash.com/photo-1542838686-37ed7a05a4ca?auto=format&fit=crop&w=500&q=60',
                'coverage' => 'Depok & Bogor',
                'type' => 'Koperasi',
                'joined' => 'Sejak 2022'
            ]
        ];

        foreach ($agens as $agen) {
            Agen::create($agen);
        }

        $kegiatans = [
            [
                'title' => 'Pelatihan Pertanian Organik',
                'date' => '12 Agustus',
                'image' => 'https://images.unsplash.com/photo-1574943320219-553eb213f72d?auto=format&fit=crop&w=500&q=60',
                'desc' => 'Meningkatkan kapasitas petani dalam menerapkan metode pertanian organik tanpa pestisida kimia untuk menjaga kelestarian lingkungan.'
            ],
            [
                'title' => 'Panen Raya Padi Bersama',
                'date' => '25 Juli',
                'image' => 'https://images.unsplash.com/photo-1595841696677-6489ff3f8cd1?auto=format&fit=crop&w=500&q=60',
                'desc' => 'Kegiatan gotong royong anggota Poktan 07 dalam memanen padi jenis unggulan yang dihadiri oleh dinas pertanian setempat.'
            ],
            [
                'title' => 'Distribusi Bibit Unggul',
                'date' => '10 Juni',
                'image' => 'https://images.unsplash.com/photo-1464226184884-fa280b87c399?auto=format&fit=crop&w=500&q=60',
                'desc' => 'Pembagian bibit sayuran dan palawija bersertifikat kepada seluruh anggota sebagai persiapan masa tanam musim kemarau.'
            ]
        ];

        foreach ($kegiatans as $kegiatan) {
            Kegiatan::create($kegiatan);
        }
    }
}
