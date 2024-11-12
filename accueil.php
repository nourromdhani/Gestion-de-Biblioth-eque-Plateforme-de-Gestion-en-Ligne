<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accueil - Gestion de Bibliothèque</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Lien vers Font Awesome pour les icônes -->
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
    .banner h1 {
  margin: 0;
}

.banner p {
  margin-top: 5px;
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

    .hero {
      background-color: #f4f4f4;
      padding: 50px 0;
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
    }
    
.features {
  background-color: #f4f4f4;
  max-width: 800px;
  margin: 20px auto;
}

.feature {
  display: flex;
  align-items: center;
}

.feature i {
  font-size: 24px;
  margin-right: 10px;
}

.separator {
  border-top: 1px solid #ccc;
  margin: 20px 0;
}

.cta {
  background-color: #f9f9f9;
  padding: 20px;
  text-align: center;
}

.cta h2 {
  margin-top: 0;
}

.cta p {
  margin-bottom: 20px;
}

    .btn {
      display: inline-block;
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #555;
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
    <h1>Gestion de Bibliothèque</h1>
    <nav>
      <ul> 
        <li><a href="accueil.php">Accueil</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="inscription.php">Inscription</a></li>
      </ul>
    </nav>
  </header>

  <section class="hero">
    <div class="container">
      <h2>Bienvenue sur notre bibliothèque en ligne</h2>
      <p>
        Bienvenue à la bibliothèque communautaire de ISIGK. Notre bibliothèque est un centre dynamique de connaissances, d'éducation et de divertissement, ouvert à tous les membres de la communauté. Dotée d'une vaste collection de livres, de ressources numériques, de périodiques et bien plus encore, notre bibliothèque s'efforce de répondre aux besoins de chacun, quels que soient leurs intérêts ou leur âge.

Notre mission principale est de fournir un accès équitable à l'information et à la culture, de promouvoir la littératie et l'apprentissage tout au long de la vie, et de favoriser un environnement accueillant et inclusif pour tous nos utilisateurs.

En tant que centre d'apprentissage, nous offrons une variété de services et de programmes pour soutenir l'éducation formelle et informelle. Des clubs de lecture pour enfants aux ateliers informatiques pour adultes, en passant par les conférences publiques et les expositions artistiques, notre bibliothèque est un lieu où les idées se rencontrent, où les curiosités sont nourries et où les communautés se rassemblent.

Nos bibliothécaires dévoués sont là pour vous guider dans vos recherches, vous aider à trouver le livre parfait, ou vous orienter vers les ressources dont vous avez besoin. Nous offrons également des services de prêt entre bibliothèques pour accéder à des documents qui ne sont pas disponibles dans notre collection locale.

Que vous soyez un lecteur passionné, un chercheur avide de connaissances ou simplement à la recherche d'un endroit calme pour vous détendre, nous sommes là pour vous accueillir et vous aider à explorer le monde des idées et de la créativité. Venez nous rendre visite et découvrez tout ce que notre bibliothèque a à offrir ! .</p>
      <a href="connexion.php" class="btn">Explorer le catalogue</a>
    </div>
  </section>
  <section class="features">
    <h2>Fonctionnalités principales</h2>
    <div class="feature">
      <i class="fas fa-search"></i>
      <h3>Recherche de Livres</h3>
      <p>Explorez notre vaste catalogue de livres et trouvez facilement ce que vous cherchez.</p>
    </div>
    <div class="separator"></div>
    <div class="feature">
      <i class="fas fa-book"></i>
      <h3>Réservation en Ligne</h3>
      <p>Réservez vos livres préférés en ligne et venez les chercher à votre convenance.</p>
    </div>
    <div class="separator"></div>
    <div class="feature">
      <i class="fas fa-user"></i>
      <h3>Gestion de Compte</h3>
      <p>Connectez-vous pour gérer vos emprunts, vos réservations et vos préférences.</p>
    </div>
  </section>

  <section class="cta">
    <h2>Commencez dès aujourd'hui</h2>
    <p>Inscrivez-vous dès maintenant pour accéder à notre bibliothèque en ligne et profiter de tous nos services. </p>
    <a href="inscription.php" class="btn"> S'inscrire </a>
  </section>

  <footer>
    <p>&copy; <?php echo date("Y"); ?> Gestion de Bibliothèque . Tous droits réservés.</p>
  </footer>

  <script>
    // Vous pouvez ajouter des scripts JavaScript ici si nécessaire
  </script>
</body>
</html>