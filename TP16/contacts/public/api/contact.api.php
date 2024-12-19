<?php
// Besoin de la classe pour lancer les requêtes 
require_once(__DIR__ . "/../../model/contact.class.php");

// Tableau qui contient la réponse
$out = [];
// Un parametre action est obligatoire
if (! isset($_GET['action'])) {
    $out['error'] = "parameter 'action' is missing";
} else {
    // Examine l'action demandée
    $action = $_GET['action'];

    switch ($action) {
            // Lecture des contacts sachant le nom
        case 'read':
            // Il faut un nom
            $nom = $_GET['nom'] ?? '';
            if ($nom == '') {
                $out['error'] = "nom missing for read";
                break;
            }
            // Lance la demande
            try {
                $contacts = Contact::read($nom);
                // Passe tous les objets en résultat
                $out['contacts'] = $contacts;
            } catch (Exception $e) {
                // Retourne le message d'erreur
                $out['error'] = $e->getMessage();
            }
            break;
            // 
            // Lecture des contacts sachant un motif
        case 'readLike':
            // Il faut un motif
            $pattern = $_GET['pattern'] ?? '';
            if ($pattern == '') {
                $out['error'] = "pattern missing for readLike";
                break;
            }
            // Lance la demande
            try {
                $contacts = Contact::readLike($pattern);
                // Passe tous les objets en résultat
                $out['contacts'] = $contacts;
            } catch (Exception $e) {
                // Retourne le message d'erreur
                $out['error'] = $e->getMessage();
            }
            break;
            //
        default:
            $out['error'] = "incorrect action '$action'";
    }
}

// Sort la réponse
// 
// Change le type de réponse en cas d'erreur
if (isset($out['error'])) {
    header("HTTP/1.1 400 Bad Request");
}
// Indique dans le header que l'on sort du JSON
header('Content-Type: application/json; charset=utf-8');
print(json_encode($out));
//