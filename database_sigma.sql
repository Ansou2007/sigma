DROP DATABASE IF EXISTS sigma;

CREATE DATABASE  IF NOT EXISTS sigma;

USE sigma;

/*POLE DE L'UTILISATEUR--*/
CREATE TABLE pole(
id int PRIMARY KEY  auto_increment,
code varchar(20),
designation varchar(250)
)ENGINE=InnoDB DEFAULT charset=utf8;
/*--COHORTE DE L'UTILISATEUR S'IL DOIT AJOUTER SON MEMOIRE--*/
CREATE TABLE cohorte(
id int primary key auto_increment,
nom_cohorte varchar(100)
)ENGINE=InnoDB DEFAULT charset=utf8;
/*--FILIERE DE L'UTILISATEUR--*/
CREATE TABLE filiere(
id int primary key auto_increment ,
id_pole int,
code varchar(20),
designation varchar(150)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE filiere ADD CONSTRAINT Fk_filiere_pole FOREIGN KEY(id_pole) REFERENCES pole(id)
ON UPDATE CASCADE;

/*--UTLISATEUR DE LA BASE-- */
CREATE TABLE utilisateur(
id int primary key auto_increment,
id_filiere int,
nom_complet varchar(150),
email varchar(100),
mot_pass varchar(250),
role varchar(20),
etat varchar(1)
)ENGINE=InnoDB DEFAULT charset=utf8;
/*ALTER TABLE utilisateur ADD CONSTRAINT Fk_pole_utili FOREIGN KEY(id_pole) REFERENCES pole(id) ON DELETE CASCADE ON UPDATE CASCADE;*/
ALTER TABLE utilisateur ADD CONSTRAINT Fk_filiere_utili FOREIGN KEY(id_filiere) REFERENCES filiere(id) 
ON UPDATE CASCADE;

/*-- TEMOIGNAGE---*/
CREATE TABLE temoignage(
id int primary key auto_increment,
id_utilisateur int,
libelle varchar(255)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE temoignage ADD CONSTRAINT fk_tem_ut FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
ON UPDATE CASCADE;



/*--ANNEE ACADEMIQUE DE L'UTILISATEUR--*/
CREATE TABLE annee_academique(
id int primary key auto_increment,
annee varchar(10),
annee_scolaire varchar(25)
)ENGINE=InnoDB DEFAULT charset=utf8;

/*--TABLE CONTENANT LA LISTE DES MEMOIRES--*/
CREATE TABLE memoire(
id int primary key auto_increment,
id_utilisateur int
nom_archive varchar(250),
date_archivage DATE,
sujet varchar(250),
fichier varchar(250),
auteur varchar(250),
createur varchar(250),
mots_cles varchar(250)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE memoire Fk_memoire_utili ADD CONSTRAINT FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id) 
ON UPDATE CASCADE;

CREATE TABLE journal(
id int auto_increment primary key,
id_utilisateur int,
date_journal datetime,
libelle varchar(150)
)ENGINE=InnoDB DEFAULT charset=utf8;
ALTER TABLE journal ADD CONSTRAINT fk_jour_util FOREIGN KEY(id_utilisateur) REFERENCES utilisateur(id)
ON UPDATE CASCADE;
