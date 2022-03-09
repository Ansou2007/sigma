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

/*--UTLISATEUR DE LA BASE-- */
drop table if exists utilisateur;
CREATE TABLE utilisateur(
id int primary key auto_increment,
id_filiere int,
token varchar(150),
nom_complet varchar(150),
email varchar(100),
mot_pass varchar(250),
role varchar(20),
etat int
)ENGINE=InnoDB DEFAULT charset=utf8;
/*ALTER TABLE utilisateur ADD CONSTRAINT Fk_pole_utili FOREIGN KEY(id_pole) REFERENCES pole(id) ON DELETE CASCADE ON UPDATE CASCADE;*/
ALTER TABLE utilisateur ADD CONSTRAINT Fk_filiere_utili FOREIGN KEY(id_filiere) REFERENCES filiere(id) 
ON UPDATE CASCADE;

/*--PROFIL---*/
drop table if exists profil;
CREATE TABLE profil(
id int primary key auto_increment,
universite varchar(250),
photo blob,
situation_matrimonial varchar(45),
sexe varchar(8)
)ENGINE=InnoDB DEFAULT charset=utf8;

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
mots_cles varchar(250)
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
