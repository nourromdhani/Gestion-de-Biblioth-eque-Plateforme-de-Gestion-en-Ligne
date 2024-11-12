<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation de livre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }

        h1 {
            text-align: center
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #228B22;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #228B22;
        }

        .success-message {
            margin-top: 10px;
            padding: 10px;
            background-color: #dff0d8;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Réservation de livre</h1>
    <form id="reservationForm" action="stockage_reservation.php" method="post">
        <label for="userName">Nom complet :</label>
        <input type="text" id="userName" name="userName" required><br><br>
        
        <label for="userEmail">Email :</label>
        <input type="email" id="userEmail" name="userEmail" required><br><br>
        
        <label for="bookTitle">Titre du livre :</label>
        <input type="text" id="bookTitle" name="bookTitle" ><br><br>

        <input type="submit" value="Réserver" id="reserveButton">
    </form>
    <p><a href="catalogue.php">retourner au catalogue</a>.</p>

    <script>
        // Fonction pour afficher une alerte de succès après la réservation
        function showSuccessAlert() {
            alert("Réservation enregistrée avec succès.");
        }

        // Récupération du formulaire et ajout d'un écouteur d'événement pour afficher l'alerte de succès
        var form = document.getElementById('reservationForm');
        form.addEventListener('submit', showSuccessAlert);
    </script>
</body>
</html>
