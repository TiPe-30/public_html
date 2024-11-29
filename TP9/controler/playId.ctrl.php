<?php
// Joue une musique conneu par son Id
// Inclusion du modèle
require_once('model/music.class.php');
require_once('model/dao.class.php');
require_once('framework/view.fw.php');

$musique = Music::read($_GET['id']);
$page = $_GET['page'];

$view = new View();
$view->assign('musique',$musique);
$view->assign('page',$page);
$view->display('playId');
