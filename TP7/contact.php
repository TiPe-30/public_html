<?php
// récupère les informations de la query string
$city = $_GET['city'] ?? 'Dallas';
$database = new PDO('sqlite:' . __DIR__ . '/data/contact.db');
const QUERY = 'SELECT * FROM contact WHERE city=:city';
try {
  $requete = $database->prepare(QUERY);
} catch (PDOException $e) {
  die('PDO query Error on "' . QUERY . '" ' . $e->getMessage());
}

$requete->execute([':city' => $city]);
$data = $requete->fetchAll();
/**
 * Les données sont donc dans le tableau data de la manière suivante
 * data [0]-> 
 * ligne['id'] = XX
 * ligne['name'] = XXX
 * ligne['phone'] = XXX
 * ligne['city'] = XXXX
 * 
 */

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="design/style.css">
  <title>My contacts</title>
</head>

<body>
  <h1>My contacts from <?= $city ?></h1>
  <table>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Phone</th>
      <th>City</th>
    </tr>
    <?php foreach ($data as $contact): ?>
      <tr>
        <td>
          <?= $contact['id'] ?>
        </td>
        <td>
          <?= $contact['name'] ?>
        </td>
        <td>
          <?= $contact['phone'] ?>
        </td>
        <td>
          <?= $contact['city'] ?>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>