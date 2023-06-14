<?php
session_start();
require_once('connection.php');
require_once 'fonction/fonction.php';


if (!empty($_POST['nom']) && !empty($_POST['prix'])  && !empty($_POST['stock'])&& !empty($_POST['quantite']) && !empty($_POST['fournisseur'])) {
  $nom = strip_tags($_POST['nom']);
  $prix = strip_tags($_POST['prix']);
  $quantite = strip_tags($_POST['quantite']);
  $fournisseur = strip_tags($_POST['fournisseur']);
  $stock = strip_tags($_POST['stock']);
  $montant = strip_tags($_POST['montant']);

  $montant = $prix * $quantite;

  if (isProductExists($nom)) {
    // Produit existe déjà, incrémenter la quantité
    $existingProductQuery = $bdd->prepare("SELECT quantite FROM articles WHERE nom = :productName");
    $existingProductQuery->bindValue(':productName', $nom, PDO::PARAM_STR);
    $existingProductQuery->execute();

    $existingProduct = $existingProductQuery->fetch(PDO::FETCH_ASSOC);
    $existingQuantite = $existingProduct['quantite'];

    $newQuantite = $existingQuantite + $quantite;

    $updateQuery = $bdd->prepare("UPDATE articles SET quantite = :newQuantite WHERE nom = :productName");
    $updateQuery->bindValue(':newQuantite', $newQuantite, PDO::PARAM_INT);
    $updateQuery->bindValue(':productName', $nom, PDO::PARAM_STR);
    $updateQuery->execute();

    $_SESSION["message"] = "La quantité du produit existant a été incrémentée.";
  } else {
    // Insérer le nouveau produit dans la base de données
    $requette = $bdd->prepare("INSERT INTO articles (nom,prix,quantite,fournisseur,montant,stock) VALUES (:nom,:prix,:quantite,:fournisseur,:montant,:stock)");
    $requette->bindValue(':nom', $nom, PDO::PARAM_STR);
    $requette->bindValue(':prix', $prix, PDO::PARAM_STR);
    $requette->bindValue(':quantite', $quantite, PDO::PARAM_STR);
    $requette->bindValue(':fournisseur', $fournisseur, PDO::PARAM_STR);
    $requette->bindValue(':stock', $stock, PDO::PARAM_STR);
    $requette->bindValue(':montant', $montant, PDO::PARAM_STR);
    $requette->execute();

    $_SESSION["message"] = "Votre article a été sauvegardé.";
  }

  header('Location: prod.php');
  exit();
} else {
  $_SESSION["message"] = "Vous devez remplir tous les champs.";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Édition des ventes</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-image:url("assets/img/pexels-mockupeditorcom-205316.jpg");
      background-size: cover;
    }
    .custom-container {
      max-width: 400px;
      height: 560px;
      transition: transform 0.5s;
      background-color: rgba(2, 80, 38, 0.3);
      border-radius: 10px;
      padding: 20px;
    }
    .custom-container:hover {
      transform: scale(1.10);
    }
    .text-white{
      font-family: "metropolis";
      font-size: 30px;
      font-weight: bold;
    }
    .btn {
      background-color: rgba(168, 159, 159, 0.5);
      border: none;

    }
  </style>
</head>
<body>

<div class="container custom-container">
  <h1 class="text-center mb-5 text-white">Ajouter des Produits</h1>

  <form method="post">
    <div class="form-group">
      <input type="text" class="form-control mb-4" id="client" name="nom" placeholder="Nom du produit">
    </div>

    <div class="form-group">
      <input type="text" class="form-control mb-4 " id="produit" name="fournisseur" placeholder="fournisseur">
    </div>

    <div class="form-group">
      <input  class="form-control mb-3" id="produit" name="stock" placeholder="stock">
    </div>


    <div class="form-group">
      <input type="number" class="form-control mb-4" id="quantite" name="quantite" placeholder="quantité">
    </div>

    <div class="form-group">
      <input type="number" step="0.01" class="form-control mb-4" id="prix" name="prix" placeholder="Prix unitaire">
    </div>


    <div class="form-group">
      <input type="number" step="0.01" class="form-control mb-4" id="total" name="montant" readonly placeholder="Montant">
    </div>

    <div class="mt-5">
      <button type="submit"   class="btn btn-primary morphose"><i class="fas fa-plus-circle m-1"></i></button>
      <a href="prod.php" class="btn btn-danger"><i class="fas fa-arrow-left m-1"></i></a>

    </div>
  </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>
  // Calculer le total en fonction de la quantité et du prix
  $(document).ready(function() {
    $('#quantite, #prix').on('input', function() {
      var quantite = $('#quantite').val();
      var prix = $('#prix').val();
      var total = quantite * prix;

      $('#total').val(total.toFixed(2));
    });
  });
</script>

</body>
</html>
