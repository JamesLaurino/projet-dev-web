<?php
session_start();
define('ROOT_PATH', "/DevWeb/"); // Chemin qui suit le nom de domaine. Exemple: http://monprojet.local/exercice8/ le path a indiqué sera donc '/exercice8/'
$request = str_replace(ROOT_PATH, "", $_SERVER['REQUEST_URI']); // On récupère juste la request, sans le chemin du dossier.
$request = strtok($request, '?'); // Permet de supprimer les données envoyées en GET
$request = trim($request, '/'); // Permet de supprimer le slash devant et à la fin de la request si elle existe
$segments = array_filter(explode('/', $request)); // On découpe la requête pour obtenir une liste et on supprime les éléments Null
if (!count($segments) or $segments[0] == 'index' or $segments[0] == 'index.php')
{
    $segments[0] = 'accueil'; // Si rien dans segments alors on injecte la page "welcome" qui sera la page par défaut (page d'accueil)
}

// Structure URL: http://monprojet.be/{REQ_TYPE}/{REQ_TYPE_ID}/{REQ_ACTION}
define('REQ_TYPE', $segments[0] ?? Null);
define('REQ_TYPE_ID', $segments[1] ?? Null);
define('REQ_ACTION', $segments[2] ?? Null);
$file = 'controllers/'.REQ_TYPE.'.php';
if(file_exists($file)) // On vérifie que le fichier php existe
{ 
    require $file;
    exit();
}
else 
{
    require 'controllers/error.php';
    exit();
}
?>
