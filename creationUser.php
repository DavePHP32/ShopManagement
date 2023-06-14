<?php
session_start();
require_once('connection.php');
if(!empty($_POST['nom']) && !empty($_POST['lastname']) && !empty($_POST['email'])  &&  !empty($_POST['mdp']) && !empty($_POST['birthday'])  ){

  $nom = strip_tags($_POST['nom']);
  $lastname = strip_tags($_POST['lastname']);
  $email = strip_tags($_POST['email']);
  $mdp = strip_tags($_POST['mdp']);
  $birthday = strip_tags($_POST['birthday']);


  $requette = $bdd->prepare("INSERT INTO compte (nom,lastname,email,mdp,birthday) VALUES (:nom,:lastname,:email,:mdp,:birthday)");
  $requette->bindValue(':nom', $nom, PDO::PARAM_STR);
  $requette->bindValue(':lastname', $lastname, PDO::PARAM_STR);
  $requette->bindValue(':email', $email, PDO::PARAM_STR);
  $requette->bindValue(':mdp', $mdp, PDO::PARAM_STR);
  $requette->bindValue(':birthday', $birthday, PDO::PARAM_INT);

  $requette->execute();

  $_SESSION["message"] = "l'utilisateur a été sauvegardé ";
  header('Location:users.php');

}else{
  $_SESSION["message"] = "vous devez remplir tous les champs ";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter des utilisateurs</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <style>
    body {
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
      background-image:url("assets/img/pexels-vlada-karpovich-4050316.jpg");
      background-size: cover;
    }
    .custom-container {
      max-width: 400px;
      height: 420px;
      transition: transform 0.5s;
      background-color: rgba(77, 144, 159, 0.6);
      border-radius: 10px;
      padding: 20px;
    }
    .custom-container:hover {
      transform: scale(1.26);
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
  <h1 class="text-center mb-5 text-white">Ajouter des utilisateurs</h1>

  <form method="post">
    <div class="form-group">
      <input type="text" class="form-control mb-4" id="client" name="nom" placeholder="Nom">
    </div>

    <div class="form-group">
      <input type="text" class="form-control mb-4 " id="produit" name="lastname" placeholder="Prénom">
    </div>

    <div class="form-group">
      <input  class="form-control mb-4" id="produit" name="email" placeholder="Email">
    </div>

    <div class="form-group">
      <input type="number" class="form-control mb-4" id="quantite" name="birthday" placeholder="Date de naissance">
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
