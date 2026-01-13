# ☕ GD COFFE

---

**NAMA TEAM:** GD COFFE <br>
**NAMA PROJECT:** GD COFFE WEBSITE <br>
**JENIS BISNIS:** F&B

---

## 👥 Anggota Tim
| Nama Lengkap | NIM | Tugas |
|---------------|-----|--------|
| Muhammad Ibrah Adzdzikra | 2310120010 | Business & Konsep Utama / Frontend |
| Muhammad Abyan Alwafi Effendy | 2310120024 | Developer / Customer Order / Workflow |
| Muhammad Dzikri Khairrifo | 2310120025 | Developer / Frontend / CI-CD Workflow |

---

## ⚙️ Arsitektur CI/CD Pipeline

Project GD Coffee Website menerapkan Continuous Integration (CI) menggunakan
GitHub Actions untuk memastikan kualitas dan stabilitas aplikasi.

Alur CI/CD secara umum:
Developer → GitHub Repository → GitHub Actions → Build & Test → Deploy

### 🧪 Continuous Integration (CI)
Workflow CI dijalankan secara otomatis ketika:
1. Terjadi push ke branch main
2. Terdapat Pull Request menuju branch main
<img width="535" height="203" alt="CI" src="https://github.com/user-attachments/assets/853449bd-4255-4ca9-8a00-a5518dbc9169" />

#### ⚙️ Tahapan Workflow CI

**1. Checkout Source Code**
- Mengambil kode dari repository GitHub

**2. Setup Environment**
- PHP 8.2
- Extension Laravel yang dibutuhkan
<img width="623" height="83" alt="Env" src="https://github.com/user-attachments/assets/dbe98bcd-6d84-4155-ba6b-26cafebec934" />

**3. Install Dependency**
- Menggunakan Composer
<img width="1035" height="99" alt="Composser" src="https://github.com/user-attachments/assets/23275284-dddb-4edd-8247-946f841a22e7" />

**4. Konfigurasi Environment**
- Generate file .env
- Generate application key
<img width="623" height="83" alt="Env" src="https://github.com/user-attachments/assets/2a020ec4-c0d3-4e8e-b437-1a872fc4c4a9" />

**5. Database Testing**
- Menggunakan SQLite untuk environment CI
- Menjalankan migration otomatis
<img width="581" height="142" alt="database" src="https://github.com/user-attachments/assets/ace4a69a-af69-49d7-8027-15866a34ff16" />
<img width="733" height="182" alt="migrate" src="https://github.com/user-attachments/assets/b6434303-06d4-4546-96f7-7816f113660b" />

**6. Testing**
- Menjalankan php artisan test
- Workflow akan gagal jika terdapat error
<img width="438" height="77" alt="test" src="https://github.com/user-attachments/assets/66db01f4-6b20-49f4-a4a1-103ef5e9b47e" />

## 🌿 Branching Strategy

Proyek GD Coffee Website menerapkan branching berbasis anggota tim untuk mendukung pembagian tugas dan kolaborasi yang rapi.

### Struktur Branch
**Main** : Branch utama <br>
**Rifo** : Branch pengembangan fitur oleh Muhammad Dzikri Khairrifo <br>
**byan** : Branch pengembangan fitur oleh Muhammad Abyan Alwafi Effendy <br>
**ibrah** : Branch pengembangan konsep & fitur oleh Muhammad Ibrah Adzdzikra

### 🔁 Alur Kerja Development
Setiap anggota tim bekerja mandiri di branch masing-masing yang alurnya <br>
kurang lebih seperti: Branch pribadi → Pull Request → main

**Detail Alurnya**
1. Setiap developer mengerjakan tugas di branch pribadi
2. Perubahan diuji secara lokal
3. Developer membuat Pull Request (PR) ke branch main <br> <br>
   <img width="500" height="337" alt="Screenshot 2026-01-13 034832" src="https://github.com/user-attachments/assets/ae569896-fcf3-4e76-acbd-1e69f37a7199" />

5. GitHub Actions menjalankan CI pipeline <br> <br>
   <img width="510" height="322" alt="Screenshot 2026-01-13 134615" src="https://github.com/user-attachments/assets/0a08e3b7-19eb-4687-a21e-869e58a0ebca" />

7. Jika CI berhasil → PR dapat digabung <br> <br>
   <img width="464" height="272" alt="Screenshot 2026-01-13 035354" src="https://github.com/user-attachments/assets/db3d7d82-64aa-4b0a-a92c-e18d32a3d9ba" />

9. Jika CI gagal → PR ditolak sampai diperbaiki

