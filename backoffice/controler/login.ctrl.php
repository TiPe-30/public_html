<?php
// 
// Inclusion du framework
include_once("framework/view.fw.php");

// 
///////////////////////////////////////////////////////
// A COMPLETER
///////////////////////////////////////////////////////

// 
$login = "";
$mdp = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $login = htmlspecialchars($_POST['login'] ?? "");
  $mdp = htmlspecialchars($_POST['password'] ?? "");
}
$connected = ($login == "tristan" && $mdp == "charavel");
$_SESSION['connected'] = $connected;
// Construction de la vue
////////////////////////////////////////////////////////////////////////////
$view = new View();

if ($connected) {
  $view->assign('title', 'Vous êtes connecté');
  $view->assign('message','Vous pouvez utiliser les boutons du menu.');
} else {
  $view->assign('title', "Vous n'êtes pas connecté.");
  $view->assign('message','Vous devez vous logger.');
}
$view->display('message');
?>