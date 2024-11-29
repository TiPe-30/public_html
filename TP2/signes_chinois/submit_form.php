<?php
// Récupération des valeurs
$nom = $_GET['nom'] ?? "inconnu";
$age = $_GET['fage'] ?? "inconnu";
$presentation = $_GET['genre'] ?? "inconnu";
// Calculs
// Année de naissance
$year = date("Y")-$age;

// Liste des signes
// En 1921 c'était l'année du Coq
$signe = array(9 => 'Coq',10 => 'Chien', 11 => 'Cochon', 0 => 'Rat',1 => 'Buffle',2 => 'Tigre',3 => 'Lapin',4 => 'Dragon',5 => 'Serpent',6 => 'Cheval',7 => 'Chèvre',8 => 'Singe');
$pos = 0;
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="styles.css">
  <title>Signe Chinois</title>
</head>

<body>
  <header>
    <h1>Signes Astrologiques Chinois</h1>
  </header>
  <main>
    <p>
      Bonjour <?= $presentation == "homme" ? "Mr":"Mme" ?> <?= $nom ?>, vous êtes né en <?= $year ?>.
      Vous êtes du signe suivant :
    </p>
    <section>
      <div id="salt">
      <img src=<?= "./img/".strtolower($signe[($year-1924)%12]).".png" ?>>
      <p> <?= $signe[($year-1924)%12] ?></p>
      </div>
    </section>

  </main>
  <footer>
    <p>&copy; 2024 Votre Site Astrologique</p>
  </footer>
</body>

</html>