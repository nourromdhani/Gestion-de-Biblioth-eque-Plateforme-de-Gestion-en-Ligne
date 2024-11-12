<?php
session_start();
include "fonctions.php"; // Assurez-vous de spécifier le bon chemin vers votre classe

// Récupération des données du formulaire
$nom = $_POST['nom'];
$auteur = $_POST['auteur'];
$category = $_POST['category'];
$langue = $_POST['langue'];
$ISBN = $_POST['ISBN'];

// Chemin de stockage des images
$target_dir = "img";
$target_file = $target_dir . basename($_FILES["image"]["name"]);

// Vérification et déplacement du fichier image
if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    $image = $_FILES["image"]["name"];

    // Connexion à la base de données et insertion du produit
    try {
        $conn = new PDO("mysql:host=localhost;dbname=base_biblio", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $requete = "INSERT INTO livre (nom, auteur, category, langue, ISBN, image) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($requete);
        $stmt->execute([$nom, $auteur, $category, $langue, $ISBN, $image]);

        // Redirection après l'ajout du produit
        header('Location: livre.php?ajout=ok');
        exit();
    } catch(PDOException $e) {
        echo "Erreur lors de l'ajout du livre : " . $e->getMessage();
    }
} else {
    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
}
?>
