create database if not exists db_latihan2_web2;

use db_latihan2_web2;

-- Membuat tabel_mahasiswa
create table tabel_mahasiswa (
    nim varchar(15),
    nama varchar(50),
    jurusan varchar(50)
);

-- Menambahkan kolom alamat pada tabel_mahsiswa
alter table tabel_mahasiswa
add column alamat text after jurusan;

-- Mengubah kolom nim menjadi kode_mahasiswa int(11)
alter table tabel_mahasiswa
change column nim kode_mahasiswa int(11);

-- Menambahkan primary key pada kolom kode_mahasiswa (MODIFIKASI tipe data)
alter table tabel_mahasiswa
modify column kode_mahasiswa int(11) not null first;

-- Menambahkan primary key (ADD PRIMARY KEY)
alter table tabel_mahasiswa
add primary key (kode_mahasiswa);

-- Menghapus kolom alamat
alter table tabel_mahasiswa
drop column alamat;

-- Menghapus tabel
drop table tabel_mahasiswa;

-- Membuat relasi antar tabel
    -- Siapkan tabel dosen, matakuliah dan jadwal
    create table tabel_dosen (
        kode_dosen int not null,
        nama_dosen varchar(50),
        tlp varchar(20),
        primary key (kode_dosen)
    );

    create table tabel_matkul (
        kode_matkul int not null,
        nama_matkul varchar(50),
        sks varchar(50),
        primary key (kode_matkul)
    );

    create table tabel_jadwal (
        id int not null auto_increment,
        kode_dosen int not null,
        kode_matkul int not null,
        ruang varchar(15) not null,
        primary key (id)
    );

    -- Membuat kunci tamu/foreign Key fk_dosen pada tabel jadwal
    alter table tabel_jadwal
    add constraint fk_dosen foreign key (kode_dosen) references tabel_dosen(kode_dosen) on delete cascade on update restrict;

    -- Membuat kunci tamu/foreign Key fk_matkul pada tabel jadwal
    alter table tabel_jadwal
    add constraint fk_matkul foreign key (kode_matkul) references tabel_matkul(kode_matkul) on delete cascade on update restrict;

-- Menghapus relasi fk_dosen pada tabel jadwal
alter table tabel_jadwal
drop foreign key fk_dosen;

-- Menghapus relasi fk_matkul pada tabel jadwal
alter table tabel_jadwal
drop foreign key fk_matkul;

-- Menambahkan isi data pada tabel_matkul
insert into tabel_matkul (kode_matkul, nama_matkul, sks) values
(1001, 'Pemrograman Web 1', '3 sks'),
(1002, 'Pemrograman Web 2', '3 sks'),
(1003, 'Pemrograman 1', '3 sks');

-- Menampilkan semua isi data
select * from tabel_matkul;

-- Menampilkan data nama_matkul saja
select nama_matkul from tabel_matkul;

-- Menampilkan data matakuliah yang memiliki sks 3
select * from tabel_matkul where sks = '3 sks';

-- Mengubah isi data
update tabel_matkul
set sks = '2 sks'
where nama_matkul = 'Pemrograman Web 2';

-- Menghapus data
delete from tabel_matkul
where nama_matkul = 'Pemrograman Web 2';


--- FIRST QUERY


-- create database if not exists db_latihan2_web2;

-- use db_latihan2_web2;

-- -- Membuat tabel_mahasiswa
-- create table tabel_mahasiswa (
--     nim varchar(15),
--     nama varchar(50),
--     jurusan varchar(50)
-- );

-- -- Menambahkan kolom alamat pada tabel_mahsiswa
-- alter table db_latihan2, tabel_mahasiswa 
-- add column alamat text after jurusan;

-- -- Mengubah kolom nim menjadi kode_mahasiswa int(11)
-- alter table tabel_mahasiswa 
-- change column nim kode_mahasiswa int(11);

-- -- Menambahkan primary key pada kolom kode_mahasiswa
-- alter table tabel_mahasiswa 
-- modify column kode_mahasiswa int(11) not null first;
-- add primary key (kode_mahasiswa);

-- -- Menghapus kolom alamat
-- alter table tabel_mahasiswa 
-- drop column alamat;

-- -- Menghapus tabel
-- drop table tabel_mahasiswa;

-- -- Membuat relasi antar tabel 
--     -- Siapkan tabel dosen,matakuliah dan jadwal
--     create table tabel_dosen (
--         kode_dosen int not null,
--         nama_dosen varchar(50),
--         tlp varchar(20),
--         primary key (kode_dosen)
--     );
--     create table tabel_matkul (
--         kode_matkul int not null,
--         nama_matkul varchar(50),
--         sks varchar(50),
--         primary key (kode_matkul)
--     );
--     create table tabel_jadwal (
--         id int not null auto_increment,
--         kode_dosen int not null,
--         kode_matkul int not null,
--         ruang varchar(15) not null,
--         primary key (id),
--     );

--     -- Membuat kunci tamu/foreign Key pada tabel jadwal
--     alter table tabel_jadwal
--     add constraint fk_dosen foreign key (kode_dosen) references tabel_dosen(kode_dosen) on delete cascade on update restrict;
--     add constraint fk_matkul foreign key (kode_matkul) references tabel_matkul(kode_matkul) on delete cascade on update restrict;

-- -- Menghapus relasi pada tabel jadwal
-- alter table tabel_jadwal
-- drop foreign key fk_dosen;
-- drop foreign key fk_matkul;

-- -- Menambahkan isi data pada tabel_matakuliah
-- insert into tabel_matakuliah (kode_matkul, nama_matkul, sks) values
-- (1001, 'Pemrograman Web 1', '3 sks'),
-- (1002, 'Pemrograman Web 2', '3 sks'),
-- (1003, 'Pemrograman 1', '3 sks')

-- -- Menampilkan semua isi data menggunakan sql
-- select * from tabel_matakul;

-- -- Menampilkan data nama_kmatkul saja
-- select nama_matkul from tabel_matkul;

-- -- Menampilkan data matakuliah yang memiliki sks 3
-- select * from tabel_matkul where sks = '3 sks';

-- -- Mengubah isi data 
-- update tabel_matkul 
-- set sks = '2 sks' 
-- where nama_matkul = 'Pemrograman Web 2';

-- -- Menghapus data
-- delete from tabel_matkul 
-- where nama_matkul = 'Pemrograman Web 2';
