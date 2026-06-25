# K-Means Clustering Analysis

Analisis clustering untuk mengidentifikasi pola data ekspor bulanan hasil industri menurut komoditas tahun 2024.

## Dataset

File CSV: `data/Berat Bersih Ekspor Bulanan Hasil Industri Menurut Komoditas, 2024.csv`

Dataset berisi 21 komoditas industri dengan nilai ekspor per bulan (Januari - Desember 2024).

## Cara Menjalankan

1. Install dependencies:
```bash
pip install -r requirements.txt
```

2. Letakkan file CSV dataset di folder `data/`

3. Jalankan script:
```bash
python kmeans_clustering.py
```

4. Hasil visualisasi akan tersimpan di folder `output/`

## Metode

- **Preprocessing**: StandardScaler
- **Penentuan k optimal**: Elbow Method + Silhouette Score
- **Clustering**: K-Means (k=3)
- **Evaluasi**: Silhouette Score, Davies-Bouldin Index, Calinski-Harabasz Index

## Hasil

| Metrik | Nilai |
|--------|-------|
| Silhouette Score | 0.8283 |
| Davies-Bouldin Index | 0.3115 |
| Calinski-Harabasz Index | 180.2811 |
