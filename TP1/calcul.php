<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le calcul</title>
</head>

<body>
    <h1>Calcul</h1>
    <?php
    $opGauche = $_GET['a'] ?? "null";
    $opDroite = $_GET['b'] ?? "null";
    $op_calcul = $_GET['op'] ?? "null";
    if (!isset(($_GET['a'])) || !isset(($_GET['b'])) || !isset(($_GET['op']))) {
        print("Operator op missing");
    }else{
        switch ($op_calcul) {
            case '+':
                // on fait l'addition
                print ("$opGauche + $opDroite = " . $opGauche + $opDroite);
                break;
            case '-':
                print ("$opGauche - $opDroite = " . $opGauche - $opDroite);
                break;
            case '/':
                print ("$opGauche / $opDroite = " . $opGauche / $opDroite);
                break;
            case 'x':
                print ("$opGauche x $opDroite = " . $opGauche * $opDroite);
                break;
        }
    }
    ?>

</body>

</html>