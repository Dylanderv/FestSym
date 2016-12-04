------------------------------------------------------------
--      Script MySQL.
------------------------------------------------------------


------------------------------------------------------------
-- Table: Utilisateur
------------------------------------------------------------

CREATE TABLE Utilisateur(
        IdUtilisateur integer PRIMARY KEY AUTOINCREMENT,
        Adresse_mail Varchar (255) NOT NULL UNIQUE,
        Mot_de_passe Varchar (42) NOT NULL,
        Nom          Varchar (255) ,
        Prenom       Varchar (255) ,
        Date_Naissance    date NOT NULL,
        Adresse      Varchar (255)
        --PRIMARY KEY (IdUtilisateur )
)----ENGINE=InnoDB;
;


--------------------------------------------------------------
-- Table: Utilisateur professionnel
--------------------------------------------------------------

CREATE TABLE Utilisateur_professionnel(
        IdProfessionnel     integer PRIMARY KEY AUTOINCREMENT,
        Mot_de_passe        Varchar (255) NOT NULL ,
        Adresse             Varchar (255) NOT NULL ,
        Numero_de_telephone Varchar (14) ,
        Nom_Societe         Varchar (255) NOT NULL ,
        Date_Creation       Date NOT NULL ,
        Adresse_mail        Varchar (255) NOT NULL
)--ENGINE=InnoDB;
;
--Image varchar(255),
--------------------------------------------------------------
-- Table: Soirée
--------------------------------------------------------------

CREATE TABLE Soiree(
        IdSoiree  integer PRIMARY KEY AUTOINCREMENT,
        Nom           Varchar (255) ,
        Adresse       Varchar (255) NOT NULL ,
        Prix          numeric(9) ,
        Type          Varchar (255) ,
        Description varchar(1000),
        Date_Creation Date NOT NULL ,
        Date_Soiree date NOT NULL,
        Prix_Pers numeric(9),
        Adresse_mail  Varchar (255)
          CONSTRAINT FK_Soiree_Adresse_mail
          REFERENCES Utilisateur(Adresse_mail)
)--ENGINE=InnoDB;
;

--------------------------------------------------------------
-- Table: Offres
--------------------------------------------------------------

CREATE TABLE Offre(
        IdOffre        integer PRIMARY KEY AUTOINCREMENT,
        Type            Varchar (255) ,
        Prix            numeric(9) NOT NULL,
        Description     Varchar(1000) NOT NULL,
        Image varchar(255),
        IdProfessionnel Int
          CONSTRAINT FK_Offres_IdProfessionnel
          REFERENCES Utilisateur_professionnel(IdProfessionnel)
)--ENGINE=InnoDB;
;

--------------------------------------------------------------
-- Table: Lieu
--------------------------------------------------------------

CREATE TABLE Lieu(
        IdLieu      integer PRIMARY KEY AUTOINCREMENT,
        Tarif numeric(6) ,
        Prix_Initial numeric(6) ,
        Description  Varchar(1000),
        Image varchar(255)
)--ENGINE=InnoDB;
;

--------------------------------------------------------------
-- Table: Invité Classique
--------------------------------------------------------------

CREATE TABLE Participation(
        Adresse_mail Varchar (255) NOT NULL
          CONSTRAINT FK_Invite_Classique_Adresse_mail
          REFERENCES Utilisateur(Adresse_mail),
        IdSoiree  integer
          CONSTRAINT FK_Invite_Classique_IdClassique
          REFERENCES Soiree(IdSoiree),
        Nb_Personnes int NOT NULL,
        PRIMARY KEY (Adresse_mail ,IdSoiree )
)--ENGINE=InnoDB;
;

--------------------------------------------------------------
-- Table: est ami
--------------------------------------------------------------

CREATE TABLE Est_Ami(
        Adresse_mail_1 Varchar (255) NOT NULL
          CONSTRAINT FK_est_ami_Adresse_mail_1
          REFERENCES Utilisateur(Adresse_mail),
        Adresse_mail_2 Varchar (255) NOT NULL
          CONSTRAINT FK_est_ami_Adresse_mail_2
          REFERENCES Utilisateur(Adresse_mail),
        PRIMARY KEY (Adresse_mail_1 ,Adresse_mail_2)
)--ENGINE=InnoDB;
;

--------------------------------------------------------------
-- Table: Classique Offre
--------------------------------------------------------------

CREATE TABLE Select_Offre(
        IdSoiree integer
          CONSTRAINT FK_Classique_Offre_IdClassique
          REFERENCES Soiree(IdSoiree),
        IdOffre     int NOT NULL
          CONSTRAINT FK_Classique_Offre_IdOffre
          REFERENCES Offre(IdOffre),
        Quantite int NOT NULL,
        PRIMARY KEY (IdSoiree ,IdOffre )
)--ENGINE=InnoDB;
;



--------------------------------------------------------------
-- Table: Select_Lieu
--------------------------------------------------------------

CREATE TABLE Select_Lieu(
        IdSoiree integer
          CONSTRAINT FK_Classique_Lieu_IdSoiree
          REFERENCES Soiree(IdSoiree),
        IdLieu      int NOT NULL
          CONSTRAINT FK_Select_Lieu_IdLieu
          REFERENCES Lieu(IdLieu),
        Duree time NOT NULL,
        PRIMARY KEY (IdSoiree ,IdLieu )
)--ENGINE=InnoDB;
;


--ALTER TABLE Soiree ADD CONSTRAINT FK_Soiree_Adresse_mail FOREIGN KEY (Adresse_mail) REFERENCES Utilisateur(Adresse_mail);
--ALTER TABLE Offre ADD CONSTRAINT FK_Offre_IdProfessionnel FOREIGN KEY (IdProfessionnel) REFERENCES Utilisateur_professionnel(IdProfessionnel);
--ALTER TABLE Lieu ADD CONSTRAINT FK_Lieu_IdProfessionnel FOREIGN KEY (IdProfessionnel) REFERENCES Utilisateur_professionnel(IdProfessionnel);
--ALTER TABLE Invite ADD CONSTRAINT FK_Invite_Adresse_mail FOREIGN KEY (Adresse_mail) REFERENCES Utilisateur(Adresse_mail);
--ALTER TABLE Invite ADD CONSTRAINT FK_Invite_IdSoiree FOREIGN KEY (IdSoiree) REFERENCES Soiree(IdSoiree);
--ALTER TABLE Est_Ami ADD CONSTRAINT FK_Est_Ami_Adresse_mail FOREIGN KEY (Adresse_mail) REFERENCES Utilisateur(Adresse_mail);
--ALTER TABLE Est_Ami ADD CONSTRAINT FK_Est_Ami_Adresse_mail_Utilisateur FOREIGN KEY (Adresse_mail_Utilisateur) REFERENCES Utilisateur(Adresse_mail);
--ALTER TABLE Select_Offre ADD CONSTRAINT FK_Select_Offre_IdSoiree FOREIGN KEY (IdSoiree) REFERENCES Soiree(IdSoiree);
--ALTER TABLE Select_Offre ADD CONSTRAINT FK_Select_Offre_IdOffre FOREIGN KEY (IdOffre) REFERENCES Offre(IdOffre);
--ALTER TABLE Select_Lieu ADD CONSTRAINT FK_Select_Lieu_IdSoiree FOREIGN KEY (IdSoiree) REFERENCES Soiree(IdSoiree);
--ALTER TABLE Select_Lieu ADD CONSTRAINT FK_Select_Lieu_IdLieu FOREIGN KEY (IdLieu) REFERENCES Lieu(IdLieu);
