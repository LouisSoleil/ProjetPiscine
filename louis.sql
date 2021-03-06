CREATE TABLE Classe(
        IdClasse      Int NOT NULL AUTO_INCREMENT,
        LibelleClasse Varchar (5) NOT NULL ,
        Annee         Int NOT NULL
	,CONSTRAINT Classe_PK PRIMARY KEY (IdClasse)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE personne (
	codeINE varchar(11) NOT NULL,
	nom varchar(255) NOT NULL,
	prenom varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	mdp varchar(255) NOT NULL,
	NumGroupe int(11) DEFAULT NULL,
	IdClasse int(11) DEFAULT NULL,
	PRIMARY KEY (codeINE),
 KEY Personne_Classe0_FK (IdClasse),
 CONSTRAINT Personne_Classe0_FK FOREIGN KEY (IdClasse) REFERENCES classe (IdClasse)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Toeic (
	IdTOEIC int(11) NOT NULL AUTO_INCREMENT,
	LibelleTOEIC varchar(255) NOT NULL,
	estVisible tinyint(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (IdTOEIC)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


CREATE TABLE souspartie(
        IdTOEIC       Int NOT NULL ,
        IdPartie      Int NOT NULL ,
        `Type`        Varchar (255) NOT NULL
	,CONSTRAINT souspartie_PK PRIMARY KEY (IdTOEIC,IdPartie)

	,CONSTRAINT souspartie_TOEIC_FK FOREIGN KEY (IdTOEIC) REFERENCES TOEIC(IdTOEIC)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Question(
        IdQuestion   Int NOT NULL,
        ReponseJuste Char (1) NOT NULL ,
        IdTOEIC      Int NOT NULL ,
        IdPartie     Int NOT NULL
	,CONSTRAINT Question_PK PRIMARY KEY (IdQuestion, IdTOEIC)

	,CONSTRAINT Question_souspartie_FK FOREIGN KEY (IdTOEIC,IdPartie) REFERENCES souspartie(IdTOEIC,IdPartie)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE Repondre (
	codeINE varchar(11) NOT NULL,
	`date` datetime NOT NULL,
	IdTOEIC int(11) NOT NULL,
	IdPartie int(11) NOT NULL,
	score int(11) NOT NULL,
	PRIMARY KEY (codeINE,`date`,IdTOEIC,IdPartie),
	KEY repondre_souspartie1_FK (IdTOEIC,IdPartie),
	CONSTRAINT repondre_Personne_FK FOREIGN KEY (codeINE) REFERENCES personne (codeINE),
	CONSTRAINT repondre_souspartie1_FK FOREIGN KEY (IdTOEIC, IdPartie) REFERENCES souspartie (IdTOEIC, IdPartie)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `score` (
 `idPartie` int(11) NOT NULL,
 `idQuestion` int(11) NOT NULL,
 `valeur` int(11) NOT NULL,
 PRIMARY KEY (`idPartie`,`idQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,0,0);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,1,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,2,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,3,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,4,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,5,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,6,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,7,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,8,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,9,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,10,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,11,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,12,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,13,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,14,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,15,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,16,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,17,10);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,18,15);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,19,20);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,20,25);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,21,30);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,22,35);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,23,40);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,24,45);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,25,50);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,26,55);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,27,60);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,28,70);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,29,80);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,30,85);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,31,90);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,32,95);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,33,100);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,34,105);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,35,115);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,36,125);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,37,135);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,38,140);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,39,150);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,40,160);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,41,170);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,42,175);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,43,180);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,44,190);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,45,200);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,46,205);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,47,215);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,48,220);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,49,225);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,50,230);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,51,235);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,52,245);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,53,255);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,54,260);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,55,265);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,56,275);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,57,285);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,58,290);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,59,295);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,60,300);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,61,310);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,62,320);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,63,325);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,64,330);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,65,335);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,66,340);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,67,345);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,68,350);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,69,355);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,70,360);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,71,365);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,72,370);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,73,375);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,74,385);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,75,395);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,76,400);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,77,405);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,78,415);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,79,420);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,80,425);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,81,430);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,82,435);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,83,440);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,84,445);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,85,450);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,86,455);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,87,460);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,88,465);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,89,475);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,90,480);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,91,485);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,92,490);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,93,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,94,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,95,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,96,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,97,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,98,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,99,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (1,100,495);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,0,0);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,1,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,2,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,3,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,4,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,5,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,6,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,7,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,8,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,9,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,10,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,11,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,12,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,13,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,14,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,15,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,16,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,17,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,18,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,19,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,20,5);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,21,10);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,22,15);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,23,20);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,24,25);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,25,30);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,26,35);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,27,40);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,28,45);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,29,55);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,30,60);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,31,65);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,32,70);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,33,75);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,34,80);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,35,85);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,36,90);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,37,95);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,38,105);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,39,115);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,40,120);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,41,125);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,42,130);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,43,135);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,44,140);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,45,145);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,46,155);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,47,160);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,48,170);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,49,175);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,50,185);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,51,195);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,52,205);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,53,210);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,54,215);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,55,220);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,56,230);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,57,240);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,58,245);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,59,250);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,60,255);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,61,260);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,62,265);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,63,270);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,64,275);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,65,280);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,66,285);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,67,290);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,68,295);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,69,300);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,70,310);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,71,315);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,72,320);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,73,325);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,74,330);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,75,335);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,76,340);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,77,345);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,78,355);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,79,360);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,80,370);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,81,375);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,82,385);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,83,390);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,84,395);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,85,400);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,86,405);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,87,415);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,88,420);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,89,425);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,90,435);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,91,440);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,92,450);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,93,455);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,94,460);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,95,470);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,96,475);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,97,485);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,98,485);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,99,490);
INSERT INTO score (idPartie, idQuestion,valeur) VALUES (2,100,495);

INSERT INTO classe (libelleClasse,annee) VALUES ('IG',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('IG',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('IG',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('GBA',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('GBA',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('GBA',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('MEA',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('MEA',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('MEA',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('MI',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('MI',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('MI',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('MAT',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('MAT',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('MAT',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('STE',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('STE',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('STE',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('MSI',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('MSI',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('MSI',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('SE',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('SE',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('SE',5);
INSERT INTO classe (libelleClasse,annee) VALUES ('EGC',3);
INSERT INTO classe (libelleClasse,annee) VALUES ('EGC',4);
INSERT INTO classe (libelleClasse,annee) VALUES ('EGC',5);



