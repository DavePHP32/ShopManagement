<?php
session_start();
require_once('connection.php');
if($_GET['id'] && !empty($_GET['id'])){
    $sql =("SELECT * FROM articles WHERE id=:id");
    $data = $bdd->prepare($sql);
    $id = strip_tags($_GET['id']);
    $data->bindValue(':id', $id, PDO::PARAM_INT);
    $data->execute();
    $article = $data->fetch();
    if ($article){
        if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['stock'])) {
            $nom = strip_tags($_POST['nom']);
            $prix = strip_tags($_POST['prix']);
            $stock = strip_tags($_POST['stock']);
            $quantite = strip_tags($_POST['quantite']);
            $fournisseur = strip_tags($_POST['fournisseur']);

            $sql = 'UPDATE articles SET nom=:nom,  prix=:prix,  stock=:stock ,quantite=:quantite, fournisseur=:fournisseur WHERE id=:id';
            $data = $bdd->prepare($sql);
            $data->bindValue(':id', $id, PDO::PARAM_INT);
            $data->bindValue(':nom', $nom, PDO::PARAM_STR);
            $data->bindValue(':prix', $prix, PDO::PARAM_STR);
            $data->bindValue(':stock', $stock, PDO::PARAM_STR);
            $data->bindValue(':quantite', $quantite, PDO::PARAM_INT);
            $data->bindValue(':fournisseur', $fournisseur, PDO::PARAM_STR);
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
<link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<title>Title</title>

    <link rel="stylesheet" href="assets/css/edit.css">


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
                 <h1 class="text-white">Edition de l'article <?=$article['nom']?> </h1>
                 <div class="col-md-10">
                        <form action="" method="POST">
                                <div class="form-group">
                                        <label for="nom" class="text-white">Nom du produit</label>
                                        <input type="text"  name="nom" value=" <?=$article['nom']?>"class="form-control">
                                </div>
                                
                                <div class="form-group">
                                        <label for="nom" class="text-white">Prix du produit</label>
                                        <input type="text"  name="prix" value=" <?=$article['prix']?>" class="form-control">
                                </div>

                                <div class="form-group">
                                        <label for="nom"  class="text-white">Stock disponiblle </label>
                                        <input type="text" name="stock" value=" <?=$article['stock']?>" class="form-control">
                                </div>


                                <div class="form-group">
                                        <label for="nom"  class="text-white">Quantité </label>
                                        <input type="text" name="quantite" value=" <?=$article['quantite']?>" class="form-control">
                                </div>

                                
                                <div class="form-group mb-4">
                                        <label for="nom"  class="text-white">Fournisseur</label>
                                        <input type="text" name="fournisseur" value=" <?=$article['fournisseur']?>" class="form-control">
                                </div>



                            <div class="form-group">
                                <button type="submit"   class="btn btn-primary morphose">
                                    <i class="fas fa-edit"></i></button>
                                <a href="prod.php" class="btn btn-danger"><i class="fas fa-arrow-left m-1"></i></a>
                            </div>
                                

                                


                        </form>
                 </div>
            </div>
    </main>

</body>
</html>