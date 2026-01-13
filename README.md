# ☕ GD COFFE

---

**NAMA TEAM:** GD COFFE <br>
**NAMA PROJECT:** GD COFFE WEBSITE <br>
**JENIS BISNIS:** F&B

---

## 👥 Anggota Tim
| Nama Lengkap | NIM | Tugas |
|---------------|-----|--------|
| Muhammad Ibrah Adzdzikra | 2310120010 | Business & Konsep Utama |
| Muhammad Abyan Alwafi Effendy | 2310120024 | Developer / CI-CD Workflows |
| Muhammad Dzikri Khairrifo | 2310120025 | Developer / Frontend |

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

#### ⚙️ Tahapan Workflow CI

**1. Checkout Source Code**
- Mengambil kode dari repository GitHub

**2. Setup Environment**
- PHP 8.2
- Extension Laravel yang dibutuhkan

**3. Install Dependency**
- Menggunakan Composer

**4. Konfigurasi Environment**
- Generate file .env
- Generate application key

**5. Database Testing**
- Menggunakan SQLite untuk environment CI
- Menjalankan migration otomatis

**6. Testing**
- Menjalankan php artisan test
- Workflow akan gagal jika terdapat error

## ☕ GD Coffee

GD Coffee berdiri pada **awal tahun 2025** melalui kolaborasi antara **BAZNAS** dan **Pondok Pesantren Luhur Ciganjur**.  
Inisiatif ini lahir dari semangat **pemberdayaan santri** dalam bidang **UMKM**, khususnya industri kopi,  
agar mereka dapat mandiri secara ekonomi **tanpa meninggalkan nilai keilmuan dan spiritual pesantren**.

Nama **“GD”** diambil dari inisial **Gus Dur**, sosok kharismatik dan pendiri pesantren,  
sekaligus simbol **kearifan, keterbukaan, dan kemanusiaan universal**.  
Nilai-nilai inilah yang menjadi dasar GD Coffee dalam menyajikan kopi terbaik dari tangan santri,  
dengan semangat **berbagi dan membawa keberkahan**.

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
