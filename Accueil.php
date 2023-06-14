<?php
require_once ('connection.php');
require_once ('partials/navbar.php');

//recupereation du nombre de clients
$requetteClients=$bdd->prepare("SELECT COUNT(*) as nomClient from vente ");
$requetteClients->execute();
$clients=$requetteClients->fetch();
$nombreClients=$clients['nomClient'];

//recuperation de vente
$requetteVente=$bdd->prepare("select count(*) as id from vente ");
$requetteVente->execute();
$vente=$requetteVente->fetch();
$nombreVente=$vente['id'];







?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <script src="assets/js/dashbaord.php"></script>
  <style>
    body{
      background-image: url("assets/img/wallpaperbetter (4).jpg");
      background-size: cover;

    }
    .card {
      height: 200px;
    }

    .card-title {
      font-size: 24px;
    }

    .card-text {
      font-size: 36px;
      font-weight: bold;
      margin-top: 10px;
    }

    .icon {
      font-size: 60px;
      margin-right: 10px;
    }

    .container {
      padding-top: 50px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-4">

      <div class="card">
        <div class="card-body d-flex align-items-center justify-content-center">
          <div class="text-center">
            <i class="icon fas fa-users"></i>
            <h5 class="card-title">Nombre de clients</h5>
            <p class="card-text" id="clientsCount">
              <?=$nombreClients?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body d-flex align-items-center justify-content-center">
          <div class="text-center">
            <i class="icon fas fa-shopping-cart"></i>
            <h5 class="card-title">Nombre de ventes</h5>
            <p class="card-text" id="ventesCount"><?=$nombreVente?></p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-body d-flex align-items-center justify-content-center">
          <div class="text-center">
            <i class="icon fas fa-clipboard-list"></i>
            <h5 class="card-title">Nombre de commandes</h5>
            <p class="card-text" id="commandesCount">0</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>



  function animateCount(elementId, targetValue, duration) {
    const element = document.getElementById(elementId);
    const startValue = 0;
    const range = targetValue - startValue;
    const startTime = performance.now();

    function updateCount(currentTime) {
      const elapsedTime = currentTime - startTime;
      if (elapsedTime >= duration) {
        element.textContent = targetValue;
      } else {
        const progress = elapsedTime / duration;
        const currentValue = Math.floor(progress * range + startValue);
        element.textContent = currentValue;
        requestAnimationFrame(updateCount);
      }
    }

    requestAnimationFrame(updateCount);
  }

  // Déclencher les animations de décompte au chargement de la page
  window.addEventListener('DOMContentLoaded', function() {
    animateCount('clientsCount', <?= $nombreClients ?>,1500);
    animateCount('ventesCount', <?= $nombreVente?>, 1500);
    animateCount('commandesCount', 78, 1500);
  });

</script>
</body>
</html>
