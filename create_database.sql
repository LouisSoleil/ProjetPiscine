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


CREATE TABLE piscine.Personne(
        codeINE   Varchar (50) NOT NULL ,
        nom       Varchar (50) NOT NULL ,
        prenom    Varchar (50) NOT NULL ,
        email     Varchar (50) NOT NULL ,
        mdp       Varchar (50) NOT NULL ,
        NumGroupe Int NOT NULL ,
        IdClasse  Int NOT NULL
	,CONSTRAINT Personne_PK PRIMARY KEY (codeINE)

	,CONSTRAINT Personne_Groupe_FK FOREIGN KEY (NumGroupe) REFERENCES Groupe(NumGroupe)
	,CONSTRAINT Personne_Classe0_FK FOREIGN KEY (IdClasse) REFERENCES Classe(IdClasse)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE piscine.TOEIC(
        IdTOEIC      Int NOT NULL AUTO_INCREMENT,
        LibelleTOEIC Varchar (50) NOT NULL
	,CONSTRAINT TOEIC_PK PRIMARY KEY (IdTOEIC)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


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


CREATE TABLE piscine.repondre(
        codeINE  Varchar(50) NOT NULL ,
        date     Date NOT NULL ,
        IdTOEIC  Int NOT NULL ,
        IdPartie Int NOT NULL ,
        score    Int NOT NULL
	,CONSTRAINT repondre_PK PRIMARY KEY (codeINE,date,IdTOEIC,IdPartie)

	,CONSTRAINT repondre_Personne_FK FOREIGN KEY (codeINE) REFERENCES Personne(codeINE)
	,CONSTRAINT repondre_souspartie1_FK FOREIGN KEY (IdTOEIC,IdPartie) REFERENCES souspartie(IdTOEIC,IdPartie)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

