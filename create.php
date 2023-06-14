<?php
session_start();
require_once('connection.php');
require_once 'fonction/fonction.php';
// ...

if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['stock']) && !empty($_POST['quantite']) && !empty($_POST['fournisseur'])) {
    $nom = strip_tags($_POST['nom']);
    $prix = strip_tags($_POST['prix']);
    $stock = strip_tags($_POST['stock']);
    $quantite = strip_tags($_POST['quantite']);
    $fournisseur = strip_tags($_POST['fournisseur']);
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
        $requette = $bdd->prepare("INSERT INTO articles (nom,prix,stock,quantite,fournisseur,montant) VALUES (:nom,:prix,:stock,:quantite,:fournisseur,:montant)");
        $requette->bindValue(':nom', $nom, PDO::PARAM_STR);
        $requette->bindValue(':prix', $prix, PDO::PARAM_STR);
        $requette->bindValue(':stock', $stock, PDO::PARAM_STR);
        $requette->bindValue(':quantite', $quantite, PDO::PARAM_STR);
        $requette->bindValue(':fournisseur', $fournisseur, PDO::PARAM_STR);
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
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/create.css">
      <link rel="shortcut icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    

<title>Title</title>


    <style>
        body {
            background-image: url("assets/img/interview-e-commerce-nation.jpeg");
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 200px;
            background-color: rgba(0,0,0,0.4);
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            display: block;
        }
        .form-group input {
            width: 100%;
            height: 40px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            transition: border-color 0.3s ease-in-out;
        }
        .form-group input[type="date"] {
            padding: 8px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }


    </style>



</head>
<body>
    <main class="container mt-5  p-3">
            <div class="col-md-6">
                 <h1 class="text-white ">creation d'un article</h1>
                 <div class="col-md-6">
                        <form action="" method="POST">

                  </div class="col-md-6 ">
                                <div class="form-group mb-4">
                                        <input type="text"  name="nom" class="form-control" placeholder="Nom du produit">
                                </div>
                                
                                <div class="form-group mb-4">
                                        <input type="text" name="prix" class="form-control" placeholder="Prix du produit">
                                </div>

                                <div class="form-group mb-4">
                                        <input type="text" name="stock" class="form-control" placeholder="stock">
                                </div>


                                <div class="form-group mb-4">
                                        <input type="text" name="quantite" class="form-control" placeholder="Quantité">
                                </div>

                                <div class="form-group mb-4">
                                        <input type="text" name="fournisseur" class="form-control " placeholder="fournisseur">
                                </div>



                <div class="form-group">
                                        <button type="submit"   class="btn btn-primary morphose"><i class="fas fa-plus-circle m-1"></i></button>
                                        <a href="prod.php" class="btn btn-danger"><i class="fas fa-arrow-left m-1"></i></a>
                                </div>
                        </form>
                 </div>
            </div>
    </main>
           

</body>
</html>