<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Chemin vers le fichier autoload.php de PHPMailer

// Configuration des paramètres SMTP
ini_set('SMTP', 'localhost');
ini_set('smtp_port', 25);

// Traitement PHP pour gérer l'inscription et l'envoi d'email de confirmation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $tel = $_POST['phone'];
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

    // Vérification si l'email est déjà utilisé
    $check_email_query = "SELECT * FROM utilisateurs WHERE ad_email = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // L'email est déjà utilisé, afficher un message d'erreur
        echo "<p>L'email $email est déjà utilisé. Veuillez utiliser une autre adresse email.</p>";
    } else {
        // L'email n'est pas déjà utilisé, procéder à l'inscription
        // Préparation de la requête SQL pour insérer un nouvel utilisateur
        $sql = "INSERT INTO utilisateurs (nom, prenom, num_telephone, ad_email, password) VALUES ('$nom', '$prenom','$tel', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Envoi d'un email de confirmation avec PHPMailer
            $mail = new PHPMailer(true); // Active les exceptions

            try {
                // Configuration du serveur SMTP (Gmail dans ce cas)
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com'; // Adresse du serveur SMTP de Gmail
                $mail->SMTPAuth = true; // Authentification SMTP activée
                $mail->Username = 'VotreadresseemailGmail@gmail.com'; // Votre adresse email Gmail
                $mail->Password = 'Motdepasse'; // Mot de passe de votre adresse email Gmail
                $mail->SMTPSecure = 'tls'; // Protocole de sécurité (tls ou ssl)
                $mail->Port = 587; // Port SMTP

                // Destinataire
                $mail->setFrom('votreadresse@gmail.com', 'Nom de l\'expéditeur'); // Votre adresse email
                $mail->addAddress($email, $prenom); // Adresse email du destinataire

                // Contenu de l'email
                $mail->isHTML(true); // Email au format HTML
                $mail->Subject = 'Confirmation d\'inscription à la bibliothèque';
                $mail->Body    = "Cher $prenom $nom,<br><br>Vous avez été inscrit avec succès à notre bibliothèque en ligne.<br><br>Cordialement,<br>L'équipe de la bibliothèque.";

                $mail->send();
                echo "<p>Inscription réussie ! Un email de confirmation a été envoyé à votre adresse.</p>";
                // Redirection vers la page de connexion après inscription réussie
                header("Location: connexion.php");
                exit;
            } catch (Exception $e) {
                echo "<p>Erreur lors de l'envoi de l'email de confirmation : " . $mail->ErrorInfo . "</p>";
            }
        } else {
            echo "<p>Erreur lors de l'inscription : " . $conn->error . "</p>";
        }
    }

    // Fermeture de la connexion à la base de données
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription - Gestion de Bibliothèque</title>
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

input[type="text"],
input[type="email"],
input[type="tel"],
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
    <h1>Inscription</h1>
    <nav>
      <ul>
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="connexion.php">Connexion</a></li>

      </ul>
    </nav>
  </header>

  <section class="container">
    <h2>Inscrivez-vous pour accéder à notre bibliothèque en ligne</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
      <label for="nom">Nom :</label>
      <input type="text" id="nom" name="nom" required><br><br>
      <label for="prenom">Prénom :</label>
      <input type="text" id="prenom" name="prenom" required><br><br>
      <label for="phone"> Numéro de téléphone : </label>
      <input type="tel" id="phone" name="phone" placeholder="00.000.000" maxlength="8" required/><br><br>
      <label for="email"> Adresse Email :</label>
      <input type="email" id="email" name="email" required><br><br>
      <label for="password"> Mot de passe :</label>
      <input type="password" id="password" name="password" required><br><br>
      <input type="submit" value="S'inscrire">
    </form>
    <p>Déjà inscrit ? <a href="connexion.php">Connectez-vous ici</a>.</p>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Gestion de Bibliothèque . Tous droits réservés.</p>
  </footer>

</body>
</html>
