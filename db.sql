create database DevWeb
use DevWeb

create table activite
(
	id integer primary key identity,
	nom varchar(255),
	quantite integer check (quantite >= 0),
	image varchar(255) UNIQUE,
	description varchar(max),
	isActive bit DEFAULT 1,
)

insert into activite (nom, quantite, image, description)
values
('Cuisine', 15, 'Cuisine.jpg', 'Un super atelier de cuisine'),
('Racing', 10, 'Racing.jpg', 'Un super de course avec la PS5'),
('Karting', 12, 'Karting.jpeg', 'Un superbe course de voiture en karting'),
('Escape game', 16, 'Escape.png', 'Un super jeu de escape game')



create table departement
(
	id integer primary key identity,
	nom varchar(255),
	isActive bit default 1
)

insert into departement (nom)
values
('Finance'),
('IT'),
('Marketing'),
('Vente'),
('Comptabilité')

create table locomotion
(
	id integer primary key identity,
	nom varchar(255),
	isActive bit default 1
)

insert into locomotion (nom)
values
('Voiture'),
('Vélo'),
('Marche'),
('Transports en commun'),
('autre')

create table admin
(
	id integer primary key identity,
	nom varchar(255),
	prenom varchar(255),
	mdp varchar(max)
)


create table employe
(
	id integer primary key identity,
	nom varchar(255),
	prenom varchar(255),
	mail varchar(255),
	codePostal integer,
	isActive bit default 1,
	participeSoupe bit,
	activiteId integer foreign key REFERENCES activite(id),
	departementId integer foreign key REFERENCES departement(id),
	locomotionId integer foreign key REFERENCES locomotion(id),
	mdp varchar(255)

)

alter table employe
ADD CONSTRAINT unique_nom_prenom UNIQUE (nom,prenom);


--------------------------------------------------------------------USE [DevWeb]
create trigger checkMail
on employe
after insert as
	begin
		declare @mail varchar(255);
		declare @mailTrim varchar(255);
		declare @bitEMailVal bit;

		select @mail = mail from inserted; 

		set @mail =ltrim(rtrim(isnull(@mail,'')));

		begin transaction

			SET @bitEmailVal = case when @mail = '' then 0
							  when @mail like '% %' then 0
							  when @mail like ('%["(),:;<>\]%') then 0
							  when substring(@mail,charindex('@',@mail),len(@mail)) like ('%[!#$%&*+/=?^`_{|]%') then 0
							  when (left(@mail,1) like ('[-_.+]') or right(@mail,1) like ('[-_.+]')) then 0                                                                                    
							  when (@mail like '%[%' or @mail like '%]%') then 0
							  when @mail LIKE '%@%@%' then 0
							  when @mail NOT LIKE '_%@_%._%' then 0
							  else 1 
						  end
			if(@bitEmailVal = 1)
				begin
					print('Tranaction ok');
					commit transaction
				end
			if(@bitEmailVal = 0)
				begin
					print('Tranaction pas ok');
					rollback transaction
				end
	end
	
	
	
	
----------------------------------------------------------------------------
-----------------------------------------------------------------------------

create procedure [dbo].[checkPawword] @nomUser varchar(255), @mdp1 varchar(255)
as
	begin
		
		select * from employe where
		mdp = HASHBYTES('SHA2_256', @mdp1) AND  nom = @nomUser;

	end
	
-----------------------------------------------------------------------------
----------------------------------------------------------------------------



create procedure validationActivite @idUser integer, @nomActivite varchar(255)
as
	begin
		declare @activiteId integer;
		declare @quantite integer;
		declare @difference integer;

		select @activiteId = id, @quantite = quantite FROM activite WHERE nom = @nomActivite;

		set @difference = @quantite - 1;

		begin transaction
			UPDATE employe 
			SET activiteId = @activiteId
			WHERE id = @idUser;
		commit transaction

		begin transaction
			UPDATE activite 
			set quantite = @difference
			WHERE nom = @nomActivite;
		commit transaction

	end	



------------------------------------------------------------------------------

