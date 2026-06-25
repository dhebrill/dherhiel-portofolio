"""
K-Means Clustering Analysis
============================
Analisis clustering ekspor bulanan hasil industri menurut komoditas tahun 2024.

Dataset: Berat Bersih Ekspor Bulanan Hasil Industri Menurut Komoditas, 2024
"""

import pandas as pd
import numpy as np
import matplotlib.pyplot as plt
import seaborn as sns
from sklearn.preprocessing import StandardScaler
from sklearn.cluster import KMeans
from sklearn.metrics import silhouette_score, davies_bouldin_score, calinski_harabasz_score
import warnings
warnings.filterwarnings("ignore")

# ============================================================
# 1. LOAD DATA
# ============================================================
df = pd.read_csv(
    "data/Berat Bersih Ekspor Bulanan Hasil Industri Menurut Komoditas, 2024.csv",
    engine='python',
    on_bad_lines='skip',
    sep=';'
)

print("=== Data Head ===")
print(df.head())
print("\n=== Data Info ===")
df.info()
print("\n=== Missing Values ===")
print(df.isnull().sum())

# ============================================================
# 2. PREPROCESSING
# ============================================================
df = df.set_index('Komoditas Ekspor Industri')
print("\n=== Data setelah set_index ===")
print(df.head())

# Konversi koma ke titik dan ubah ke float
df_scaled = df.replace({',': '.'}, regex=True).astype(float)

# Standardisasi
scaler = StandardScaler()
data_scaled = scaler.fit_transform(df_scaled)

df_scaled_data = pd.DataFrame(
    data_scaled,
    index=df_scaled.index,
    columns=df_scaled.columns
)
print("\n=== Data setelah StandardScaler ===")
print(df_scaled_data.head())

# ============================================================
# 3. ELBOW METHOD (WCSS)
# ============================================================
wcss = []
K = range(1, 11)

for k in K:
    kmeans_model = KMeans(n_clusters=k, random_state=42, n_init=10)
    kmeans_model.fit(data_scaled)
    wcss.append(kmeans_model.inertia_)

plt.figure(figsize=(10, 6))
plt.plot(K, wcss, 'bx-')
plt.xlabel('Jumlah Cluster (k)')
plt.ylabel('WCSS (Inertia)')
plt.title('Metode Elbow untuk Menentukan k Optimal')
plt.grid(True)
plt.savefig('output/elbow_method.png', dpi=150, bbox_inches='tight')
plt.show()
print("Perhatikan grafik di atas. Titik 'siku' atau 'elbow' menunjukkan nilai k yang optimal.")

# ============================================================
# 4. K-MEANS DENGAN k=3
# ============================================================
k_optimal = 3
kmeans_final = KMeans(n_clusters=k_optimal, random_state=42, n_init=10)
df_scaled_data['Cluster'] = kmeans_final.fit_predict(data_scaled)

# Tambahkan kolom Cluster ke DataFrame awal
df['Cluster'] = df_scaled_data['Cluster']

print(f"\n=== Hasil Clustering dengan k = {k_optimal} ===")
print(df[['Cluster']].head())

# Profil rata-rata setiap cluster
cluster_profile = df_scaled_data.groupby('Cluster').mean()
print("\n=== Profil Rata-Rata Cluster (Nilai Tereskalasi) ===")
print(cluster_profile)

# Komoditas di setiap cluster
for cluster_id in sorted(df['Cluster'].unique()):
    commodities = df[df['Cluster'] == cluster_id].index.tolist()
    print(f"\n--- Komoditas di Cluster {cluster_id} ---")
    for c in commodities:
        print(f"  - {c}")

# Jumlah komoditas per cluster
print("\n=== Jumlah Komoditas per Cluster ===")
print(df['Cluster'].value_counts())

# ============================================================
# 5. SILHOUETTE SCORE (K=2 s.d. 10)
# ============================================================
X = data_scaled
range_n_clusters = list(range(2, 11))
silhouette_scores = []

for n_clusters in range_n_clusters:
    kmeans = KMeans(n_clusters=n_clusters, random_state=42, n_init=10)
    cluster_labels = kmeans.fit_predict(X)
    silhouette_avg = silhouette_score(X, cluster_labels)
    silhouette_scores.append(silhouette_avg)
    print(f"Untuk K={n_clusters}, Silhouette Score adalah: {silhouette_avg:.4f}")

