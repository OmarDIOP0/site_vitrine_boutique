CREATE DATABASE vente;
USE vente;
CREATE TABLE clients(
     id_client int primary ky not null auto_increment,
     prenom varchar(30),
     nom varchar(30),
     adresse varchar(50),
     password varchar(30),
     number char(9);
)