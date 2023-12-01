
create  DATABASE peoplepertask;

use peoplepertask;

show DATABASES;


CREATE table user(
    id int PRIMARY KEY AUTO_INCREMENT,
    Nom varchar(40),
    passwords varchar(10),
    email VARCHAR(40),
    otherinfo VARCHAR(40)
)

ALTER TABLE user MODIFY COLUMN passwords VARCHAR(255);

insert into user (Nom,passwords,email,otherinfo) values("ahmed","ahmed6789","ahmed7@gmail.com","otherinfo2");

select * from user ;


DELETE from user where id = 9;
CREATE Table categories(
    id int PRIMARY KEY AUTO_INCREMENT,
    nomcat varchar(40)
)


select * from categories

delete from categories where id = 5;
INSERT INTO categories (nomcat) VALUES ('UX-UI');

CREATE TABLE souscategories (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nomsuscatgs VARCHAR(40),
    idcat INT,
    FOREIGN KEY (idcat) REFERENCES categories(id)
);
select * from souscategories

insert into souscategories (nomsuscatgs,idcat) values('nomsuscatgs5',11);
ALTER TABLE souscategories
ADD CONSTRAINT fks
FOREIGN KEY (idcat) REFERENCES categories(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

create table freelances(
    id int PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(30),
    Competences VARCHAR(40),
    iduser int ,
    FOREIGN KEY (iduser) REFERENCES user(id)
)

select * from freelances;

delete from freelances where id = 2;
SELECT user.nom
FROM Projets
JOIN user ON Projets.iduser = user.id;

create table Projets(
    id INT PRIMARY KEY AUTO_INCREMENT,
    Titre varchar(40),
    Descriptions VARCHAR(50),
    idsoc INT,
    iduser int ,
    idcat int ,
    FOREIGN KEY (idcat) REFERENCES categories(id),
    FOREIGN KEY (iduser) REFERENCES user(id),
    FOREIGN KEY (idsoc) REFERENCES souscategories(id)
)



ALTER TABLE Projets
ADD CONSTRAINT  CONSTRAINT3
FOREIGN KEY (idsoc) REFERENCES souscategories(id)
ON DELETE CASCADE
ON UPDATE CASCADE;

select * from Projets

INSERT INTO Projets (Titre, Descriptions, idsoc, iduser, idcat)
VALUES('title2', 'disc2', 7, 40, 11);

create Table Offres(
    id INT PRIMARY KEY AUTO_INCREMENT,
    Montant FLOAT ,
    Délai DATE,
    idfre int ,
    idprojet int ,
    FOREIGN KEY (idprojet) REFERENCES Projets(id),
    FOREIGN KEY (idfre) REFERENCES freelances(id)
)

select * from Offres



SELECT Offres.id AS id,
       Offres.Montant AS Montant,
       Offres.Délai AS Delai,
       freelances.nom AS nom,
       Projets.Titre AS Titre
FROM Offres
INNER JOIN freelances ON freelances.id = Offres.idfre
INNER JOIN Projets ON Projets.id = Offres.id;




select  projets.id as id , Titre , Descriptions,user.Nom as user ,categories.nomcat as cetegory
 from projets INNER JOIN categories INNER JOIN user on user.id = projets.iduser 
 and categories.id= projets.idcat;




insert into offres (montant,Délai,idfre,idprojet) values(30,'2023-12-07',4,33);

create Table Temoignages(
    id int PRIMARY KEY AUTO_INCREMENT,
    Commentaire varchar(40),
    iduser int ,
    FOREIGN KEY (iduser) REFERENCES user(id)
)

insert into temoignages (Commentaire,iduser) values('Commentaire7',9);
select * from temoignages

alter table Témoignages
RENAME  to Temoignages

CREATE PROCEDURE InsertIntoTable
(
    IN id INT,
    IN Commentaire VARCHAR(255),
    IN iduser int 
)
BEGIN
    INSERT INTO Temoignages (id,Commentaire, iduser)
    VALUES (id, Commentaire,iduser);
END

call InsertIntoTable(2,"Commentaire2",2)

select * from temoignages


CREATE PROCEDURE InsertIntoTable
(
    IN id INT,
    IN Commentaire VARCHAR(255),
    IN iduser int 
)
BEGIN
    INSERT INTO Temoignages (id,Commentaire, iduser)
    VALUES (id, Commentaire,iduser);
END

select* from user;
call InsertIntofreelances(4,"hassan","front end end",38)

select * from user;

alter table freelances
RENAME COLUMN Compétences to Competences

CREATE PROCEDURE InsertIntofreelances
(
    IN id INT,
    IN Nom VARCHAR(255),
    IN Compétences VARCHAR(40),
    IN iduser int 
)
BEGIN
    INSERT INTO freelances (id,Nom, Competences,iduser)
    VALUES (id, Nom,Competences,iduser);
END





ALTER TABLE freelances
ADD CONSTRAINT cons1
FOREIGN KEY (iduser) REFERENCES user(id)
ON DELETE CASCADE
ON UPDATE CASCADE;


select  projets.id as id , Titre , Descriptions,user.Nom as user ,categories.nomcat as cetegory
 from projets INNER JOIN categories INNER JOIN user on user.id = projets.iduser 
 and categories.id= projets.idcat;



--  enum roles 
-- {
--     case clinet;
--     case admins;
--     case freelance;
-- }