plt.figure(figsize=(10, 6))
plt.plot(range_n_clusters, silhouette_scores, marker='o', linestyle='--')
plt.title('Metode Silhouette untuk Menentukan Jumlah Klaster Optimal (K)')
plt.xlabel('Jumlah Klaster (K)')
plt.ylabel('Silhouette Score Rata-rata')
plt.xticks(range_n_clusters)
plt.grid(True)
plt.savefig('output/silhouette_scores.png', dpi=150, bbox_inches='tight')
plt.show()

# ============================================================
# 6. FINAL METRICS UNTUK k=3
# ============================================================
k_optimal = 3
kmeans_optimal = KMeans(n_clusters=k_optimal, random_state=42, n_init=10)
cluster_labels_optimal = kmeans_optimal.fit_predict(X)

sil_score_optimal = silhouette_score(X, cluster_labels_optimal)
db_index_optimal = davies_bouldin_score(X, cluster_labels_optimal)
ch_index_optimal = calinski_harabasz_score(X, cluster_labels_optimal)

print(f"\n--- Metrics untuk k_optimal = {k_optimal} ---")
print(f"Silhouette Score:       {sil_score_optimal:.4f}")
print(f"Davies-Bouldin Index:   {db_index_optimal:.4f}")
print(f"Calinski-Harabasz Index:{ch_index_optimal:.4f}")

# ============================================================
# 7. URUTKAN CLUSTER & VISUALISASI HEATMAP
# ============================================================
kolom_bulan = [col for col in df_scaled_data.columns if col != 'Cluster']
cluster_means = df_scaled_data.groupby('Cluster')[kolom_bulan].mean().mean(axis=1)
sorted_cluster_order = cluster_means.sort_values().index.tolist()
mapping = {old_label: new_label for new_label, old_label in enumerate(sorted_cluster_order)}
df_scaled_data['Cluster'] = df_scaled_data['Cluster'].map(mapping)
df['Cluster'] = df_scaled_data['Cluster']

cluster_profile = df_scaled_data.groupby('Cluster').mean()
plt.figure(figsize=(14, 8))
sns.heatmap(
    cluster_profile,
    annot=True, fmt=".2f",
    cmap='coolwarm',
    linewidths=.5,
    linecolor='black'
)
plt.title(f'Heatmap Pola Ekspor Bulanan Terurut (Cluster 0=Terendah, k={k_optimal})')
plt.ylabel('Cluster')
plt.xlabel('Bulan')
plt.savefig('output/heatmap_cluster.png', dpi=150, bbox_inches='tight')
plt.show()

# ============================================================
# 8. LINE PLOT POLA EKSPOR BULANAN PER CLUSTER
# ============================================================
df_reset = df.reset_index()
month_columns = [
    col for col in df_reset.columns
    if col not in ['Komoditas Ekspor Industri', 'Cluster', 'Total Ekspor']
]
df_long = df_reset.melt(
    id_vars=['Komoditas Ekspor Industri', 'Cluster'],
    value_vars=month_columns,
    var_name='Bulan',
    value_name='Nilai Ekspor'
)
df_long['Nilai Ekspor'] = df_long['Nilai Ekspor'].replace({',': '.'}, regex=True).astype(float)

df_cluster_avg = df_long.groupby(['Cluster', 'Bulan'])['Nilai Ekspor'].mean().reset_index()
month_order = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
]
df_cluster_avg['Bulan'] = pd.Categorical(
    df_cluster_avg['Bulan'],
    categories=month_order,
    ordered=True
)
df_cluster_avg = df_cluster_avg.sort_values('Bulan')

plt.figure(figsize=(14, 8))
sns.lineplot(
    data=df_cluster_avg,
    x='Bulan', y='Nilai Ekspor',
    hue='Cluster', marker='o',
    palette='viridis', linewidth=2
)
plt.title('Pola Ekspor Bulanan Rata-Rata per Klaster')
plt.xlabel('Bulan')
plt.ylabel('Nilai Ekspor Rata-Rata')
plt.grid(True, linestyle='--', alpha=0.6)
plt.xticks(rotation=45)
plt.tight_layout()
plt.savefig('output/monthly_trend.png', dpi=150, bbox_inches='tight')
plt.show()

print("\n=== ANALISIS SELESAI ===")
