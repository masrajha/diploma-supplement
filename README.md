# Diploma Supplement Plugin

Diploma Supplement adalah plugin WordPress yang dirancang untuk menampilkan daftar nama dan tautan file diploma supplement dari Google Drive. Plugin ini menggunakan DataTables untuk menampilkan data dalam tabel yang interaktif, lengkap dengan fitur pencarian, pagination, dan pratinjau dokumen dalam modal.

## Fitur Utama

- **Daftar Nama dan Tautan**: Menampilkan daftar nama mahasiswa bersama tautan ke file diploma supplement mereka.
- **Pratinjau Dokumen**: Dokumen dapat dipratinjau langsung dalam modal tanpa meninggalkan halaman.
- **Interaktif**: Menggunakan DataTables untuk memungkinkan pencarian cepat, pemfilteran, dan pagination.
- **Pengambilan Data dari Google Sheets**: Data diambil dari Google Sheets dengan format CSV.

## Instalasi

1. **Unduh Plugin**: Unduh file zip plugin dari repositori atau situs distribusi.
2. **Unggah ke WordPress**: Masuk ke dashboard WordPress, navigasikan ke "Plugins" > "Add New" > "Upload Plugin", lalu pilih file zip plugin.
3. **Aktifkan Plugin**: Setelah instalasi, klik "Activate" untuk mulai menggunakan plugin.

## Penggunaan

1. **Tambahkan Shortcode**: Gunakan shortcode `[diploma_supplement]` di halaman atau postingan tempat Anda ingin menampilkan daftar diploma supplement.
2. **Konfigurasi Google Sheets**: Pastikan Google Sheet Anda diatur ke mode publik atau dapat diakses oleh siapa saja yang memiliki link. Masukkan ID Sheet dan nama Sheet di file `includes/diploma-supplement-template.php`.

## Pengaturan

Tidak ada pengaturan yang diperlukan untuk plugin ini. Anda hanya perlu memastikan bahwa data di Google Sheets Anda sudah benar dan dapat diakses.

## Kustomisasi

- **CSS**: Anda dapat menyesuaikan tampilan tabel dan modal dengan mengedit file `assets/css/style.css`.
- **JavaScript**: Jika diperlukan, tambahkan atau sesuaikan interaksi dengan mengedit file `assets/js/script.js`.

## FAQ

### Bagaimana cara menambahkan data baru ke dalam daftar?
Tambahkan data baru ke Google Sheets yang terhubung dengan plugin. Data akan secara otomatis diperbarui di situs web Anda.

### Bagaimana cara mengubah URL file Google Sheets?
Edit file `includes/diploma-supplement-template.php` dan masukkan URL baru di bagian `$csv_url`.

## Kontribusi

Kami menyambut kontribusi untuk memperbaiki atau menambah fitur pada plugin ini. Silakan fork repositori dan kirim pull request dengan perubahan Anda.

## Lisensi

Plugin ini dilisensikan di bawah [MIT License](https://opensource.org/licenses/MIT). Anda bebas untuk menggunakan, memodifikasi, dan mendistribusikan plugin ini sesuai dengan ketentuan lisensi.

---

Dibuat oleh Didik Kurniawan
