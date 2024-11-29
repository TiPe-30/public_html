<?php
// 
// 
/////////////////////////////////////////////////////////////////////
// A completer
/////////////////////////////////////////////////////////////////////
// 
include_once 'framework/view.fw.php';
// Inclusion du modèle
include_once 'model/categorie.class.php';
include_once 'model/dao.class.php';

$id = 0;
$les_categories_afficher = [];

// si jamais c'est la première fois, l'id catégorie n'est pas dans le $_GET[]
// dans ces cas là on affiche les catégories racines

if(!isset($_GET['idCategorie'])){
   $cat =  Categorie::read(1);
   // on lit les sous catégories en le mettant dans un vecteur
}else{
    $cat = Categorie::read($_GET['idCategorie']);
}

try{
    

}catch(Exception $e){
    
}