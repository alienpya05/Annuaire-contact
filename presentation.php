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


?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des contacts</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;600;700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,800;1,900&display=swap');
        body{   
            background-image: url('educ.jpg');
            background-attachment: fixed;
            background-size: cover;
        }
        
        h2{
            color: white;
        }
        table{
            background-color: white;
            opacity: 0.8; 
            /*
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0));
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            */
        }
        
    </style>
    <link rel="shortcut icon" href="OIP.jpeg" type="image/x-icon"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body>
    <div class="container-fluid mt-5">
        <h2>Liste des contacts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Profession</th>
                    <th>Ville</th>
                    <th>Boite Postale</th> 
                    <th>Adresse</th> 
                    <th>Naissance</th>
                    <th>Sex</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Récupérer les données depuis la base de données
                $requete = $mysqlClient->query("SELECT * FROM annuaire");
                $contacts = $requete->fetchAll(PDO::FETCH_ASSOC);

                foreach ($contacts as $contact) {
                    echo "<tr>";
                    echo "<td>" . $contact['nom'] . "</td>";
                    echo "<td>" . $contact['prenom'] . "</td>";
                    echo "<td>" . $contact['telephone'] . "</td>";
                    echo "<td>" . $contact['profession'] . "</td>";
                    echo "<td>" . $contact['ville'] . "</td>";
                    echo "<td>" . $contact['code_postal'] . "</td>";
                    echo "<td>" . $contact['adresse'] . "</td>";
                    echo "<td>" . $contact['date_naissance'] . "</td>";
                    echo "<td>" . $contact['sexe'] . "</td>";
                    echo "<td>" . $contact['description'] . "</td>";

                    
                    echo "<td>
                            <a href='modification.php?id=" . $contact['id'] . "' class='btn btn-primary btn-sm'>Modifier</a>
                            <a href='attention.php?id=" . $contact['id'] . "' class='btn btn-danger btn-sm'>Supprimer</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="fixed-bottom text-center mb-4">
        <a href="formulaire.php" class="btn btn-info btn-lg">Formulaire</a>
    </div>

</body>
</html>
