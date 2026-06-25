<?php

/*
|--------------------------------------------------------------------------
| Portfolio Data
|--------------------------------------------------------------------------
| Single source of truth for all portfolio content. Edit values here and
| the Blade views update automatically. Access via config('portfolio.*').
*/

return [

    'profile' => [
        'name'        => 'Muhammad Dherhiel Ar Ramidza',
        'logo'        => 'DA.',
        'role'        => 'Information Systems Student',
        'badge'       => 'INFORMATION SYSTEMS STUDENT',
        'email'       => 'muhammaddheril06@gmail.com',
        'location'    => 'Depok, West Java',
        'summary'     => 'Information Systems student with a strong interest in data analytics and experience in data administration and operational reporting. Detail-oriented, analytical, and highly motivated to develop a career in data analytics.',
        'about'       => 'I am an Information Systems student at Universitas Bina Sarana Informatika with a strong interest in data analytics. My hands-on experience in data administration and operational reporting has shaped me into a detail-oriented and analytical person. I enjoy turning raw operational data into clean, validated, and meaningful reports, and I am highly motivated to grow my career in the data analytics field, continuously learning new tools and techniques along the way.',
        'photo'       => 'images/profile.png',
    ],

    // Formspree endpoint — replace with your real endpoint, e.g. https://formspree.io/f/abcdwxyz
    'contact' => [
        'formspree_endpoint' => 'https://formspree.io/f/your-form-id',
    ],

    'socials' => [
        ['label' => 'LinkedIn', 'url' => '#', 'icon' => 'linkedin'],
        ['label' => 'GitHub',   'url' => '#', 'icon' => 'github'],
    ],

    'education' => [
        [
            'school'  => 'Universitas Bina Sarana Informatika',
            'program' => 'Bachelor of Information Systems',
            'period'  => '2024 – Present',
        ],
        [
            'school'  => 'SMK Negeri 1 Depok',
            'program' => 'Visual Communication Design',
            'period'  => '2021 – 2024',
        ],
    ],

    'experience' => [
        [
            'company'  => 'PT Safari Sapibagus',
            'position' => 'Admin Sales & Operations',
            'period'   => 'Oktober 2024 – November 2025',
            'points'   => [
                'Input, manage, and validate operational data using Microsoft Excel',
                'Perform data checking to ensure accuracy and data consistency',
                'Assist in preparing daily operational reports and data recaps',
            ],
        ],
    ],

    'achievements' => [
        [
            'title'  => '2nd Place IT Bootcamp Software Development for Industry (Campus Level)',
            'images' => [
                'images/docum 1.jpeg',
                'images/docum 2.jpeg',
            ],
        ],
    ],

    'projects' => [
        [
            'title'       => 'SEKECAM – Community Complaint Website',
            'description' => 'Developed a web-based platform for public complaints and aspirations.',
            'url'         => '#',
            'tags'        => ['Web', 'Community'],
        ],
        [
            'title'       => 'K-Means Clustering Analysis',
            'description' => 'K-Means clustering untuk mengidentifikasi pola ekspor bulanan hasil industri menurut komoditas tahun 2024. Menggunakan Elbow Method, Silhouette Score, Davies-Bouldin Index, dan Calinski-Harabasz Index dengan hasil Silhouette Score 0.8283.',
            'url'         => 'https://www.kaggle.com/code/muhammadddrre/k-means-clustering-komoditas-ekspor-industri',
            'tags'        => ['Data Science', 'Clustering', 'Python', 'Jupyter'],
        ],
    ],

    'skills' => [
        'hard' => [
            ['name' => 'Microsoft Excel',                    'level' => 90],
            ['name' => 'Data Administration & Documentation', 'level' => 85],
            ['name' => 'Data Validation & Reporting',         'level' => 85],
            ['name' => 'Data Visualization (Basic)',          'level' => 70],
        ],
        'soft' => [
            'Detail-oriented',
            'Analytical thinking',
            'Team collaboration',
            'Willingness to learn',
        ],
    ],

    'certificates' => [
        [
            'title'  => 'Google Data Analytics Capstone: Complete a Case Study',
            'issuer' => 'Google (via Coursera)',
            'year'   => '2026',
            'url'    => '#',
            'image'  => 'images/placeholder.jpg',
        ],
        [
            'title'  => 'Workshop and Competency Test in Industry-Based Database Systems',
            'issuer' => 'G2 Academy',
            'year'   => '2025',
            'url'    => '#',
            'image'  => 'images/placeholder.jpg',
        ],
        [
            'title'  => 'BNSP Competency Certificate – Multimedia',
            'issuer' => 'Badan Nasional Sertifikasi Profesi (BNSP)',
            'year'   => '2024',
            'url'    => '#',
            'image'  => 'images/placeholder.jpg',
        ],
    ],

    'nav' => [
        ['label' => 'Home',         'anchor' => 'home'],
        ['label' => 'About',        'anchor' => 'about'],
        ['label' => 'Experience',   'anchor' => 'experience'],
        ['label' => 'Projects',     'anchor' => 'projects'],
        ['label' => 'Skills',       'anchor' => 'skills'],
        ['label' => 'Certificates', 'anchor' => 'certificates'],
        ['label' => 'Contact',      'anchor' => 'contact'],
    ],
];
