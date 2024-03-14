<p align="center">
Sekilas tentang aplikas ini
</p>
<p align="justify">
1. Aplikasi Simpel Penyewaan Mobil <br>
2. Laravel versi 8.75 (Laravel 8), PHP versi 7 (PHP 7.4.33), MySQL versi 8 <br>
3. User perlu melakukan registrasi agar dapat melakukan login <br>
4. Ada user default (sebagai pemilik) dengan menggunakan email <b>pemilik@akuntes.com</b> <br>
5. Ada user default (sebagai penyewa) dengan menggunakan email <b>fikri@akuntes.com</b> <br>
6. Default password untuk 2 user di nomor 3 & 4 adalah <b>123456</b> <br>
7. Pemilik dapat melihat, membuat, serta mengubah data mobil. Namun tidak dapat menghapus data mobil karena data master tidak boleh dihapus. <br>
8. Penyewa dapat melihat mobil yang tersedia dan melakukan penyewaan.
</p>
<br><br>
<p align="center">
Cara instalasi
</p>
<br>
<p align="justify">
1. Setelah penarikan github, untuk import data gunakan file database .sql dengan nama db_transindo_test.sql <br>
2. Copy .env.example dan paste-kan dengan mengganti nama menjadi .env <br>
3. Ubah isi .env pada kolom <b>DB_DATABASE</b> dengan nama database (<b>db_transindo_test</b>) <br>
4. Lalu generate kunci aplikasi dengan menggunakan perintah <b>php artisan key:generate</b> pada command line dan pada direktori utama aplikasi <br>
5. Lalu update library Laravel dengan menggunakan perintah <b>composer update</b>, pastikan versi PHP menggunakan versi 7 (pada saat aplikasi ini dibuat, PHP menggunakan versi 7.4.33)
</p>
<br><br>
<p align="center">
Alur aplikasi
</p>
<p align="justify">
1. Penyewa memilih mobil yang ingin di sewa dan menentukan tanggal mulai serta akhir dari penyewaan <br>
2. Pemilik mengkonfirmasi pesanan sewa tersebut <br>
3. (Asumsi) penyewa datang ketempat untuk menyewa mobil <br>
4. Setelah digunakan, saat penyewa menggunakan mobil, sistem akan mengkalkulasi secara otomatis (termasuk perhitungan denda) <br>
5. Penyewa harus mengkonfirmasi plat nomor mobil untuk mengembalikan mobil tersebut melalui aplikasi ini <br>
</p>
