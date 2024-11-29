<?php
// récupère les informations de la query string
$database = new PDO('sqlite:' . __DIR__ . '/data/contact.db');
const QUERY = 'SELECT DISTINCT city FROM contact';
try {
  $requete = $database->prepare(QUERY);
} catch (PDOException $e) {
  die('PDO query Error on "' . QUERY . '" ' . $e->getMessage());
}

$requete->execute();
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="design/style.css">
    <title>SELECTION DE VILLE</title>
</head>

<body>
    <h1>My contacts: select a city</h1>

    <form action="./contact.php" method="get">
        <table id="select">
            
            <?php foreach($data as $donne): ?>
            <tr>
            <th><?= $donne['city'] ?></th>
            <th><input type="radio" id="<?= $donne['city'] ?>" name="city" value="<?= $donne['city'] ?>" ></th>
            </tr>
            <?php endforeach; ?>
            
        </table>

        <button type="submit">Select</button>
    </form>

</body>

</html>