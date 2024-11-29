<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Mon jukebox avec BD</title>
  <link rel="stylesheet" type="text/css" href="view/design/style.css">
</head>
<body>
  <header>
    <h1>Ma musique dans mon Jukebox</h1>
  </header>
  <!-- Navigation -->
  <nav>
    <p>
      <a href="index.php?page=<?= $page-70 < 0 ? 0:$page-70 ?>&pageSize=8">
        <span class="arrow left"></span><span class="arrow left"></span>
      </a>
      <a href="index.php?page=<?= $page-1 < 0 ? 0:$page-1 ?>&pageSize=8">
        <span class="arrow left"></span>
      </a>
      <a class="selected" href="index.php?page=1&pageSize=8"><?= $page == 0 ? 1:$page ?></a>
      <?php for($i = $page+1;$i < $page+9;$i++): ?>
      <a href="index.php?page=<?=$i?>&pageSize=8"><?= $i ?></a>
      <?php endfor; ?>
      <a href="index.php?page=<?= $page+1 <= 546 ? $page+1:$page?>&pageSize=8">
        <span class="arrow right"></span>
      </a>
      <a href="index.php?page=<?= $page+70 <= 546 ? $page+70:$page ?>&pageSize=8">
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
        <a href="index.php?ctrl=playId&id=<?= $musique->getId()?>&page=<?= $page ?>&pageSize=8">
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
