<?php 
Session_start();
include "fonctions.php";
$categ = getAllCategorie();
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
                <a class="nav-link  <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'home.php') ? 'active' : ''; ?>" href="../home.php">
                  <span data-feather="home"></span>
                 HOME <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
    <a class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'liste.php') ? 'active' : ''; ?>" href="../categorie/liste.php">
        <span data-feather="layers"></span>
        CATEGORIE
    </a>
</li>


<li class="nav-item">
    <a class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'livre.php') ? 'active' : ''; ?>" href="../product/produit.php">
        <span data-feather="layers"></span>
        livre
    </a>
</li>
<li class="nav-item">
    <a class="nav-link 'active'<?php echo (basename($_SERVER['SCRIPT_NAME']) == 'client/user.php') ? 'active' : ''; ?>" href="../client/user.php">
        <span data-feather="layers"></span>
        customers
    </a>
</li>
             
          
              <li class="nav-item">
    <a class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'acount.php') ? 'active' : ''; ?>" href="../acount.php">
        <span data-feather="layers"></span>
        PROFIL
    </a>
</li>


            </ul>

            
            
          </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">category list</h1>
            <div>
            <a class="btn btn-primary"data-toggle="modal"data-target="#exampleModal">ADD</a>
    
            </div>
           
    
            </div>
          

          
          <div>
            <?php  if(isset($_GET['ajout'])&&$_GET['ajout']=='ok'){
              print '<div class="alert alert-success">
              categorie ajouter </div>';
            }
            ?>
            
          <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Descrip</th>
      <th scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
  <?php 
  
  $i = 0;
   foreach ($categ as $categorie) { $i++; print '
     <tr> <th scope="row">' . $i . '</th> <td>' . $categorie['nom'] . '</td> <td>' . $categorie['description'] . '</td>
      <td><a onclick="return popUpDeleteCategorie()" href="supp.php?idcategorie" class="btn btn-danger">Delete</a>
      </td> </tr>'; } ?>
    
    
   
  </tbody>
</table>
  

</div>
          </div>

          
         
        </main>
      </div>
    </div>
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout categorie:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  action="ajout.php" method="POST">
<div class="form-group">
  <input type="text" name="nom" required class="form-control" >
</div>
<div class="form-group">
  <textarea  name="description" class="form-control" ></textarea>
</div>
<div class="form-group">
<input type="hidden" name="editeur" value="<?php echo $_SESSION['id']; ?>">
      <button type="submit" class="btn btn-primary">ADD</button>
    </form>

      
  </div>
      <div class="modal-footer">
       
        
      </div>
      </form>
    </div>
  </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
    <script>


function popUpDeleteCategorie(id) {
    
    
    return confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?") ;
}
    </script>
  </body>
</html>




