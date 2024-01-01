<?php 
try {
    // Connexion à MySQL
    $mysqlClient = new PDO(
        'mysql:host=localhost;dbname=repertoire;charset=utf8;port=3306',
        'root',
        'root'
    );
} catch (Exception $e) {
    // En cas d'erreur, afficher un message et arrêter le script
    die('Erreur : ' . $e->getMessage());
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Récupérer les données du formulaire
        $contact_id = $_POST['contact_id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $profession = $_POST['profession'];
        $ville = $_POST['ville'];
        $code_postal = $_POST['code_postal'];
        $adresse = $_POST['adresse'];
        $date_naissance = $_POST['date_naissance'];
        $sexe = $_POST['sexe'];
        $description = $_POST['description'];

        // Requête SQL pour mettre à jour les données du contact
        $update = "UPDATE annuaire SET nom=?, prenom=?, telephone=?, profession=?, ville=?, code_postal=?, adresse=?, date_naissance=?, sexe=?, description=? WHERE id=?";
        $params = [$nom, $prenom, $telephone, $profession, $ville, $code_postal, $adresse, $date_naissance, $sexe, $description, $contact_id];

        // Parcourir les champs et conserver la valeur existante si un champ est vide dans le formulaire
        foreach ($_POST as $key => $value) {
            if ($value === '') {
                $params[array_search($key, array_keys($_POST))] = $contact[$key];
            }
        }

        $stmt = $mysqlClient->prepare($update);
        $stmt->execute($params);

        header("Location: presentation.php");
        exit();
    } catch (PDOException $e) {
        
        die('Erreur lors de la mise à jour : ' . $e->getMessage());
    }
}


?>