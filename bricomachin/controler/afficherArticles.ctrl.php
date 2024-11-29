<?php
// 
// Inclusion du framework
include_once 'framework/view.fw.php';
// Inclusion du modèle
include_once 'model/article.class.php';
include_once 'model/categorie.class.php';


// 
///////////////////////////////////////////////////////
// A COMPLETER
///////////////////////////////////////////////////////

// Numero de page
$page = $_GET['page'] ?? 1;
$pagePrec = $page-1;
$pageSuiv = $page+1;
// Pas de filtrage par catégorie
$idCategorie = 0;
$nomCategorie = $_GET['nomCategorie'] ?? "Tous les produits";
$articles = [];

if($nomCategorie == "Tous les produits"){
    $articles = Article::readPage($page,pageSize: 12);
    echo "Execution $page";
}else{
    $articles = Article::readPageCategorie($page,pageSize: 12,categorie: $nomCategorie);

}



////////////////////////////////////////////////////////////////////////////
// Construction de la vue
////////////////////////////////////////////////////////////////////////////
$view = new View();

// Passe les paramètres à la vue
$view->assign('nomCategorie',$nomCategorie);
$view->assign('articles',$articles);
$view->assign('idCategorie',$idCategorie);
$view->assign('page',$page);
$view->assign('pagePrec',$pagePrec);
$view->assign('pageSuiv',$pageSuiv);
// Charge la vue
$view->display("articles");