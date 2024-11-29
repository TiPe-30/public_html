<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="./view/design/style.css">
    <title></title>
  </head>
  <body>
    <header>
      <h1>Playing : Community Centre from Passenger</h1>
    </header>
    <nav>
      <a href="index.php?page=<?= $page ?>&pageSize=8">
        back
      </a>
    </nav>
    <section>
      <figure>
        <img src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/img/<?= $musique->getCover() ?>">
        <audio src="http://www-info.iut2.upmf-grenoble.fr/intranet/enseignements/ProgWeb/data/musiques/mp3/<?= $musique->getMp3() ?>" controls autoplay ></audio>
      </figure>
    </section>
    <br/>
  </body>
</html>
