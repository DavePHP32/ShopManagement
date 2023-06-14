<?php
session_start();
require_once('connection.php');
if(!empty($_POST['nom']) && !empty($_POST['lastname']) && !empty($_POST['email'])  &&  !empty($_POST['mdp']) && !empty($_POST['birthday'])  ){
        
    $nom = strip_tags($_POST['nom']);
    $lastname = strip_tags($_POST['lastname']);
    $email = strip_tags($_POST['email']);
    $mdp = strip_tags($_POST['mdp']);
    $birthday = strip_tags($_POST['birthday']);


    $requette = $bdd->prepare("INSERT INTO compte (nom,lastname,email,mdp,birthday) VALUES (:nom,:lastname,:email,:mdp,:birthday)");
    $requette->bindValue(':nom', $nom, PDO::PARAM_STR);
    $requette->bindValue(':lastname', $lastname, PDO::PARAM_STR);
    $requette->bindValue(':email', $email, PDO::PARAM_STR);
    $requette->bindValue(':mdp', $mdp, PDO::PARAM_STR);
    $requette->bindValue(':birthday', $birthday, PDO::PARAM_INT);

    $requette->execute();

    $_SESSION["message"] = "l'utilisateur a été sauvegardé ";
    header('Location:users.php');
    
}else{
    $_SESSION["message"] = "vous devez remplir tous les champs ";
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
    <style>
        body{
            background-color: #0a58ca;
        }
    </style>
    

<title>Title</title>

</head>
<body>
    <main class="container mt-5  p-3">
            <div class="col-md-6">
                 <h1 class="text-white">creation d'un utilisateurs</h1>
                 <div class="col-md-6">
                        <form action="" method="POST">

                  </div class="col-md-6 ">
                                <div class="form-group mb-4">
                                        <input type="text"  name="nom" class="form-control" placeholder="Nom de l'utilsateur">
                                </div>
                                
                                <div class="form-group mb-4">
                                        <input type="text" name="lastname" class="form-control" placeholder="Prenom de l'utilisateur">
                                </div>

                                <div class="form-group mb-4">
                                        <input type="text" name="email" class="form-control" placeholder="Email">
                                </div>


                                <div class="form-group mb-4">
                                        <input type="text" name="mdp" class="form-control" placeholder="mot de passe">
                                </div>

                                <div class="form-group mb-4">
                                        <input type="date" name="birthday" class="form-control " placeholder="Date de naissance">
                                </div>

                                <div class="form-group">
                                        <button type="submit"   class="btn btn-primary morphose">creation</button>
                                        <a href="users.php" class="btn btn-danger">Retour</a>
                                </div>
                        </form>
                 </div>
            </div>
    </main>
           

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
      <script src="assets/js/script.js"></script>
</body>
</html>