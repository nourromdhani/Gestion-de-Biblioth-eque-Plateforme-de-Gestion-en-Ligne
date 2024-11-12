<?php





include "fonctions.php";


  $livres = searchlivre($_POST['search']);







  


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>biblio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
  
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
<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">nom_biblio</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
              
              
               
              
             
                
               
             
            </ul>
            <form class="d-flex" action="catalogue.php" method="POST">
    <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success" type="submit" name="click">Search</button>
   
</form>
          </div>
        </div>
      </nav>
<body>

  

 
</head>
<body>

  

<body>


<div class="container">
    <br><br>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php
        foreach($livres as $livre){
            print '  <div class="col-lg-4 col-md-6 col-sm-12 product-card" mb-2>
                <div class="card h-100">
                    <img src="img'.$livre['nom'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">'.$livre['auteur'].'</h5>
                        <p class="card-text">'.$livre['category'].'</p>
                        <p class="card-text">'.$livre['langue'].'</p>
                        
                        <p class="card-text">Catégorie: '.$livre['ISBN'].'</p>
                        <a href="card.php?id='.$livre['id'].'" class="btn btn-primary">emprunter</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>






    
 <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br>  <br> 
</div>
<footer>
    <p>&copy; <?php echo date("Y"); ?> Gestion de Bibliothèque . Tous droits réservés.</p>
  </footer>


</div>
    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


