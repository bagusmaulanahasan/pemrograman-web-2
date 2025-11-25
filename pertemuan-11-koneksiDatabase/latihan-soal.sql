. Masih menggunakan database sebelumnya (lat_dbase) buatlah tabel dengan
nama tblnilai, dengan field sebagai berikut :
nim varchar(9) PK
nama_mhs varchar(30)
matakuliah varchar(20)
uts float(5,2)
uas float(5,2)
tugas float(5,2)
jmlhadir int(2)
2. Buatlah form untuk mengisi data (isi 5 record)
3. Lakukan proses untuk mencari nilai akhir dan grade
4. Tampilkan record yang terdiri dari nim, nama, matakuliah, nilai kehadiran, tugas,
uts, uas, nilai akhir dan grade, urutkan berdasarkan nilai akhir tertinggi 

use db_lat_dbase_web2;
create table tblnilai (
    nim varchar(9) primary key,
    nama_mhs varchar(30),
    matakuliah varchar(20),
    uts float(5,2),
    uas float(5,2),
    tugas float(5,2),
    jmlhadir int(2)
);

