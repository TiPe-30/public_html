<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Test abbr</title>
</head>
<style media="screen">
abbr,th {
  color: blue;
}
</style>
<body>

<?php 
    $tab_abr = array('HTML' => 'HyperText Markeup Language',
    'XML' => 'eXtended Markeup Language','PHP' => 'Hypertext PreProcessor', 'CSS' => 'Cascading Style Sheets');
    function abbr(string $abbr): string {
        global $tab_abr;
        return !isset($tab_abr[$abbr]) ? $abbr:"<abbr title=$tab_abr[$abbr]>$abbr</abbr>";
    }
    function bbrAll() : string { 
        $chaine = "";
        global $tab_abr;
        foreach($tab_abr as $v){
            $chaine .= $v;
        }
        return $chaine;
    }
?>

  <h1>Exemple d'utilisation des abréviations en HTML</h1>

  <p>Le langage <?= abbr(abbr: 'PHP') ?> produit généralement
    du <?= abbr(abbr: 'HTML') ?> mais peu produire aussi
    du <?= abbr(abbr: 'XML') ?> ou même
    du <?= abbr(abbr: 'CSS') ?>.
  </p>
  <p>Voici toutes les abbréviations connues : </p>
  <table>
    <tr><th>HTML</th><td>HyperText Markeup Language</td></tr>
    <tr><th>XML</th><td>eXtended Markeup Language</td></tr>
    <tr><th>PHP</th><td>Hypertext PreProcessor</td></tr>
    <tr><th>CSS</th><td>Cascading Style Sheets</td></tr>
  </table>
  <p> <?= bbrAll() ?></p>
</body>
</html>
