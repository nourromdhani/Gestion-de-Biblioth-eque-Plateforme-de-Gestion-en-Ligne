
<?php
// Démarrer la session
session_start();

// Fonction pour afficher les emprunts depuis la base de données avec un bouton "Modifier"
function afficherEmprunts() {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_biblio";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête SELECT pour récupérer les emprunts depuis la base de données
        $sql = "SELECT * FROM emprunts";
        $stmt = $conn->query($sql);

        // Afficher les données des emprunts avec un bouton "Modifier" devant chaque emprunt
        echo "<h2>Emprunts enregistrés :</h2>";
        echo "<form method='post' action='valider_emprunt.php'>";
        echo "<ul>";
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            // Vérifier si les champs sont définis avant de les afficher
            $nom = isset($row['nom']) ? $row['nom'] : "Nom non défini";
            $email = isset($row['email']) ? $row['email'] : "Email non défini";
            $titre_livre = isset($row['titre_livre']) ? $row['titre_livre'] : "Titre du livre non défini";
            $date_retour = isset($row['date_retour']) ? $row['date_retour'] : "Date de retour non définie";
            echo "<li>Nom : " . $nom . ", Email : " . $email . ", Titre du livre : " . $titre_livre . ", Date de retour : " . $date_retour . "  <a href='sendE.php' class='btn btn-success'>valider</a></li>";
            // Stocker l'email valide dans une variable de session
            $_SESSION['email'] = $email;
        }
        echo "</ul>";
        echo "</form>";
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des emprunts : " . $e->getMessage();
    }
}

// Appeler la fonction pour afficher les emprunts
afficherEmprunts();

?>
