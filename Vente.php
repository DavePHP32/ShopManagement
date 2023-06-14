<?php
session_start();
require_once 'partials/navbar.php';
require_once('connection.php');
$requette = $bdd->prepare('SELECT * FROM vente');
$requette->execute();

$articles = $requette->fetchAll(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/show.css">
        <link rel="stylesheet" href="assets/css/fontawesome.min.css">

<title>Title</title>

        <style>
        body {
        background-image: url("assets/img/product-3.jpg");

        }
        .container {
        margin-top: 50px;
        }
        .table-container {
        max-height: 400px;
        overflow-y: scroll;
        }

        .table-container {
        background-color: rgba(255, 255, 255, 0.6);
        backdrop-filter: blur(10px);
        }



        .table-dark{
        font-size: 20px;
        font-family: "metropolis";

        }
        .btn {
        font-family: "metropolis";
        font-size: 20px;
        font-weight: bold;
        }
        td{
        font-size: 20px;
        }
        .text-white{
        font-size: 50px;
        font-weight: bold;
        }

        </style>


</head>
<body>

    <div class="container mt-5 ">
        
            <div class="row">
                    <section>
                            <?php
                            if($_SESSION['message']){ 
                             ?>

                                <div class="alert">
                                        <p class="alert alert-danger">
                                                <?php
                                                echo $_SESSION['message'];
                                                $_SESSION['message'] = "";
                                                ?>
                                        </p>
                                        
                                </div>


                            <?php
                            }
                            ?>
                            <h1 class="mb-5 text-white">Listes des ventes</h1>
                            <a href="createVente.php" class="btn btn-primary mb-3">Ajouter une vente</a>
                            <table class="table mt-3 table-container">
                                    <th class="table-dark">ID</th>
                                    <th class="table-dark">Nom_produit</th>
                                    <th class="table-dark">Quantité</th>
                                    <th class="table-dark">Montant</th>
                                    <th class="table-dark">Nom_client</th>
                                    <th class="table-dark">Date</th>

                                    <th class="table-dark">Actions</th>
                                    

                                    <tbody>
                                        <?php  foreach($articles as $article){  ?>                         
                                            <tr>
                                                    <td><?= $article['id']?></td>
                                                    <td><?= $article['nomProduit']?></td>
                                                    <td><?= $article['quantite']?></td>
                                                    <td><?= $article['montant']?></td>
                                                    <td><?= $article['nomClient']?></td>
                                                    <td><?= $article['dates']?></td>

                                                    <td>
                                                            <a href="voirVente.php?id=<?= $article['id'] ?>" class="text-blue bold m-2">
                                                                    <i class="fas fa-eye"></i> </a>
                                                            <a href="editVente.php?id=<?= $article['id'] ?>" class="text-success m-2">
                                                                    <i class="fas fa-edit"></i> </a>
                                                            <a href="deleteVente.php?id=<?= $article['id'] ?>" class="text-danger m-2">
                                                                    <i class="fas fa-trash-alt"></i> </a>

                                                    </td>
                                            </tr>
                                         <?php  } ?>   
                                    </tbody>
                            </table>
                    </section>
            </div>
    </div>

</body>
</html>