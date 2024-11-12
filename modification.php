<?php
session_start();
include "fonctions.php";

// Initialise la variable $livre à null pour éviter les erreurs
$livre = null;

// Vérifie si un ID de livre est passé en paramètre
if (isset($_GET['livre_id'])) {
    $id = $_GET['livre_id'];
    // Récupérer les détails du livre à modifier
    $livre = getLivreById($id);
} elseif (isset($_POST['livre_id'])) {
    // Vérification de l'ID du livre
    $id = isset($_POST['livre_id']) ? $_POST['livre_id'] : null;

    if (!$id) {
        echo "Erreur: ID invalide.";
        exit();
    }

    // Récupération des données du formulaire
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $langue = isset($_POST['langue']) ? $_POST['langue'] : '';
    $ISBN = isset($_POST['ISBN']) ? $_POST['ISBN'] : '';
    // Vous devez récupérer le champ image ici si vous en avez besoin pour la mise à jour
    $image = isset($_POST['image']) ? $_POST['image'] : '';

    // Appel de la fonction pour modifier le livre
    $result = updateLivre($id, $nom, $auteur, $category, $langue, $ISBN, $image);

    if ($result) {
        echo "Le livre a été modifié avec succès.";
        header('location:livre.php');
    } else {
        echo "Erreur lors de la modification du livre.";
    }
    exit(); // Assurez-vous de terminer le script après la modification
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
    <title>admin:profil</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mt-4 mb-4">Modifier le livre</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <input type="hidden" name="id" value="<?php echo $livre['livre_id']; ?>">
                <div class="form-group">
                    <label for="nom">Nom du livre:</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $livre['nom']; ?>">
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur:</label>
                    <input type="text" class="form-control" id="auteur" name="auteur" value="<?php echo $livre['auteur']; ?>">
                </div>
                <div class="form-group">
                    <label for="category">Catégorie:</label>
                    <input type="text" class="form-control" id="category" name="category" value="<?php echo $livre['category']; ?>">
                </div>
                <div class="form-group">
                    <label for="langue">Langue:</label>
                    <input type="text" class="form-control" id="langue" name="langue" value="<?php echo $livre['langue']; ?>">
                </div>
                <div class="form-group">
                    <label for="ISBN">ISBN:</label>
                    <input type="text" class="form-control" id="ISBN" name="ISBN" value="<?php echo $livre['ISBN']; ?>">
                </div>
                <!-- Ajoutez ici les champs nécessaires pour l'image si vous en avez besoin -->
                <button type="submit" class="btn btn-success">Terminer</button>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="js/vendor/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
<!-- Graphs -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
</body>
</html>
