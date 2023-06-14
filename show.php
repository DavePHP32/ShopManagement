<?php
 require_once ('partials/navbar.php');
session_start();
require_once('connection.php');
require_once ("fonction/fonction.php");

if($_GET['id'] && !empty($_GET['id'])){
    $requette = $bdd->prepare('SELECT * FROM articles WHERE id=:id');
    $id = strip_tags($_GET['id']);
    $requette->bindValue(':id', $id, PDO::PARAM_INT);
    $requette->execute();
    $article = $requette->fetch();
    if(!$article){
        header('Location:prod.php');
        $_SESSION['message'] = "article non trouvé";
    }
}else{
    header('Location:prod.php');
    $_SESSION['message'] = "désolé! vous n'avez pas le droit d'y accéder";
}


?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here" />
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <title>Article <?= $article['nom'] ?></title>
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url("assets/img/selection-formation-e-commerce.jpeg");
        }

        .container {
            margin-top: 110px;

        }

        .card {
            margin-bottom: 30px;
            border: none;
            border-radius: 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
            background-color: rgba(0,0,0,0.2);

        }

        .card-header {
            background-color: rgba(0,0,0,0.7);
            color: #fff;


        }

        .card-body {
            background-color: rgba(255,255,255,0.9);

        }

        .btn-back {
            margin-top: 20px;
        }
        .card-text{
            font-size: 20px;
            font-family: "metropolis";

        }
        .card-title{
            font-weight: bold;
            font-family: "metropolis";

        }
    </style>
</head>

<body>

<main class="container">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Article N°<?= $article['id'] ?> - <?= $article['nom'] ?></h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text ">Prix : <?= $article['prix'] ?></p>
                    <p class="card-text ">Stock : <?= $article['stock'] ?></p>
                    <p class="card-text ">Quantité : <?= $article['quantite'] ?></p>



                </div>
            </div>
            <a href="prod.php" class="btn btn-primary btn-back"><i class="fas fa-arrow-left m-1 "></i></a>
        </div>
    </div>
</main>

</body>

</html>
