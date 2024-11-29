<?php
include('readDelimitedData.php');
// Lecture de toutes les musiques
$array_musique = readDelimitedData('jukeboxData.txt','|');
// on a maintenant un double vecteur

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>&#x1F399; Mon jukebox static</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <header>
    <h1>Ma musique dans mon Jukebox</h1>
  </header>
  <main>
    <section>
      <?php
      foreach($array_musique as $groupe):
      ?>
      <figure>
        <a href="playPath.php?music=<?=$groupe[0].'/'.$groupe[1]?>">
          <img src="data/<?=$groupe[0].'/'.$groupe[1]?>.jpeg"/>
        </a>
          <figcaption>
            <music-song><?= $groupe[1] ?></music-song>
            <music-group><?= $groupe[0] ?></music-group>
          </figcaption>
        </figure>
        <?php
      endforeach;
      ?>
    <!-- Placer ici une boucle d'affichage des musiques -->
    </section>
  </main>
  <footer>
  </footer>
</body>
</html>
