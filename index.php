<?php

require_once 'DatalinkSofab.php';
require_once 'Templates.php';

$url = "";
$token = "";

$datalink = new DatalinkSofab($url, $token);


/* Caricamento dati */
$projects = [];
$articles = [];
try {
    $projects = $datalink->getProjects();
    $articles = $datalink->getArticles();
    
} catch (Exception $e) {
    echo "Si è verificato un errore: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>HyGraph managed sample page</h1>

    <?php 
        foreach ($projects as $project) {
            echo getProjectTemplate($project["title"], $project["image"]["url"], $project["content"]);
        }
        
        foreach ($articles as $article) {
            echo $article["title"];
        }
    ?>
</body>
</html>