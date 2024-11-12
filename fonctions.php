<?php

function getLivreById($livre_id) {
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "base_biblio";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM livre WHERE livre_id = :livre_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':livre_id', $livre_id);
        $stmt->execute();
        
        $book = $stmt->fetch();
        return $book;
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}

function getAllLivres() {
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "base_biblio";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM livre";
        $stmt = $conn->query($query);
        
        $books = $stmt->fetchAll();
        return $books;
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
    }
}


function ConnectAdmin(){
  $servername = "localhost";
  $DBuser = "root";
  $DBpassword = "";
  $DBname = "base_biblio";

  try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $email = $_POST['email'];
      $mdps = $_POST['mdps'];

      // Utilisation de marqueurs de liaison pour prévenir les injections SQL
      $requette = "SELECT * FROM admin WHERE email = :email AND mdps = :mdps";
      $stmt = $conn->prepare($requette);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':mdps', $mdps, PDO::PARAM_STR);
      $stmt->execute();
      $user = $stmt->fetch(PDO::FETCH_ASSOC);

      return $user;
  } catch(PDOException $e) {
      echo "Erreur : " . $e->getMessage();
  }
}

function supprimerlivreById ($livre_id){
    $servername="localhost";
$DBuser="root";
$DBpassword="";
$DBname="base_biblio";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
      $requete = "DELETE FROM livre WHERE livre_id = $livre_id";
      $resultat = $conn->exec($requete);

      header('Location: livre.php?suppression=ok');
      exit();
  } catch(PDOException $e) {
      echo "Erreur lors de la suppression du livre : " . $e->getMessage();
  }
}
 function updateLivre($livre_id, $nom, $auteur, $category, $langue, $ISBN, $image) {
    $servername = "localhost";
    $DBuser = "root";
    $DBpassword = "";
    $DBname = "base_biblio";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
        // Définit le mode d'erreur PDO sur exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = "UPDATE livre SET nom = :nom, auteur = :auteur, category = :category, langue = :langue, ISBN = :ISBN, image = :image WHERE livre_id = :livre_id";
        $stmt = $conn->prepare($requete);
        $stmt->bindParam(':livre_id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':auteur', $auteur);
        $stmt->bindParam(':category', $category);
        $stmt->bindParam(':langue', $langue);
        $stmt->bindParam(':ISBN', $ISBN);
        $stmt->bindParam(':image', $image);

        $stmt->execute();
        
        // Retourne true si la mise à jour s'est bien déroulée
        return true;
         header('Location: livre.php?=ok');
    } catch(PDOException $e) {
        echo "Erreur lors de la modification du livre: " . $e->getMessage();
        // Retourne false en cas d'erreur
        return false;
    }
}

function searchlivre($mot){
  $servername="localhost";
  $DBuser="root";
  $DBpassword="";
  $DBname="base_biblio";
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $DBuser, $DBpassword);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    $requette="SELECT* from livre WHERE nom LIKE'%$mot%'";
    $resultat=$conn->query($requette);
    $produits= $resultat-> fetchAll();
    return $produits;

}



function enregistrerEmprunt($nom, $email, $date_retour, $titre_livre) {
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_biblio";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête d'insertion des données dans la table d'emprunt
        $sql = "INSERT INTO emprunts (nom, email, date_retour, titre_livre) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Assurez-vous de bien passer les paramètres à la méthode execute
        $stmt->execute([$nom, $email, $date_retour, $titre_livre]);

        echo "Emprunt enregistré avec succès.";
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement de l'emprunt : " . $e->getMessage();
    }
}

?>





