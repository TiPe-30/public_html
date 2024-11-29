<?php
// Inclusion du modèle
require_once 'model/music.class.php';
require_once 'model/dao.class.php';
require_once 'framework/view.fw.php';

$page = 0;
if (isset($_GET['page'])){
  $page = $_GET['page'];
}

$lesMusiques = array();
for($i = $page; $i < $page+8;$i++){
  array_push($lesMusiques,Music::read($i+1));
}

$view = new View();
$view->assign('lesMusiques',$lesMusiques);
$view->assign('page',$page);
$view->display('jukebox');