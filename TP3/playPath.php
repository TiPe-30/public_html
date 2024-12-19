<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Playing music</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
<body>
    <header>
    </header>
    <?php
    // ajout d'un commentaire
        // Utilisation directe du nom de fichier sans encodage
        $music = './data/' . $_GET['music'];
    ?>
    <h1>Playing : <?= $_GET['music'] ?></h1>
    <main>
        <a href="./staticJukebox.html">Retour</a>
        <section id="play">
            <!-- Chemin du fichier image et audio sans encodage d'URL -->
            <img src="<?= $music ?>.jpeg" alt="Cover image of <?= $_GET['music'] ?>">
            <audio src="<?= $music ?>.mp3" controls="" autoplay=""></audio>
        </section>
    </main>
    <footer>
    </footer>
</body>
</html>
