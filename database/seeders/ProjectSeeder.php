<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title'       => 'SEKECAM – Community Complaint Website',
                'description' => 'Developed a web-based platform for public complaints and aspirations.',
                'tags'        => ['Web', 'Community'],
                'url'         => 'https://sekecam.my.id/',
                'type'        => 'web',
                'link'        => 'https://sekecam.my.id/',
                'image_path'  => null,
            ],
            [
                'title'       => 'K-Means Clustering Analysis',
                'description' => 'K-Means clustering untuk mengidentifikasi pola ekspor bulanan hasil industri menurut komoditas tahun 2024. Menggunakan Elbow Method, Silhouette Score (0.8283), Davies-Bouldin Index (0.3115), dan Calinski-Harabasz Index (180.28).',
                'tags'        => ['Data Science', 'Clustering', 'Python'],
                'url'         => 'https://www.kaggle.com/code/muhammadddrre/k-means-clustering-komoditas-ekspor-industri',
                'type'        => 'web',
                'link'        => 'https://www.kaggle.com/code/muhammadddrre/k-means-clustering-komoditas-ekspor-industri',
                'image_path'  => null,
            ],
        ];

        foreach ($projects as $data) {
            Project::create($data);
        }
    }
}
