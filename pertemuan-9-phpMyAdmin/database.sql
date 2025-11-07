create database if not exists db_latihan_web2;

create table mahasiswa (
    mhsid int primary key auto_increment,
    nama varchar(25),
    mata_kuliah varchar(20),
    niai_tugas float,
    niai_uts float,
    niai_uas float
);

insert into mahasiswa (nama, mata_kuliah, niai_tugas, niai_uts, niai_uas) values ('Jokoh', 'Pemrograman Web 2', 80, 80, 80);

create table user (
    id int primary key auto_increment,
    username varchar(255),
    password varchar(255)
);

insert into user (username, password) values ('admin', '123');

create table mata_kuliah (
    kode_matkul varchar(255) primary key,
    nama_matkul varchar(255),
    sks int
);

insert into mata_kuliah (kode_matkul, nama_matkul, sks) values (2001, 'Pemrograman Web 2', 3);

create table dosen (
    kode_dosen varchar(255) primary key,
    nama_dosen varchar(255),
    jenis_kelamin varchar(255),
    alamat varchar(255),
    telepon varchar(255)
);

insert into dosen (kode_dosen, nama_dosen, jenis_kelamin, alamat, telepon) values ('D001', 'Susilo', 'Laki-laki', 'Jl. A', '08123456789');

-- create table mahasiswa_matkul_dosen (
--     id int primary key auto_increment,
--     kode_matkul varchar(255),
--     kode_dosen varchar(255),
--     mhsid int,
--     foreign key (kode_matkul) references mata_kuliah(kode_matkul),
--     foreign key (kode_dosen) references dosen(kode_dosen),
--     foreign key (mhsid) references mahasiswa(mhsid)
-- );