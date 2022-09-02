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
	locomotionId integer foreign key REFERENCES locomotion(id)

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
	
-------------------------------------------

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




----------------------------------------------------------------------------
----------------------------------------------------------------------------


insert into employe (nom,prenom, mail, codePostal, activiteId, departementId, locomotionId)
values
('James', 'Laurino', 'james@hotmail.com',1499,1,1,1),
('JaimePas', 'TaFigure', 'jamesPasTaFigure@hotmail.com',1800,1,1,1),
('Jean', 'Profite', 'jeanProfite@hotmail.com',1560,2,2,3),
('Aude', 'Javel', 'AudeJaval@hotmail.com',1960,3,3,2),
('Laura', 'Teur', 'LauraTeur@hotmail.com',1360,4,1,2)


alter table employe
add mdp varchar(255)

------------------------------------
-------------------------------------

insert into admin (nom, prenom, mdp)
values
('dba', 'dba', 'dba')










