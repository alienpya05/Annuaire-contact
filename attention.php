<?php

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $contact_id = $_GET['id'];
?>

    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <title>Confirmation de suppression</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Attention !</h4>
                <p>Vous êtes sur le point de supprimer ce contact. Êtes-vous sûr de vouloir continuer ?</p>
                <hr>
                <a href='supprimer.php?id=<?php echo $contact_id; ?>' class='btn btn-danger'>Supprimer le contact</a>
                <a href='presentation.php' class='btn btn-secondary'>Annuler</a>
            </div>
        </div>
    </body>
    </html>

    <?php
} else {
    // Si l'ID du contact est absent ou invalide
    echo "ID du contact non spécifié.";
}
?>
