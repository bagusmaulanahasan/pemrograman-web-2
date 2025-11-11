create database if not exists db_latihan_web2;

use db_latihan_web2;

-- create table mahasiswa (
--     mhsid int primary key auto_increment,
--     nama varchar(100),
--     mata_kuliah varchar(100),
--     niai_tugas float,
--     niai_uts float,
--     niai_uas float
-- );

-- insert into mahasiswa (nama, mata_kuliah, niai_tugas, niai_uts, niai_uas) values ('Jokoh', 'Pemrograman Web 2', 80, 80, 80);

create table user (
    id int primary key auto_increment,
    username varchar(255),
    password varchar(255)
);

insert into user (username, password) values ('admin', '12345678');

create table mata_kuliah (
    kode_matkul varchar(255) primary key,
    nama_matkul varchar(100),
    sks int
);

insert into mata_kuliah (kode_matkul, nama_matkul, sks) values (2001, 'Pemrograman Web 2', 3);

create table dosen (
    kode_dosen varchar(255) primary key,
    nama_dosen varchar(100),
    jenis_kelamin varchar(1),
    alamat text,
    telepon varchar(15)
);

insert into dosen (kode_dosen, nama_dosen, jenis_kelamin, alamat, telepon) values ('D001', 'Susilo', 'L', 'Jl. Ahmad Yani', '08123456789');

-- Membuat relasi antara tabel_matakuliah, tabel_jadwal dan tabel_dosen
create table jadwal (
    id int auto_increment primary key,
    kode_matkul varchar(255),
    kode_dosen varchar(255),
    hari varchar(15),
    jam varchar(15),
    foreign key (kode_matkul) references mata_kuliah(kode_matkul) on delete restrict on update restrict,
    foreign key (kode_dosen) references dosen(kode_dosen) on delete restrict on update restrict
);

insert into jadwal (kode_matkul, kode_dosen, hari, jam) values ('2001', 'D001', 'Senin', '07:40 - 09:00');

create table mahasiswa (
    nim varchar(12) primary key,
    nama_mhs varchar(100),
    jenis_kelamin varchar(1),
    alamat text,
    jurusan varchar(100)
);

insert into mahasiswa (nim, nama_mhs, jenis_kelamin, alamat, jurusan) values ('221011400211', 'Siswanto', 'L', 'Jl. H Mugini No. 12 Jakarta Selatan', 'IT');

create table semester (
    kode_semeser varchar(20) primary key,
    semester varchar(20),
    status int(11)
);

insert into semester (kode_semeser, semester, status) values ('20211', 'Ganjil 2021/2022', 1);

-- Membuat relasi antara tabel_mahasiswa, tabel_semester, tabel_jadwal dan
-- tabel_krs
create table krs (
    id int primary key auto_increment,
    nim varchar(12),
    id_jadwal int,
    kode_semeser varchar(20),
    foreign key (nim) references mahasiswa(nim) on delete restrict on update restrict,
    foreign key (id_jadwal) references jadwal(id) on delete restrict on update restrict,
    foreign key (kode_semeser) references semester(kode_semeser) on delete restrict on update restrict
);

insert into krs (nim, id_jadwal, kode_semeser) values ('221011400211', 1, '20211');