## 🚀 Continuous Deployment (CD) & Hosting
Project ini menggunakan Railway sebagai platform cloud untuk deployment otomatis yang terbagi menjadi dua alur utama:

### Deployment Staging & Production
Kami menerapkan sistem Automatic Deployment yang terintegrasi langsung dengan GitHub:

1. **Staging/Development :** Setiap perubahan yang dilakukan di branch anggota tim (Rifo, byan, ibrah) <br>
   dapat dipantau melalui preview lokal sebelum digabung ke main.
2. **Production :** Branch main bertindak sebagai lingkungan produksi. Begitu Pull Request (PR) di-merge ke main dan lolos pengujian GitHub Actions, Railway akan mendeteksi perubahan tersebut dan melakukan build ulang secara otomatis.
3. **Zero Downtime :** Railway memastikan aplikasi tetap berjalan selama proses build berlangsung.

### Mekanisme Rollback
Untuk menjaga ketersediaan layanan jika terjadi major bug pada versi terbaru, kami memiliki dua lapis mekanisme rollback:

1. **Rollback via Railway :** Jika deployment terbaru gagal atau memiliki error fatal, tim dapat masuk ke Dashboard Railway, memilih tab Deployments, dan melakukan Rollback ke versi stabil sebelumnya (Success state) hanya dengan satu klik. Ini akan mengembalikan aplikasi ke kondisi kerja terakhir dalam hitungan detik. <br><br>
    
    **Ini berada di Deploy ke #23** <br>
    <img width="430" height="356" alt="image" src="https://github.com/user-attachments/assets/76db9932-bcb0-4aa7-be76-1d27b8941bb1" /> <br>

    Jika klik "Rollback" nanti dia akan kembali ke Deploy #22 <br><br>
    <img width="477" height="414" alt="Screenshot 2026-01-13 225517" src="https://github.com/user-attachments/assets/00f46195-cf2c-4f4f-9cce-035152ece217" /> <br>

3. **Git Revert :** Secara teknis, tim dapat menggunakan perintah git revert pada repository untuk membatalkan commit tertentu dan melakukan push ulang, yang kemudian akan memicu ulang pipeline CI/CD untuk memperbaiki keadaan di server.

## ☕ GD Coffee

GD Coffee berdiri pada **awal tahun 2025** melalui kolaborasi antara **BAZNAS** dan **Pondok Pesantren Luhur Ciganjur**. Inisiatif ini lahir dari semangat **pemberdayaan santri** dalam bidang **UMKM**, khususnya industri kopi, agar mereka dapat mandiri secara ekonomi **tanpa meninggalkan nilai keilmuan dan spiritual pesantren**.

Nama **“GD”** diambil dari inisial **Gus Dur**, sosok kharismatik dan pendiri pesantren, sekaligus simbol **kearifan, keterbukaan, dan kemanusiaan universal**. Nilai-nilai inilah yang menjadi dasar GD Coffee dalam menyajikan kopi terbaik dari tangan santri, dengan semangat **berbagi dan membawa keberkahan**.

---

## 🌿 Visi & Misi

### ☕ Visi
> Menjadi pelopor kopi pesantren yang berdaya saing tinggi, berakar pada nilai-nilai kemanusiaan, keberkahan, dan kemandirian ekonomi santri.

### 🌱 Misi
- Menyajikan produk kopi berkualitas tinggi yang mencerminkan cita rasa nusantara dan nilai pesantren.  
- Memberdayakan santri melalui pelatihan, produksi, dan distribusi kopi.  
- Menjalin kolaborasi dengan lembaga sosial, pemerintah, dan masyarakat untuk memperluas dampak ekonomi umat.  
- Menghadirkan pengalaman ngopi yang tidak sekadar rasa, tetapi juga **makna dan keberkahan**.  
- Menjadi ruang belajar dan tumbuh bagi santri muda yang ingin terjun ke dunia wirausaha.

---

🏡 Nilai-Nilai Utama
- **Kemandirian:** Santri mampu menggerakkan roda ekonomi secara mandiri.  
- **Keberkahan:** Setiap proses produksi dilandasi niat baik dan keberkahan.  
- **Kebersamaan:** Tumbuh bersama masyarakat untuk dampak sosial yang lebih luas.  
- **Kualitas:** Menjaga mutu rasa kopi sebagai bentuk penghargaan pada tanah nusantara.  

---

## 📸 Dokumentasi
> *“Kopi bukan sekadar minuman — ia adalah cerita tentang perjuangan, keberkahan, dan harapan.”*  
<img width="600" height="400" alt="image" src="https://github.com/user-attachments/assets/875b8950-d919-4431-bc17-3cf14c987a06" />

---

✨ **GD Coffee** — Dari Santri, Untuk Negeri.
