<?php
session_start();
include "fonctions.php";

if (isset($_GET['livre_id'])) {
  $livre_id = $_GET['livre_id'];
  supprimerlivreById($livre_id);
} else {
  echo "erreur";
}
?>