<?php 
session_start();
include 'fonctions.php';

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $nom = $_POST['userName'];
    $email = $_POST['userEmail'];
    $titre_livre = $_POST['bookTitle'];
    $date_retour = $_POST['returnDate'];

    // Appeler la fonction pour enregistrer l'emprunt
    $emprunt = enregistrerEmprunt($nom, $email, $date_retour, $titre_livre);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprunt de livre</title>
    <style>
        /* Votre code CSS reste inchangé */
    </style>
</head>
<body>
    <h1>Emprunt de livre</h1>
    <form id="empruntForm" action="emprunt.php" method="post">
        <label for="userName">Nom complet :</label>
        <input type="text" id="userName" name="userName" required><br>
        
        <label for="userEmail">Email :</label>
        <input type="email" id="userEmail" name="userEmail" required><br>
        
        <label for="bookTitle">Titre du livre :</label>
        <input type="text" id="bookTitle" name="bookTitle" required><br>

        <label for="returnDate">Date de retour prévue :</label>
        <input type="date" id="returnDate" name="returnDate" required><br>

        <input type="submit" value="Emprunter" id="borrowButton">
    </form>

    <p><a href="catalogue.php">Retourner au catalogue</a>.</p>

    <div id="successMessage" class="success-message" style="display: none;">
        Emprunt enregistré avec succès.
    </div>


    <script>
        document.getElementById('empruntForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', this.action, true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('successMessage').style.display = 'block';
                    document.getElementById('empruntForm').reset();
                    alert("Votre demande d'emprunt a été enregistrée avec succès. Un email de confirmation sera envoyé à votre adresse.");
                }
            };
            xhr.send(formData);
        });
    </script>
</body>
</html>
