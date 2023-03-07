Drop database if exists siteBloc1;
CREATE DATABASE siteBloc1 character set latin1 collate latin1_general_ci;
USE siteBloc1;

SET default_storage_engine=InnoDb;

CREATE TABLE vendeur
(
    id int primary key auto_increment,
    descriptifVendeur varchar(500),
    nom varchar(20) NOT NULL,
    prenom varchar(20) NOT NULL
); 

Insert into vendeur(descriptifVendeur, nom, prenom) values ('Bonjour je m''appelle test','Le','test');

CREATE TABLE categorie
(
    id int primary key auto_increment,
    nom varchar(20) NOT NULL
);

Insert into categorie(nom) values ('Jouet'),('Status'),('Deco'),('Outils'),('Divers');

CREATE TABLE produit
(
    id int primary key auto_increment,
    nom varchar(20) NOT NULL,
    typeDeBois varchar(20) NOT NULL,
    idVendeur int,
    idCategorie int,
	FOREIGN KEY (idVendeur) REFERENCES vendeur (id),
    FOREIGN KEY (idCategorie) REFERENCES categorie (id)
    );
    
Insert into produit(nom, typeDeBois, idVendeur, idCategorie) values ('test','chêne',1,1), ('deco','bouleau',1,1);