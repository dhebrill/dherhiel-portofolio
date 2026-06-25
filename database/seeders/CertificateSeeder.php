<?php

namespace Database\Seeders;

use App\Models\Certificate;
use Illuminate\Database\Seeder;

class CertificateSeeder extends Seeder
{
    public function run(): void
    {
        $certificates = [
            [
                'title'      => 'Google Data Analytics Capstone: Complete a Case Study',
                'issuer'     => 'Google (via Coursera)',
                'year'       => '2026',
                'url'        => '#',
                'image_path' => 'certificates/sertifikat-coursera.pdf',
            ],
            [
                'title'      => 'Workshop and Competency Test in Industry-Based Database Systems',
                'issuer'     => 'G2 Academy',
                'year'       => '2025',
                'url'        => '#',
                'image_path' => 'certificates/sertifikat-g2academy.pdf',
            ],
            [
                'title'      => 'BNSP Competency Certificate – Multimedia',
                'issuer'     => 'Badan Nasional Sertifikasi Profesi (BNSP)',
                'year'       => '2024',
                'url'        => '#',
                'image_path' => 'certificates/sertifikat-bnsp.pdf',
            ],
        ];

        foreach ($certificates as $data) {
            Certificate::create($data);
        }
    }
}
