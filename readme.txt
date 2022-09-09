    #Projet de développement web 

    - Projet en vue de réaliser l'examen du cours de projet de développment web de février 2022
    -------------------------------------------------------------------------------------------

    Important use case :
    -------------------- 
        User case 1 : 
            L'utilisateur non admin peut se connecter avec son mot de passe.
            Il peut choisir l'activite de son choix mais il doit valider s'il participe au soupé.
            Alternativement il ne peut plus changer son choix une fois validé.
        
        User case 2 :
            L'admin peut visualiser les profils des non admin.
            Il peut modifier les informations non "personnelles" comme le département, l'acitvité mais pas les autres.
            L'admin peut également supprimer logiquement un utilisateur mais pas physiquement



    1. installer sql server : https://www.microsoft.com/en-us/sql-server/sql-server-downloads

    2. Aller dans le repo, dans le dossier "Models/database.php" et changer le nom de string connection.

        Exemple : public static $databaseLaptop = 'sqlsrv:Server=MON_LAPTOP-MONDESKTOP\\SQLEXPRESS;Database=DevWeb';

        PS : le string connection se récupère à la connection sur sql server.

    3. Aller dans sql server et écrire la requête suivante : 
        DATABASE RESTORE FROM DISCK = 'Chemin-a-la-racine-du-repo/SQLDevWebDB.bak';

    4 Pour se connecter sur le site en mode admin il faut avoir les mots de passe admin. 
        Ils ne sont pas en clair en db donc il faut aller voir dans le fichier db.sql (ligne 375) situé à la racine du repo cloné

        Alternativement :
            insert into admin (nom, prenom, mdp)
            values
            ('nom', 'prenom', 'motDePasse')

    5. Pour une connection en mode cf "db.sql" ligne 358



