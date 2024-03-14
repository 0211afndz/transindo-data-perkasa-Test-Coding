DROP DATABASE db_transindo_test;

CREATE DATABASE db_transindo_test;

USE db_transindo_test;

CREATE TABLE tuser (iduser INT AUTO_INCREMENT PRIMARY KEY, nama_user VARCHAR(100), alamat_user VARCHAR(300),
no_telp VARCHAR(15), no_sim VARCHAR(50), email VARCHAR(300), `password` VARCHAR(300), stat INT, user_level INT);

CREATE TABLE tmobil (idmobil INT AUTO_INCREMENT PRIMARY KEY, merek VARCHAR(100), model VARCHAR(100), no_plat VARCHAR(10),
harga_sewa_harian FLOAT, status_mobil INT);

CREATE TABLE tpenyewaan (idpenyewaan INT AUTO_INCREMENT PRIMARY KEY, tgl_pesan DATE, tgl_mulai DATE, jam_mulai TIME, tgl_akhir DATE, jam_akhir TIME,
jumlah_hari INT, tgl_pengembalian DATE, jam_pengembalian TIME, denda FLOAT, total_biaya FLOAT, idmobil INT, iduser INT, status_penyewaan INT);

INSERT INTO tmobil (merek, model, no_plat, harga_sewa_harian, status_mobil)
VALUES ('Toyota', 'Innova', 'D 1234 DD', '350000', 1);
INSERT INTO tmobil (merek, model, no_plat, harga_sewa_harian, status_mobil)
VALUES ('Toyota', 'Avanza', 'D 4567 DDA', '125000', 1);

INSERT INTO tuser (nama_user, alamat_user, no_telp, no_sim, email, `password`, stat, user_level)
VALUES ('Pemilik','Bandung','08123456789','987876765654543432','pemilik@akuntes.com',
'$2a$12$M6zkmP.EEP65RiFcwR6iGeEOlAMzPL8VAK.amBIbPmjmszFHH63WK',1,1);

INSERT INTO tuser (nama_user, alamat_user, no_telp, no_sim, email, `password`, stat, user_level)
VALUES ('Fikri','Bandung','08123456789','987876765654543432','fikri@akuntes.com',
'$2a$12$M6zkmP.EEP65RiFcwR6iGeEOlAMzPL8VAK.amBIbPmjmszFHH63WK',1,2);