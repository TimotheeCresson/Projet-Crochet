<?php 
function getArticlesFromJson() {
    $jsonFile = __DIR__ . '/../../data.json';
// Lire le contenu du fichier JSON
    $jsonContent = file_get_contents($jsonFile);
// Décoder le contenu JSON en tableau PHP
    $articles = json_decode($jsonContent, true);
    return $articles;
}