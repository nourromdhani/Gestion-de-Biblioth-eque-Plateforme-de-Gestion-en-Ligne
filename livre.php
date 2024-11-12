<?php 
session_start();
include 'fonctions.php';


// Variable pour stocker les livres à afficher
$livres = [];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Récupérer un seul livre par son ID
    $livres = getLivreById($id);

    // Vérifier si un livre a été trouvé
    if (!$livre) {
        echo "Aucun livre trouvé avec cet ID.";
    }
} else {
    // Récupérer tous les livres si aucun ID n'est spécifié
    $livres = getAllLivres();
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
<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../../logout.php">sign out</a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                   
                    
                    <li class="nav-item">
                       <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'livre.php' ? 'active' : ''; ?>" href="livre.php">
                            <span data-feather="layers"></span>livre
                       </a>
                       </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " href="account.php">
                            <span data-feather="layers"></span>
                            PROFIL
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h1 class="h2">book list</h1>
                <div>
                    <a class="btn btn-primary" data-toggle="modal" data-target="#addBookModal">Add </a>
                </div>
            </div>
            <div>
                <?php
                if(isset($_GET['ajout']) && $_GET['ajout'] == 'ok') {
                    print '<div class="alert alert-success">book add successfully </div>';
                }

                if (isset($_GET['suppression']) && $_GET['suppression'] == 'ok') {
                    echo '<div class="alert alert-success">book successfully deleted</div>';
                }
                 
                ?>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">auteur</th>
                        <th scope="col">category</th>
                        <th scope="col">langue</th>
                        <th scope="col">ISBN</th>
                        <th scope="col">image</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($livres as $livre) : ?>
                        <tr>
                            
                            <td><?php echo $livre['nom']; ?></td>
                            <td><?php echo $livre['auteur']; ?></td>
                            <td><?php echo $livre['category']; ?></td>
                            <td><?php echo $livre['langue']; ?></td>
                            <td><?php echo $livre['ISBN']; ?></td>
                            <td><?php echo $livre['image']; ?></td>
                            <td><?php echo $livre['livre_id']; ?></td>
                            <td>
                                <a href="suppression.php?livre_id=<?php echo $livre['livre_id']; ?>" class="btn btn-danger">Delete</a>
                                  <a href="modification.php?livre_id=<?php echo $livre['livre_id']; ?>" class="btn btn-success">Modifier</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Modal d'ajout de livre -->
            <div class="modal fade" id="addBookModal" tabindex="-1" aria-labelledby="addBookModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addBookModalLabel">Add book:</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="ajouter.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" name="nom" required class="form-control" placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="auteur" required class="form-control" placeholder="Auteur">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="category" required class="form-control" placeholder="category">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="text" name="langue" required class="form-control" placeholder="Langue">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="ISBN" required class="form-control" placeholder="ISBN">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" required class="form-control" placeholder="Image">
                                </div>
                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
     
         

                        </div>
                    </div>
                </div>
            </div>
        </main>
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

<!-- Code JavaScript pour masquer l'alerte après un certain temps -->
<script>
    setTimeout(function() {
        var suppressionAlert = document.getElementById('suppressionAlert');
        if (suppressionAlert) {
            suppressionAlert.style.display = 'none';
        }
    }, 5000);// Durée en millisecondes (5000 ms = 5 secondes)
    
</script>
</body>
</html>
