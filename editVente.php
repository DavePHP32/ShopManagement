<?php
session_start();
require_once('connection.php');
if($_GET['id'] && !empty($_GET['id'])){
    $sql =("SELECT * FROM vente WHERE id=:id");
    $data = $bdd->prepare($sql);
    $id = strip_tags($_GET['id']);
    $data->bindValue(':id', $id, PDO::PARAM_INT);
    $data->execute();
    $article = $data->fetch();
    if ($article){
        if (!empty($_POST['nomProduit']) && !empty($_POST['quantite']) && !empty($_POST['montant']) && !empty($_POST['nomClient'])) {
            $nomProduit = strip_tags($_POST['nomProduit']);
            $quantite = strip_tags($_POST['quantite']);
            $montant = strip_tags($_POST['montant']);
            $nomClient = strip_tags($_POST['nomClient']);


            $sql = 'UPDATE vente SET nomProduit=:nomProduit,  quantite=:quantite,  montant=:montant ,nomClient=:nomClient WHERE id=:id';
            $data = $bdd->prepare($sql);
            $data->bindValue(':id', $id, PDO::PARAM_INT);
            $data->bindValue(':nomProduit', $nomProduit, PDO::PARAM_STR);
            $data->bindValue(':quantite', $quantite, PDO::PARAM_INT);
            $data->bindValue(':montant', $montant, PDO::PARAM_INT);
            $data->bindValue(':nomClient', $nomClient, PDO::PARAM_STR);
            $data->execute();
            header('Location :prod.php');
            $_SESSION['message'] = "votre a bien été modifié";

        }
    }else{
        header('Location: prod.php');
        $_SESSION['message'] = "article non trouvé";
    }
    
    }else{
    header('Location: prod.php');
    $_SESSION['message'] = "désolé! vous n'avez pas le droit d'y accéder";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="assets/css/edit.css">
<title>Title</title>



    <style>
        body {
            background-image: url("assets/img/GettyImages-1163177753_449333_ic7pkn.jpeg");
            background-size: cover;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(0,0,0,0.5);
            border-radius: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.5);
        }
        .container h1 {
            color: #333;
            font-size: 30px;
            text-align: center;
            margin-bottom: 30px;
            font-family: "metropolis";
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
            padding-left: 70px;

        }
        .form-group label {
            font-family: "metropolis";
            font-size: 16px;

        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 10px;
        }
        /* Nouveau style */
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>




</head>
<body>
    <main class="container">
            <div class="col-md-12 mt-5">
                 <h1 class="text-white">modifier une vente <?=$article['nomProduit']?> </h1>
                 <div class="col-md-6">
                        <form action="" method="POST">
                                <div class="form-group">
                                        <label for="nom">Nom du produit</label>
                                        <input type="text"  name="nomProduit" value=" <?=$article['nomProduit']?>"class="form-control">
                                </div>
                                
                                <div class="form-group">
                                        <label for="nom">Quantité du produit</label>
                                        <input type="text"  name="quantite" value=" <?=$article['quantite']?>" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label for="nom">Montant </label>
                                        <input type="text" name="montant" value=" <?=$article['montant']?>" class="form-control">
                                </div>


                                <div class="form-group">
                                        <label for="nom">nom du client  </label>
                                        <input type="text" name="nomClient" value=" <?=$article['nomClient']?>" class="form-control">
                                </div>



                            <div class="form-group">
                                <button type="submit"   class="btn btn-primary morphose">
                                    <i class="fas fa-edit"></i></button>
                                <a href="Vente.php" class="btn btn-danger"><i class="fas fa-arrow-left m-1"></i></a>
                            </div>





                        </form>
                 </div>
            </div>
    </main>
           

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>