<?php
session_start();
require_once('connection.php');
require_once ('partials/navbar.php');

$requette = $bdd->prepare("SELECT * FROM articles");
$requette->execute();

$articles = $requette->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

        <title>Title</title>

        <style>
                body {
                        background-image: url("assets/img/news-3.jpg");
                        background-size: cover;
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

<div class="container mt-3">
        <div class="row">
                <section>
                        <?php
                        if ($_SESSION["message"]) {
                                ?>
                                <div class="alert">
                                        <p class="alert alert-danger">
                                                <?php
                                                echo $_SESSION["message"];
                                                $_SESSION["message"] = "";
                                                ?>
                                        </p>
                                </div>
                                <?php
                        }
                        ?>
                        <h1 class="mb-4 text-white display-5">Listes des Produits</h1>
                        <a href="creation.php" class="btn btn-primary mb-4"><i class="fa fa-cart-plus m-1" aria-hidden="true"></i>Ajouter un produit</a>
                        <div class="table-container">
                                <table class="table mt-3">
                                        <thead class="table-dark">
                                        <th>ID</th>
                                        <th>Nom</th>
                                        <th>Prix</th>
                                        <th>Stock</th>
                                        <th>Quantité</th>
                                        <th>Montant</th>
                                        <th>Fournisseur</th>
                                        <th>Actions</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($articles as $article) { ?>
                                                <tr>
                                                        <td><?= $article["id"] ?></td>
                                                        <td><?= $article["nom"] ?></td>
                                                        <td><?= $article["prix"] ?></td>
                                                        <td><?= $article["stock"] ?></td>
                                                        <td><?= $article['quantite'] ?></td>
                                                        <td><?= $article['montant'] ?></td>
                                                        <td><?= $article["fournisseur"] ?></td>

                                                        <td>
                                                                <a href="show.php?id=<?= $article['id'] ?>" class="text-blue bold m-2">
                                                                        <i class="fas fa-eye"></i> </a>
                                                                <a href="edit.php?id=<?= $article['id'] ?>" class="text-success m-2">
                                                                        <i class="fas fa-edit"></i> </a>
                                                                <a href="delete.php?id=<?= $article['id'] ?>" class="text-danger m-2">
                                                                        <i class="fas fa-trash-alt"></i> </a>

                                                        </td>
                                                </tr>
                                                <?php
                                        } ?>
                                        </tbody>
                                </table>
                        </div>
                </section>
        </div>
</div>
<script>
        // Responsive navbar behavior
        const navbarToggler = document.querySelector(".navbar-toggler");
        const navbarCollapse = document.querySelector(".navbar-collapse");

        navbarToggler.addEventListener("click", function () {
                if (navbarCollapse.classList.contains("show")) {
                        navbarCollapse.classList.remove("show");
                        navbarCollapse.classList.add("collapsing");
                        setTimeout(function () {
                                navbarCollapse.classList.remove("collapsing");
                        }, 300);
                } else {
                        navbarCollapse.classList.add("show");
                        navbarCollapse.style.height = "auto";
                        const height = navbarCollapse.clientHeight + "px";
                        navbarCollapse.style.height = "0";
                        setTimeout(function () {
                                navbarCollapse.style.height = height;
                        }, 0);
                }
        });
</script>

</body>
</html>
