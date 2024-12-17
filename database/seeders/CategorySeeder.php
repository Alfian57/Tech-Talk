<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Hardware',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan perangkat keras komputer, termasuk komponen seperti CPU, GPU, RAM, hard drive, serta perangkat tambahan seperti keyboard, mouse, dan monitor. Diskusikan masalah, berbagi tips, dan temukan rekomendasi produk di sini.',
            ],
            [
                'name' => 'Software',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan perangkat lunak komputer, termasuk sistem operasi, aplikasi, dan game. Diskusikan masalah, berbagi tips, dan temukan rekomendasi produk di sini.',
            ],
            [
                'name' => 'Networking',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan jaringan komputer, termasuk konfigurasi router, switch, firewall, dan keamanan jaringan. Diskusikan masalah, berbagi tips, dan temukan rekomendasi produk di sini.',
            ],
            [
                'name' => 'Programming',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan pemrograman, termasuk berbagai bahasa pemrograman, framework, dan alat pengembangan. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Database',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan basis data, termasuk desain, manajemen, dan optimasi basis data. Diskusikan masalah, berbagi tips, dan temukan rekomendasi produk di sini.',
            ],
            [
                'name' => 'Security',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan keamanan komputer, termasuk perlindungan terhadap malware, enkripsi, dan praktik keamanan terbaik. Diskusikan masalah, berbagi tips, dan temukan rekomendasi produk di sini.',
            ],
            [
                'name' => 'Web Development',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan pengembangan web, termasuk HTML, CSS, JavaScript, dan berbagai framework web. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Mobile Development',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan pengembangan aplikasi mobile, termasuk Android, iOS, dan berbagai framework mobile. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'DevOps',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan DevOps, termasuk otomatisasi, continuous integration, dan continuous deployment. Diskusikan masalah, berbagi tips, dan temukan rekomendasi alat di sini.',
            ],
            [
                'name' => 'Cloud Computing',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan komputasi awan, termasuk layanan seperti AWS, Azure, dan Google Cloud. Diskusikan masalah, berbagi tips, dan temukan rekomendasi layanan di sini.',
            ],
            [
                'name' => 'AI & Machine Learning',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan kecerdasan buatan dan pembelajaran mesin, termasuk algoritma, model, dan alat pengembangan. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'IoT',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan Internet of Things, termasuk perangkat, protokol, dan aplikasi IoT. Diskusikan masalah, berbagi tips, dan temukan rekomendasi produk di sini.',
            ],
            [
                'name' => 'Data Science',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan ilmu data, termasuk analisis data, visualisasi data, dan alat-alat data science. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Blockchain',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan teknologi blockchain, termasuk cryptocurrency, smart contracts, dan aplikasi blockchain lainnya. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Game Development',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan pengembangan game, termasuk desain game, engine game, dan alat pengembangan game. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'AR & VR',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan augmented reality dan virtual reality, termasuk perangkat, aplikasi, dan pengembangan AR/VR. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Robotika',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan robotika, termasuk desain, pemrograman, dan aplikasi robot. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Big Data',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan big data, termasuk pengolahan data skala besar, alat big data, dan analisis big data. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Quantum Computing',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan komputasi kuantum, termasuk algoritma kuantum, perangkat keras kuantum, dan aplikasi komputasi kuantum. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
            [
                'name' => 'Cybersecurity',
                'description' => 'Kategori ini mencakup semua topik yang berhubungan dengan keamanan siber, termasuk ancaman siber, perlindungan data, dan praktik keamanan terbaik. Diskusikan masalah, berbagi tips, dan temukan rekomendasi sumber daya di sini.',
            ],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::factory()->create($category);
        }
    }
}
