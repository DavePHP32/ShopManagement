<?php
require_once('connection.php');
require_once ("fonction/fonction.php");
require_once ('partials/navbar.php');
session_start();


if($_GET['id'] && !empty($_GET['id'])){
    $requette = $bdd->prepare('SELECT * FROM vente WHERE id=:id');
    $id = strip_tags($_GET['id']);
    $requette->bindValue(':id', $id, PDO::PARAM_INT);
    $article = $requette->fetch();
    if(!$article){
        $_SESSION['message'] = "article non trouvé";
        header('Location:Vente.php');
        exit();
    }
}else{
    $_SESSION['message'] = "désolé! vous n'avez pas le droit d'y accéder";
    header('Location:vente.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="assets/css/index.css">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<title>vente<?=$article['nomProduit']?></title>

    <style>
        body {
            background-color: #f8f9fa;
            background-image: url("assets/img/news-1.jpg");
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
                <h1 class="card-title">Vente N°<?= $article['id'] ?> - <?= $article['nomProduit'] ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p class="card-text ">Quantité: <?= $article['quantite'] ?></p>
                        <p class="card-text ">Montant: <?= $article['montant'] ?></p>
                        <p class="card-text ">Nom du Client: <?= $article['nomClient'] ?></p>

                    </div>
                </div>
                <a href="Vente.php" class="btn btn-primary btn-back"><i class="fas fa-arrow-left m-1 "></i></a>
            </div>
        </div>
    </main>




</body>
</html>