
<?php

    
    try {

        // On se connecte à MySQL
        $mysqlClient = new PDO(
            'mysql:host=localhost;dbname=repertoire;charset=utf8;port=3306',
            'root',
            'root'
        );
       

    } catch (exception $e) {
        // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : ' . $e->getMessage());
    }
    $creation_table = "CREATE TABLE IF NOT EXISTS annuaire (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nom VARCHAR(255) ,
        prenom VARCHAR(255) ,
        telephone VARCHAR(20) ,
        profession VARCHAR(100),
        ville VARCHAR(100),
        code_postal VARCHAR(10),
        adresse VARCHAR(255),
        date_naissance DATE NULL,
        sexe ENUM('Homme', 'Femme') NULL,
        description TEXT
    )";

    $creation = $mysqlClient -> prepare($creation_table);
    $creation -> execute();

    // Création des variables pour stoker les donner reçu du formulaire
    
        // Vérifie que les champs nom prenom et telephone 
        if (
            isset($_POST['nom']) &&
            isset($_POST['prenom']) &&
            isset($_POST['telephone'])
        ) {
            // Récupération des valeurs
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $telephone = $_POST['telephone'];
    
            // Attribuer des valeurs par défaut aux champs facultatifs si non renseignés
            $profession = isset($_POST['profession']) ? $_POST['profession'] : '';
            $ville = isset($_POST['ville']) ? $_POST['ville'] : '';
            $code_postal = isset($_POST['code_postal']) ? $_POST['code_postal'] : '';
            $adresse = isset($_POST['adresse']) ? $_POST['adresse'] : '';
            $date_naissance = !empty($_POST['date_naissance']) ? $_POST['date_naissance'] : null;
            $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : null;
            $description = isset($_POST['description']) ? $_POST['description'] : '';
    
            // Requête d'insertion uniquement si les champs obligatoires sont remplis
            $insertion = "INSERT INTO annuaire (nom, prenom, telephone, profession, ville, code_postal, adresse, date_naissance, sexe, description)
                    VALUES (:nom, :prenom, :telephone, :profession, :ville, :code_postal, :adresse, :date_naissance, :sexe, :description)";
    
            $execution = $mysqlClient->prepare($insertion);
            $execution->execute([
                'nom' => $nom,
                'prenom' => $prenom,
                'telephone' => $telephone,
                'profession' => $profession,
                'ville' => $ville,
                'code_postal' => $code_postal,
                'adresse' => $adresse,
                'date_naissance' => $date_naissance,
                'sexe' => $sexe,
                'description' => $description,
            ]);
    
            header("Location: felicitation.php");
            exit();
        } else {
            echo "Veuillez remplir tous les champs obligatoires.";
        }
         
?>