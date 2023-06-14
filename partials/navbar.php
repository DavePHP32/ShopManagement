
<style>/* Styling the navbar */
        .navbar {
             padding: 10px;

                }

        .navbar-nav .nav-item .nav-link {
                    color: #333;
                    font-size: 20px;
                    font-family: "metropolis";
                    transition: color 0.3s;
                }

        .navbar-nav .nav-item .nav-link:hover {
                 color: #666;
                        }
        .navbar-nav .nav-link:hover {
                 color: #FF0000; /* Remplacez cette valeur par la couleur souhaitée */
                        }
                .navbar-brand img {
                         width: 40px; /* Ajustez la valeur selon vos besoins */
                         height: auto; /* Ajustez la valeur selon vos besoins */
                }
                /* Barre de navigation */
                .navbar {
                        background-color: #f8f9fa; /* Couleur de fond de la barre de menu */
                        padding: 10px 20pxz; /* Espacement intérieur de la barre de menu */
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Ombre de la barre de menu */
                }

                /* Liens de la barre de menu */
                .navbar a {
                        color: #333; /* Couleur du texte des liens */
                         text-decoration: none; /* Suppression du soulignement des liens */
                        transition: color 0.3s ease; /* Transition de couleur lors du survol */
                }

                .navbar a:hover {
                        color: #007bff; /* Couleur du texte lors du survol */
                                }

                /* Logo de la barre de menu */
                .navbar-brand img {
                        width: 40px; /* Ajustez la taille du logo selon vos besoins */
                        height: auto;
                }
</style>



<nav class="navbar navbar-expand-lg bg-body-tertiary ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="assets/img/favicon.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active text-black" aria-current="page" href="index.html">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="prod.php">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="register.html">Clients</a>
                </li>
                <li class="nav-item auth">
                    <a class="nav-link text-black" href="Vente.php">Ventes</a>
                </li>
                <li class="nav-item auth">
                    <a class="nav-link text-black" href="users.php">Utilisateurs</a>
                </li>
                <li class="nav-item auth">
                    <a class="nav-link  text-black" href="#">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>