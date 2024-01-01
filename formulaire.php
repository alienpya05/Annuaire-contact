<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire</title>
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
    <h1>Information</h1>
    <div id="form">
            <form action="enregistrer.php" method="post" id="formulaire">
            <div>
                <label for="nom">Nom *</label>
                <input type="text" id="nom" name="nom">
            </div>
            <span id="nom_error"></span>
            <div>
                <label for="prenom">Prénom *</label>
                <input type="text" id="prenom" name="prenom" >
            </div>
            <span id="prenom_error"></span>
            <div>
                <label for="telephone">Téléphone *</label>
                <input type="tel" id="telephone" name="telephone" >
            </div>
            <span id="telephone_error"></span>
            <div>
                <label for="profession">Profession </label>
                <input type="text" id="profession" name="profession" >
            </div>
            <span id="profession_error"></span>
            <div id="codeVille">
                <div>
                    <label for="ville">Ville </label>
                    <input type="text" id="ville" name="ville" >
                </div>
                <div>
                    <label for="code_postal">Code Postal </label>
                    <input type="text" id="code_postal" name="code_postal" >
                </div>
            </div>
            <div>
                <label for="adresse">Adresse </label>
                <textarea id="adresse" name="adresse" ></textarea>
            </div>
            <span id="adresse_error"></span>
            <div>
                <label for="date_naissance">Date de naissance </label>
                <input type="date" id="date_naissance" name="date_naissance" >
            </div>
            <span id="dateNaissance_error"></span>
            <div>
            <label>Sexe :</label>
            <div id="radio">
                <label for="homme">Homme  :</label>
                <input type="radio" id="homme" name="sexe" value="Homme" >
                <label for="femme">Femme  :</label>
                <input type="radio" id="femme" name="sexe" value="Femme" >   
            </div> 
            <span id="sex_error"></span>
            </div>
            <div>
                <label for="description">Description </label>
                <textarea id="description" name="description"></textarea>
            </div>
            <span id="description-error"></span>
            <div>
                <input type="submit" value="Enregistrement" id="soumettre">
            </div>
        </form>

        
    </div>
   
  <script>
        var formulaire = document.querySelector("#formulaire");
        var champ_nom =  document.querySelector('#nom');
        var champ_prenom = document.querySelector('#prenom');
        var champ_telephone = document.querySelector('#telephone');
        formulaire.addEventListener('submit',function(event){

            var probleme = false;

            // vérification des champs nom && prenom
            if(champ_nom.value === ""){
                event.preventDefault();
                champ_nom.style.borderColor = "red";
                document.getElementById('nom_error').innerText = " Ce champ est Obligatoire " ;
                alert('Le champ Nom , prenom et telephone sont Obligatoire');
                probleme = true;
            }
            
            if(champ_prenom.value === ""){
                event.preventDefault();
                champ_prenom.style.borderColor = "red";
                document.getElementById('prenom_error').innerText = " Ce champ est Obligatoire ";
                probleme = true;
            }

            
            if (champ_telephone.value === "") {
                event.preventDefault();
                champ_telephone.style.borderColor = "red";
                document.getElementById('telephone_error').innerText = "Ce champ est Obligatoire";
                probleme = true;
            }
            const regexDigits = /^\d+$/; 
            if (champ_telephone.value !== "" && !regexDigits.test(champ_telephone.value)) {
                event.preventDefault();
                champ_telephone.style.borderColor = "red";
                document.getElementById('telephone_error').innerText = "Le champ doit contenir uniquement des chiffres";
                erreur = true;
            }
            
                
        });

  </script>
    </body>
</html>