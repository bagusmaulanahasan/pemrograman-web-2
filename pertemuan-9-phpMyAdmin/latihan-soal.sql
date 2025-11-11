create database if not exists db_penjualan_web2;

use db_penjualan_web2

create table barang (
    id_barang int primary key auto_increment,
    nama_barang varchar(100),
    harga_barang bigint,
    stok int
);

insert into barang (nama_barang, harga_barang, stok) values 
('Case Laptop', 100000, 10),
('Smartphone', 5000000, 20),
('TWS', 200000, 15),
('Keyboard', 150000, 25),
('Mouse', 100000, 30);

create table penjualan (
    id_transaksi int primary key auto_increment,
    id_barang int,
    jumlah int,
    kasir varchar(100),
    foreign key (id_barang) references barang(id_barang) on delete restrict on update restrict
);

insert into penjualan (id_barang, jumlah, kasir) values 
(1, 2, 'Hidayat'),
(2, 1, 'Andi'),
(3, 3, 'Siswanto'),
(4, 2, 'Lyla'),
(5, 1, 'Shinta');

