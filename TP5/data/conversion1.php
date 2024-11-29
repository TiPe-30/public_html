<?php
// Partie CONTRÔLE de cette page WEB
// Placer ici la récupération des données de la query string et le calcul
$nombre_conversion = $_GET['temp_in'] ?? '';
$result = 0;
$nom_gauche = 'Celsius';
$nom_droite = 'Fahrenheit';
if (isset($_GET['action'])) {
  if (!($nombre_conversion == '')) {
    if ($_GET['action'] == 'inverser') {
      $nom_gauche = 'Fahrenheit';
      $nom_droite = 'Celsius';
      $result = ($nombre_conversion - 32) / 1.8;
    } else {
      $nom_gauche = 'Celsius';
      $nom_droite = 'Fahrenheit';
      $result = $nombre_conversion * 1.8 + 32;
    }
  }
}
// La suite est la partie VUE
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Conversion Celcius/Fahrenheit</title>
  <link rel="stylesheet" href="design/style.css">
</head>

<body>
  <h1>Conversion de températures</h1>
  <form action="conversion1.php" method="get">
    <button type="submit" name="action" value="inverser">Inverser</button>
    <input id="in" type="number" step="any" name="temp_in" value="<?= $nombre_conversion ?>">
    <label for="in"><?= $nom_gauche ?> égal</label>
    <output id="out" for="in" name="temp_out"><?= $nombre_conversion == '' ? 'X' : $result ?></output>
    <label for="out"><?= $nom_droite ?></label>
    <button type="submit" name="action" value="convertir">Convertir</button>
  </form>
</body>

</html>