create trigger hashPasswordAdmin
on admin
after insert
as 
	begin
		declare @passUser varchar(255);
		declare @idUser integer;
		declare @hashPass varchar(max);

		select @idUser = id, @passUser = mdp from inserted;

		set @hashPass = Hashbytes('SHA2_256', @passUser);

		begin transaction
			update admin
			set mdp = @hashPass
			where id = @idUser;
		commit transaction

	end

-----------------------------------

create trigger hashPassword
on employe
after insert
as 
	begin
		declare @passUser varchar(255);
		declare @idUser integer;
		declare @hashPass varchar(max);

		select @idUser = id, @passUser = mdp from inserted;

		set @hashPass = Hashbytes('SHA2_256', @passUser);

		begin transaction
			update employe
			set mdp = @hashPass
			where id = @idUser;
		commit transaction

	end
--------------------------------------------------------------------------
------------------------------------------------------------------------

create procedure infoUserForAdmin
as
begin

	select employe.id, employe.nom, employe.prenom, employe.mail, employe.codePostal, 
	activite.nom, departement.nom, locomotion.nom,
	case
		 WHEN participeSoupe IS NULL THEN 'unknow'
		 WHEN participeSoupe = 1 THEN 'Oui' 
		 WHEN participeSoupe = 0 THEN 'Non'
	end as 'Participe soupe'
	from employe
	inner join departement on departement.id = employe.departementId
	inner join activite on activite.id = employe.activiteId
	inner join locomotion on locomotion.id = employe.locomotionId
	where employe.isActive = 1;
end

----------------------------------------------------------------------------------
---------------------------------------------------------------------------------


create trigger deleteUser
on employe
instead of delete
as
	begin
		declare @id integer;
		declare @idActivite integer;
		declare @quantiteUpdate integer;
		declare @quantiteOld integer;

		select @id = id, @idActivite = activiteId from deleted;
		select @quantiteOld = quantite from activite WHERE id = @idActivite;

		set @quantiteUpdate = @quantiteOld + 1;

		begin transaction
			update employe 
			set isActive = 0
			where id = @id;
		commit transaction

		begin transaction 
			update activite
			set quantite = @quantiteUpdate
			WHERE id = @idActivite
		commit transaction
			
	end

------------------------------------------------------------------------------
-----------------------------------------------------------------------------

create procedure ifoUserForAdminEdit @idUser integer
as 
begin

	select employe.id, employe.nom, employe.prenom, employe.mail, employe.codePostal, 
	activite.nom as 'activite', departement.nom as 'departement', locomotion.nom as 'locomotion',
	case
		 WHEN participeSoupe IS NULL THEN 'unknow'
		 WHEN participeSoupe = 1 THEN 'Oui' 
		 WHEN participeSoupe = 0 THEN 'Non'
	end as 'participeSoupe'
	from employe
	inner join departement on departement.id = employe.departementId
	inner join activite on activite.id = employe.activiteId
	inner join locomotion on locomotion.id = employe.locomotionId
	where employe.isActive = 1 AND employe.id = @idUser
end



----------------------------------------------------------------------------
----------------------------------------------------------------------------


insert into employe (nom,prenom, mail, codePostal, activiteId, departementId, locomotionId, mdp)
values
('James', 'Laurino', 'james@hotmail.com',1499,1,1,1,'123')

insert into employe (nom,prenom, mail, codePostal, activiteId, departementId, locomotionId, mdp)
values
('JaimePas', 'TaFigure', 'jamesPasTaFigure@hotmail.com',1800,1,1,1, '123')

insert into employe (nom,prenom, mail, codePostal, activiteId, departementId, locomotionId, mdp)
values
('Jean', 'Profite', 'jeanProfite@hotmail.com',1560,2,2,3, '123')

insert into employe (nom,prenom, mail, codePostal, activiteId, departementId, locomotionId, mdp)
values
('Aude', 'Javel', 'AudeJaval@hotmail.com',1960,3,3,2, '123')

insert into employe (nom,prenom, mail, codePostal, activiteId, departementId, locomotionId, mdp)
values
('Laura', 'Teur', 'LauraTeur@hotmail.com',1360,4,1,2, '123')

------------------------------------
-------------------------------------

insert into admin (nom, prenom, mdp)
values
('dba', 'dba', 'dba')










