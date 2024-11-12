<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>

<?php

Session_start();

  
 
include 'fonctions.php';
$user = false;


if (!empty($_POST)) {
    $user = ConnectAdmin($_POST);
    if ($user) {
        Session_start();
        $_SESSION['id']= $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['mdps'] = $user['mdps'];
        header('Location: account.php');
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gg</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.min.css">
</head>
<body>
   
    
    <div class="p-4">
        <h1>adminConnexion</h1>
        <form action="adminconnexion.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="@gmail.com">
                <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quelqu'un d'autre.</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" name="mdps" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="btn btn-primary">Connecter</button>
        </form>
    </div>
 <br><br>
 
   

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.7/sweetalert2.all.min.js"></script>
<?php
if (!$user) {
    print "
    <script>
        Swal.fire({
            title: 'Erreur',
            text: 'Identifiants non valides',
            icon: 'error',
            confirmButtonText: 'OK',
            timer: 2000
        })
    </script>
    ";
}
?>
</html>