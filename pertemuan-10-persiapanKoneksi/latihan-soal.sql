
-- 1. Buka phpmyadmin, buat basis data baru lat_dbase
create database if not exists db_lat_dbase_web2;
use db_lat_dbase_web2;

-- 2. Buat tabel beri nama tblmhs yang terdiri dari :
create table tblmhs (
    nim int(9) auto_increment primary key,
    nama_awal varchar(20),
    nama_akhir varchar(30),
    tgl_lahir date,
    umur int(2)
);

-- 3. Masukkan 5 record
insert into tblmhs (nama_awal, nama_akhir, tgl_lahir, umur) values 
('Andi', 'Setya', '1999-01-05', 26),
('Budi', 'Armagedon', '2003-01-01', 22),
('Cici', 'Angelina', '2008-09-05', 17),
('Dedi', 'Nasution', '2005-10-11', 20),
('Eka', 'Setiawan', '2004-04-17', 21);

-- 4. Lakukan editing field atau record
update tblmhs
set nama_awal = 'Anton'
where nama_awal = 'Andi';