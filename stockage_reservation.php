<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base_biblio";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Récupérer les données du formulaire
$userName = $_POST['userName'];
$userEmail = $_POST['userEmail'];
$bookTitle = $_POST['bookTitle'];

// Requête pour récupérer l'ID de l'utilisateur en fonction de son email
$sql_user = "SELECT ID_utilisateur FROM utilisateurs WHERE ad_email = '$userEmail'";
$result_user = $conn->query($sql_user);

if ($result_user->num_rows > 0) {
    // Si l'utilisateur est trouvé, récupérer son ID
    $row_user = $result_user->fetch_assoc();
    $id_utilisateur = $row_user['ID_utilisateur'];
} else {
    // Si l'utilisateur n'est pas trouvé, afficher un message d'erreur et arrêter le script
    die("Utilisateur non trouvé.");
}

// Requête pour récupérer l'ID du livre en fonction de son titre
$sql_book = "SELECT id FROM livre WHERE nom= '$bookTitle'";
$result_book = $conn->query($sql_book);

if ($result_book->num_rows > 0) {
    // Si le livre est trouvé, récupérer son ID
    $row_book = $result_book->fetch_assoc();
    $id_livre = $row_book['id'];

    // Préparer et exécuter la requête SQL pour insérer les données dans la base de données
    $sql_reservation = "INSERT INTO reservation (ID_utilisateur, ID_livre, statut) VALUES ('$id_utilisateur', '$id_livre', 'en attente')";

    if ($conn->query($sql_reservation) === TRUE) {
        // Affichage d'une alerte JavaScript
        echo '<script>alert("Réservation enregistrée avec succès.");</script>';
        // Redirection vers la page catalogue après l'enregistrement de la réservation
        echo '<script>window.location.replace("catalogue.php");</script>';
    } else {
        echo "Erreur lors de l'enregistrement de la réservation : " . $conn->error;
    }
} else {
    // Si le livre n'est pas trouvé, afficher un message d'erreur et arrêter le script
    die("Livre non trouvé.");
}

// Fermer la connexion à la base de données
$conn->close();
?>
