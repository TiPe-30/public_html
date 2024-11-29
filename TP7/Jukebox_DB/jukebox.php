<?php
// Inclusion du modèle
require_once('model/music.class.php');
require_once('model/dao.class.php');

$page = 0;
if (isset($_GET['page'])){
  $page = $_GET['page'];
}

$lesMusiques = array();
for($i = $page; $i < $page+8;$i++){
  array_push($lesMusiques,Music::read($i+1));
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Mon jukebox avec BD</title>
  <link rel="stylesheet" type="text/css" href="design/style.css">
  <title></title>
</head>
<body>
  <header>
    <h1>Ma musique dans mon Jukebox</h1>
  </header>
  <!-- Navigation -->
  <nav>
    <p>
      <a href="jukebox.php?page=1&pageSize=8">
        <span class="arrow left"></span><span class="arrow left"></span>
      </a>
      <a href="jukebox.php?page=1&pageSize=8">
        <span class="arrow left"></span>
      </a> 
      <a class="selected" href="jukebox.php?page=1&pageSize=8">1</a>
      <?php for($i = 2;$i < 9;$i++): ?>
      <a href="jukebox.php?page=<?=$i ?>&pageSize=8"><?= $i ?></a>
      <?php endfor; ?>
      <a href="jukebox.php?page=9&pageSize=8">
        <span class="arrow right"></span>
      </a>
      <a href="jukebox.php?page=70&pageSize=8">
        <span class="arrow right"></span><span class="arrow right"></span>
      </a>
    </p>
    <form action="" method="get">
      <p>Musiques/page</p>
      <input type="text" value="8" maxlength="4" size="2">
    </form>
  </nav>
	
  <!-- Contenu principal -->
  <main>
    <section>
      <?php foreach($lesMusiques as $musique): ?>
      <figure>
        <a href="playId.php?id=<?= $musique->getId()?>&page=1&pageSize=8">
          <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/<?= $musique->getCover() ?>" />
        </a>
        <figcaption>
          <music-song><?= $musique->getTitle() ?></music-song>
          <music-group><?= $musique->getAuthor() ?></music-group>
          <music-category><?= $musique->getCategory() ?></music-category>
        </figcaption>
      </figure>
      <?php endforeach; ?>
    </section>
  </main>
  <footer>
    Jukebox IUT
  </footer>
</body>
</html>
