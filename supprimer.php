
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

   
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $contact_id = $_GET['id'];

        $deleteQuery = $mysqlClient->prepare("DELETE FROM annuaire WHERE id = $contact_id");
        $deleteQuery->execute();

        header("Location: presentation.php");
        exit();
    } else {
        echo "ID du contact non spécifié.";
    }
?>
