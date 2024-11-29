<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table de multiplication</title>
    <link rel="stylesheet" href="./style/tableMult.css">
</head>
<body>
<h1>Table de multiplication</h1>
<!-- <tr>pour les lignes</tr>, <td>pour les colonnes</td> -->
 <table>
<?php
    for($i = 1;$i <= 10;$i++){
        print("<tr>");
        for($j = 1; $j <= 10;$j++){
            print("<td>");
            print($i * $j);
            print("</td>");
        }
        print("</tr>");
    }
?>
</table>

</body>
</html>