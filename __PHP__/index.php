<?php
header("Content-Type: application/json; charset=UTF-8");
$post = file_get_contents("php://input");
include 'Personne.php';

/**
 * @author Papa Magueye GUEYE - MagueyeTech
 * @email magueyetech@gmail.com
 * @create date 02/07/2020 22:34:45
 * @modify date 02/07/2020 22:34:45
 * @desc [description]
 */

// ?addpersonnne
// Ajouter une personne
if ($post) {
    $data = json_decode($post, true);
    if (isset($data['add'])) {
        $P = new Personne($data['add']);
        echo json_encode(['inserted' => $P->save()]);
    } else if (isset($data['update'])) {
        $P = new Personne($data['update']);
        echo json_encode(['updated' => $P->update()]);
    }
}

// ?personnes
//Liste des personnes
if (isset($_GET['personnes'])) {
    $P = new Personne();
    echo json_encode($P->findAll());
}

// ?getDetails={id}
if (isset($_GET['getDetails'])) {
    $P = new Personne(['IdP' => $_GET['getDetails']]);
    echo json_encode($P->get());
}


// ?delete={id}
// Supprimer une personne
if (isset($_GET['delete'])) {
    $P = new Personne(['IdP' => $_GET['delete']]);
    echo json_encode(['deleted' => $P->delete()]);
}
