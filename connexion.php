<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion - Gestion de Bibliothèque</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

header {
  background-color: #333;
  color: #fff;
  padding: 20px;
  text-align : center ;
}

nav ul {
  list-style-type: none;
  padding: 0;
}

nav ul li {
  display: inline;
  margin-right: 20px;
}

nav ul li a {
  color: #fff;
  text-decoration: none;
}

.container {
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

form {
  background-color: #f9f9f9;
  padding: 20px;
  border-radius: 5px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="email"],
input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

input[type="submit"] {
  background-color: #333;
  color: #fff;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}

input[type="submit"]:hover {
  background-color: #555;
}

.error {
  color: red;
  margin-bottom: 10px;
}
footer {
      background-color: #333;
      color: #fff;
      text-align: center;
      padding: 20px;
    }
  </style>
</head>
<body>

  <header>
    <h1>Connexion</h1>
    <nav>
      <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="inscription.php">Inscription</a></li>
      </ul>
    </nav>
  </header>

  <section class="container">
    <h2>Connectez-vous pour accéder à votre compte</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="email">Adresse Email :</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="password">Mot de passe :</label>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="Se connecter">
    </form>
    <p>Pas encore inscrit ? <a href="inscription.php">Inscrivez-vous ici</a>.</p>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Gestion de Bibliothèque . Tous droits réservés.</p>
  </footer>

  <?php
session_start();

// Traitement PHP pour gérer la connexion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données (exemple)
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; // Mot de passe de la base de données
    $dbname = "base_biblio";

    $conn = new mysqli($servername, $username, $dbpassword, $dbname);

    // Vérification de la connexion
    if ($conn->connect_error) {
        die("Erreur de connexion à la base de données : " . $conn->connect_error);
    }

    // Préparation de la requête SQL pour vérifier les identifiants de connexion
    $sql = "SELECT * FROM utilisateurs WHERE ad_email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Utilisateur trouvé, vérifier le mot de passe
        $row = $result->fetch_assoc();
        if ($password === $row['password']) { // Comparaison des mots de passe (remplacez par votre méthode de hachage)
            $_SESSION['email'] = $email; // Stocker l'email de l'utilisateur dans la session
            header("Location: catalogue.php");
            exit;
        } else {
            echo "<p class='error'>Mot de passe incorrect.</p>";
        }
    } else {
        // Aucun utilisateur trouvé avec cette adresse email
        echo "<p class='error'>Aucun utilisateur trouvé avec cette adresse email.</p>";
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>

</body>
</html>