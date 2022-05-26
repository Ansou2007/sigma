DROP DATABASE IF EXISTS sigma;

CREATE DATABASE  IF NOT EXISTS sigma;

USE sigma;

/*POLE OU DEPARTEMENT DE L'UTILISATEUR--
drop table if exists pole;
CREATE TABLE pole(
id int PRIMARY KEY  auto_increment,
code varchar(20),
designation varchar(250)
)ENGINE=InnoDB DEFAULT charset=utf8;*/

/*CATEGORIE DU MEMOIRE*/
drop table if exists categorie;
CREATE TABLE categorie(
id int PRIMARY KEY  auto_increment,
nom_categorie varchar(250)
)ENGINE=InnoDB DEFAULT charset=utf8;

/*--FILIERE DE L'UTILISATEUR--*/
drop table if exists filiere;
CREATE TABLE filiere(
id int primary key auto_increment ,
id_pole int,
code varchar(20),
designation varchar(150)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE filiere ADD CONSTRAINT Fk_filiere_pole FOREIGN KEY(id_pole) REFERENCES pole(id)
ON UPDATE CASCADE;



/*--UTLISATEUR ET --PROFIL---*/
drop table if exists utilisateur;
CREATE TABLE utilisateur(
id int primary key auto_increment,
id_filiere int,
id_profil int,
token varchar(150),
nom_complet varchar(150),
email varchar(100),
mot_pass varchar(250),
role varchar(20),
date_naissance date DEFAULT NULL,
lieu_naissance varchar(150) DEFAULT NULL,
universite varchar(250) DEFAULT NULL,
photo longblob,
sexe varchar(8) DEFAULT NULL,
etat int(1)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE utilisateur ADD CONSTRAINT Fk_filiere_utili FOREIGN KEY(id_filiere) REFERENCES filiere(id) 
ON UPDATE CASCADE;



/*-- TEMOIGNAGE---*/
drop table if exists temoignage;
CREATE TABLE temoignage(
id int primary key auto_increment,
id_utilisateur int,
libelle varchar(255),
date_publication datetime,
approbation varchar(3)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE temoignage ADD CONSTRAINT fk_tem_ut FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
ON UPDATE CASCADE;



/*--ANNEE ACADEMIQUE DE L'UTILISATEUR--*/
drop table if exists annee_academique;

CREATE TABLE annee_academique(
id int primary key auto_increment,
annee varchar(10),
annee_scolaire varchar(25)
)ENGINE=InnoDB DEFAULT charset=utf8;

/*--TABLE CONTENANT LA LISTE DES MEMOIRES--*/
drop table if exists memoire;
CREATE TABLE memoire(
id int primary key auto_increment,
id_utilisateur int,
numero_depot varchar(150),
categorie varchar(250),
date_memoire DATE,
sujet varchar(250),
lien_memoire varchar(150),
auteur varchar(250),
mots_cles varchar(250),
autorisation int(1)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE memoire ADD CONSTRAINT Fk_memoire_utili  FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id) 
ON UPDATE CASCADE;

/* JOURNAL D'ACTIVITE*/
drop table if exists journal;
CREATE TABLE journal(
id int auto_increment primary key,
id_utilisateur int,
date_journal datetime,
libelle varchar(150)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE journal ADD CONSTRAINT fk_jour_util FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
ON UPDATE CASCADE;
/* MESSAGE */
drop table if exists message;
CREATE TABLE message(
id int primary key auto_increment,
id_destinataire int,
auteur varchar(150),
message text,
date_message datetime)ENGINE=InnoDB DEFAULT charset=latin1;
ALTER TABLE message  ADD CONSTRAINT fk_messa_uti FOREIGN KEY(id_destinataire) REFERENCES utilisateur(id);
