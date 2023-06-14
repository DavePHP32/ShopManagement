<?php
session_start();
require_once('connection.php');
require_once 'fonction/fonction.php';



if (!empty($_POST['nomProduit']) && !empty($_POST['quantite']) && !empty($_POST['montant']) && !empty($_POST['nomClient'])) {
    $nomProduit = strip_tags($_POST['nomProduit']);
    $quantite = strip_tags($_POST['quantite']);
    $montant = strip_tags($_POST['montant']);
    $nomClient = strip_tags($_POST['nomClient']);
    $total = $quantite * $montant; // Calcul du montant total en multipliant la quantité par le montant


    if (updateProductQuantity($nomProduit, $quantite)) {
        // La quantité du produit a été mise à jour avec succès, procéder à l'enregistrement de la vente
        $requette = $bdd->prepare("INSERT INTO vente (nomProduit, quantite, montant, nomClient) VALUES (:nomProduit, :quantite, :montant, :nomClient)");
        $requette->bindValue(':nomProduit', $nomProduit, PDO::PARAM_STR);
        $requette->bindValue(':quantite', $quantite, PDO::PARAM_STR);
        $requette->bindValue(':montant', $montant, PDO::PARAM_STR);
        $requette->bindValue(':nomClient', $nomClient, PDO::PARAM_STR);
        $requette->execute();

        $_SESSION["message"] = "Votre vente a été enregistrée.";
    } else {
        // La quantité disponible est insuffisante
        $_SESSION["message"] = "La quantité disponible du produit est insuffisante.";
    }

    header('Location: Vente.php');
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
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
<title>Title</title>
<style>
    body {
    background-image: url("assets/img/pexels-tembela-bohle-1884584.jpg");
        background-size: cover;
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
                <h1 class="text-white text-center">Enregistrer des ventes</h1>
                 <div class="col-md-6">

                        <form action="" method="POST">

                  </div class="col-md-6 ">
                                <div class="form-group mb-4">
                                        <input type="text"  name="nomProduit" class="form-control" placeholder="Nom du produit">
                                </div>
                                
                                <div class="form-group mb-4">
                                        <input type="text" name="quantite" class="form-control quantite-input" placeholder="Quantité">
                                </div>

                                <div class="form-group mb-4">
                                        <input type="text" name="montant" class="form-control montant-input" placeholder="Montant">
                                </div>


                                <div class="form-group mb-4">
                                        <input type="text" name="nomClient" class="form-control" placeholder="nom du client">
                                </div>

                                <div class="form-group">
                                    <button type="submit"   class="btn btn-primary morphose"><i class="fas fa-plus-circle m-1"></i></button>
                                    <a href="Vente.php" class="btn btn-danger"><i class="fas fa-arrow-left m-1"></i></a>
                                </div>
                        </form>
                            <span id="resultat"></span> <!-- Ajoutez cet élément pour afficher le résultat -->
                 </div>
            </div>
    </main>
           

</body>

<script>
    // Sélectionner les champs de saisie de quantité et de montant
    const quantiteInput = document.querySelector('.quantite-input');
    const montantInput = document.querySelector('.montant-input');

    // Ajouter un événement d'écoute sur le champ de saisie de montant
    montantInput.addEventListener('input', function() {
        // Récupérer les valeurs actuelles de quantité et de montant
        const quantite = parseFloat(quantiteInput.value);
        const montant = parseFloat(montantInput.value);

        // Vérifier si les valeurs sont des nombres valides
        if (!isNaN(quantite) && !isNaN(montant)) {
            // Effectuer la multiplication
            const resultat = quantite * montant;

            // Afficher le résultat dans un champ de saisie ou un autre élément HTML
            // Vous pouvez sélectionner un élément existant ou créer un nouvel élément pour afficher le résultat
            // Par exemple, vous pouvez ajouter un élément <span> avec l'ID "resultat" pour afficher le résultat
            const resultatElement = document.getElementById('resultat');
            resultatElement.textContent = resultat;
        }
    });
</script>

</html>