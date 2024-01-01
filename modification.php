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
    $contact_id = $_GET['id']; 

    

    // Requête pour obtenir les détails du contact à modifier
    $stmt = $mysqlClient->prepare("SELECT * FROM annuaire WHERE id = $contact_id");
    $stmt->execute();
    $contact = $stmt->fetch();

?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modification</title>
        <link rel="shortcut icon" href="OIP.jpeg" type="image/x-icon"/>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=AR+One+Sans:wght@400;500;600;700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,800;1,900&display=swap');
            body{
                background-color: #f4f4f4;
                background-image: url('assets/carnet.jpg');
                background-attachment: fixed;
                background-size: cover;
            }
            h1{
                text-align: center;
                font-family: 'Montserrat', sans-serif;
                text-decoration:wavy;
                color: red;
            }
            #form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            font-family: Arial, sans-serif;
            opacity: 0.8;
           
            }

            form {
                background-color: #fff;
                padding: 40px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 400px;
            }

            form div {
                margin-bottom: 15px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }

            input[type="text"],
            input[type="tel"],
            input[type="date"],
            textarea {
                width: calc(100% - 10px);
                padding: 8px;
                border-radius: 4px;
                border: 1px solid #ccc;
            }

            input[type="radio"] {
                margin-right: 5px;
            }

            input[type="submit"] {
                padding: 10px 150px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }

            input[type="submit"]:hover {
                background-color: #45a049;
            }
            #radio{
                display: flex;
                justify-content: space-around;
                
            }
            #codeVille{
                display: flex;
                justify-content: space-between;
            }
            

        </style>
    </head>
    <body>
    <h1>Modification d'informations</h1>
    <div id="form">
        <form action="modifier.php" method="POST">
            <!- cet champ contient l'id du contact>
            <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">

            <div>
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom" value="<?php echo $contact['nom']; ?>">
            </div>
            <span id="nom_error"></span>

            <div>
                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" value="<?php echo $contact['prenom']; ?>">
            </div>
            <span id="prenom_error"></span>

            <div>
                <label for="telephone">Téléphone *</label>
                <input type="tel" id="telephone" name="telephone" value="<?php echo $contact['telephone']; ?>">
            </div>
            <span id="telephone_error"></span>

            <div>
                <label for="profession">Profession </label>
                <input type="text" id="profession" name="profession" value="<?php echo $contact['profession']; ?>">
            </div>
            <span id="profession_error"></span>
            <div id="codeVille">
                <div>
                    <label for="ville">Ville </label>
                    <input type="text" id="ville" name="ville" value="<?php echo $contact['ville']; ?>">
                </div>
                <div>
                    <label for="code_postal">Code Postal </label>
                    <input type="text" id="code_postal" name="code_postal" value="<?php echo $contact['code_postal']; ?>">
                </div>
            </div>
            <div>
                <label for="adresse">Adresse </label>
                <textarea id="adresse" name="adresse"><?php echo htmlspecialchars($contact['adresse']); ?></textarea>
            </div>
            <span id="adresse_error"></span>
            <div>
                <label for="date_naissance">Date de naissance </label>
                <input type="date" id="date_naissance" name="date_naissance" value="<?php echo $contact['date_naissance']; ?>">
            </div>
            <span id="dateNaissance_error"></span>
            <div>
            <label>Sexe :</label>
            <div id="radio">
                <label for="homme">Homme  :</label>
                <input type="radio" id="homme" name="sexe" value="Homme"  <?php if ($contact['sexe'] === 'Homme') echo 'checked'; ?>>
                <label for="femme">Femme  :</label>
                <input type="radio" id="femme" name="sexe"  value="Femme" <?php if ($contact['sexe'] === 'Femme') echo 'checked'; ?>>   
            </div> 
            <span id="sex_error"></span>
            </div>
            <div>
                <label for="description">Description </label>
                <textarea id="description" name="description" ><?php echo htmlspecialchars($contact['description']); ?></textarea>
            </div>
            <span id="description-error"></span>

            <div>
                <input type="submit" value="     Modifier       " id="soumettre">
            </div>
        </form>
    </div>

    </body>
</html>