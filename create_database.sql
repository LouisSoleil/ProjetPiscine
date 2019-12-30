CREATE DATABASE piscine;

CREATE TABLE piscine.Groupe(
        NumGroupe     Int NOT NULL ,
        LibelleGroupe Varchar (50) NOT NULL
	,CONSTRAINT Groupe_PK PRIMARY KEY (NumGroupe)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE piscine.Classe(
        IdClasse      Int NOT NULL AUTO_INCREMENT,
        LibelleClasse Varchar (5) NOT NULL ,
        Annee         Int NOT NULL
	,CONSTRAINT Classe_PK PRIMARY KEY (IdClasse)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE piscine.Personne (
	codeINE varchar(11) NOT NULL,
	nom varchar(50) NOT NULL,
	prenom varchar(50) NOT NULL,
	email varchar(50) NOT NULL,
	mdp varchar(255) NOT NULL,
	NumGroupe int(11) DEFAULT NULL,
	IdClasse int(11) DEFAULT NULL,
	PRIMARY KEY (codeINE),
	KEY Personne_Groupe_FK (NumGroupe),
	KEY Personne_Classe0_FK (IdClasse),
	CONSTRAINT Personne_Classe0_FK FOREIGN KEY (IdClasse) REFERENCES classe (IdClasse),
	CONSTRAINT Personne_Groupe_FK FOREIGN KEY (NumGroupe) REFERENCES groupe (NumGroupe)
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE piscine.Toeic (
	IdTOEIC int(11) NOT NULL AUTO_INCREMENT,
	LibelleTOEIC varchar(50) NOT NULL,
	estVisible tinyint(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (IdTOEIC)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8


CREATE TABLE piscine.souspartie(
        IdTOEIC       Int NOT NULL ,
        IdPartie      Int NOT NULL ,
        LibellePartie Varchar (50) NOT NULL ,
        Type          Varchar (50) NOT NULL
	,CONSTRAINT souspartie_PK PRIMARY KEY (IdTOEIC,IdPartie)

	,CONSTRAINT souspartie_TOEIC_FK FOREIGN KEY (IdTOEIC) REFERENCES TOEIC(IdTOEIC)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE piscine.Question(
        IdQuestion   Int NOT NULL,
        ReponseJuste Char (1) NOT NULL ,
        IdTOEIC      Int NOT NULL ,
        IdPartie     Int NOT NULL
	,CONSTRAINT Question_PK PRIMARY KEY (IdQuestion, IdTOEIC)

	,CONSTRAINT Question_souspartie_FK FOREIGN KEY (IdTOEIC,IdPartie) REFERENCES souspartie(IdTOEIC,IdPartie)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE piscine.Repondre (
	codeINE varchar(11) NOT NULL,
	`date` datetime NOT NULL,
	IdTOEIC int(11) NOT NULL,
	IdPartie int(11) NOT NULL,
	score int(11) NOT NULL,
	PRIMARY KEY (codeINE,`date`,IdTOEIC,IdPartie),
	KEY repondre_souspartie1_FK (IdTOEIC,`IdPartie),
	CONSTRAINT repondre_Personne_FK FOREIGN KEY (codeINE) REFERENCES personne (codeINE),
	CONSTRAINT repondre_souspartie1_FK FOREIGN KEY (IdTOEIC, IdPartie) REFERENCES souspartie (IdTOEIC, IdPartie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

CREATE TABLE piscine.Score (
 idQuestion int(11) NOT NULL,
 valeur int(11) NOT NULL,
 PRIMARY KEY (idQuestion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8




