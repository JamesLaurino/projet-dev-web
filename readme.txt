    #Projet de développement web 

    - Projet en vue de réaliser l'examen du cours de projet de développment web de février 2022
    -------------------------------------------------------------------------------------------

    Important use case :
    -------------------- 
        Use case 1 : 
            L'utilisateur non admin peut se connecter avec son mot de passe.
            Il peut choisir l'activite de son choix mais il doit valider s'il participe au soupé.
            Alternativement il ne peut plus changer son choix une fois validé.
        
        Use case 2 :
            L'admin peut visualiser les profils des non admin.
            Il peut modifier les informations non "personnelles" comme le département, l'acitvité mais pas les autres.
            L'admin peut également supprimer logiquement un utilisateur mais pas physiquement


    Pourquoi sql server pas MySQL ?
    -------------------------------

        MySQL n'est pas une base de donnée fiable pour un projet. Il ne respecte pas les principes ACID.
        Exemple : dans certaines situation il arrique sur 10 insertions si une n'est pas valide il ne va pas faire un rollback,
        il va juste valider les 9 première est annuler les autres.

        Sql server permet de faire des CTE, ce qui peut être très pratique dans une procédure stockée.
    
    Set up :
    --------

    1. installer sql server : https://www.microsoft.com/en-us/sql-server/sql-server-downloads

    2. Aller dans le repo, dans le dossier "Models/database.php" et changer le nom de string connection.

        Exemple : public static $databaseLaptop = 'sqlsrv:Server=MON_LAPTOP-MONDESKTOP\\SQLEXPRESS;Database=DevWeb';

        PS : le string connection se récupère à la connection sur sql server.

    3. Aller dans sql server et exécuter chaque queries qui se trouvent dans db.sql. Il faut les executer dans l'ordre et une par une

    4 Pour se connecter sur le site en mode admin il faut avoir les mots de passe admin. 
        Ils ne sont pas en clair en db donc il faut aller voir dans le fichier db.sql (ligne 375) situé à la racine du repo cloné

        Alternativement :
            insert into admin (nom, prenom, mdp)
            values
            ('nom', 'prenom', 'motDePasse')

    5. Pour une connection en mode cf "db.sql" ligne 358

    ATTENTION 
    ---------

        Si vous utilisé XAMPP, WAMPP ou LAMPP il n'est pas possible de directement connecter le server APACHE 
        avec ms sql. Il faut pour celui configurer le fichier php.init et avec les bon driver. Un lien utile :
        https://www.bing.com/videos/search?q=sql+server+avec+xampp&docid=608012561783349375&mid=B23C132FABDA79059B9DB23C132FABDA79059B9D&view=detail&FORM=VIRE



