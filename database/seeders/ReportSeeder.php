<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reports = [
            'Konten ini mengandung unsur SARA',
            'Konten ini mengandung unsur kekerasan',
            'Konten ini mengandung unsur pornografi',
            'Konten ini mengandung unsur penipuan',
            'Konten ini mengandung unsur spam',
            'Konten ini mengandung unsur hoaks',
            'Konten ini mengandung unsur ujaran kebencian',
            'Konten ini mengandung unsur pencemaran nama baik',
            'Konten ini mengandung unsur pencemaran lingkungan',
            'Konten ini mengandung unsur pencemaran moral',
            'Konten ini mengandung unsur pelanggaran hak cipta',
            'Konten ini mengandung unsur pelanggaran privasi',
            'Konten ini mengandung unsur pelanggaran hukum',
            'Konten ini mengandung unsur pelanggaran etika',
            'Konten ini mengandung unsur pelanggaran keamanan',
            'Konten ini mengandung unsur pelanggaran kesehatan',
            'Konten ini mengandung unsur pelanggaran keselamatan',
            'Konten ini mengandung unsur pelanggaran ketertiban',
            'Konten ini mengandung unsur pelanggaran norma',
            'Konten ini mengandung unsur pelanggaran adat',
            'Konten ini mengandung unsur pelanggaran agama',
            'Konten ini mengandung unsur pelanggaran budaya',
            'Konten ini mengandung unsur pelanggaran tradisi',
            'Konten ini mengandung unsur pelanggaran hak asasi manusia',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendapat',
            'Konten ini mengandung unsur pelanggaran kebebasan pers',
            'Konten ini mengandung unsur pelanggaran kebebasan berkumpul',
            'Konten ini mengandung unsur pelanggaran kebebasan beragama',
            'Konten ini mengandung unsur pelanggaran kebebasan berekspresi',
            'Konten ini mengandung unsur pelanggaran kebebasan berorganisasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berpolitik',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendidikan',
            'Konten ini mengandung unsur pelanggaran kebebasan berusaha',
            'Konten ini mengandung unsur pelanggaran kebebasan bertransaksi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkomunikasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinformasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkreasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinovasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendapat',
            'Konten ini mengandung unsur pelanggaran kebebasan beragama',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendidikan',
            'Konten ini mengandung unsur pelanggaran kebebasan berusaha',
            'Konten ini mengandung unsur pelanggaran kebebasan bertransaksi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkomunikasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinformasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkreasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinovasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendapat',
            'Konten ini mengandung unsur pelanggaran kebebasan beragama',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendidikan',
            'Konten ini mengandung unsur pelanggaran kebebasan berusaha',
            'Konten ini mengandung unsur pelanggaran kebebasan bertransaksi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkomunikasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinformasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkreasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinovasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendapat',
            'Konten ini mengandung unsur pelanggaran kebebasan beragama',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendidikan',
            'Konten ini mengandung unsur pelanggaran kebebasan berusaha',
            'Konten ini mengandung unsur pelanggaran kebebasan bertransaksi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkomunikasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinformasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berkreasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berinovasi',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendapat',
            'Konten ini mengandung unsur pelanggaran kebebasan beragama',
            'Konten ini mengandung unsur pelanggaran kebebasan berpendidikan',
            'Konten ini mengandung unsur pelanggaran kebebasan berusaha',
            'Konten ini mengandung unsur pelanggaran kebebasan bertransaksi',
        ];

        foreach ($reports as $report) {
            \App\Models\Report::factory()->create([
                'content' => $report,
            ]);
        }
    }
}
