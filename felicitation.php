<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Succès</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-image: url('assets/carnet.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Ajout de styles pour centrer le contenu */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Ajuste la hauteur à la taille de l'écran */
        }

        .alert {
            width: 80%; /* Largeur de l'alerte */
            text-align: center; /* Centrage du texte */
        }

        .btn-container {
            margin-top: 20px; /* Marge au-dessus des boutons */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Les données ont été insérées avec succès !</h4>
            <p>Merci pour votre contribution.</p>
        </div>
        <div class="btn-container">
            <div class="row">
                <div class="col">
                    <a href="formulaire.php" class="btn btn-primary btn-lg">Formulaire</a>
                </div>
                <div class="col">
                    <a href="presentation.php" class="btn btn-secondary btn-lg">Présentation</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
