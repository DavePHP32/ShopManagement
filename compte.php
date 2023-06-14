<?php
require_once('connection.php');
if(!empty($_POST['nom_form']) && !empty($_POST['email_form']) && !empty($_POST['password_form'])  &&  !empty($_POST['mdp_confirm_form']) ){

    $nom_form = strip_tags($_POST['nom_form']);
    $email_form = strip_tags($_POST['email_form']);
    $password_form = strip_tags($_POST['password_form']);
    $mdp_conf_form = strip_tags($_POST['mdp_conf_form']);

    $requette = $bdd->prepare("INSERT INTO compte (nom,email,mdp) VALUES (:nom,:email,:mdp)");
    $requette->bindValue(':nom', $nom_form, PDO::PARAM_STR);
    $requette->bindValue(':email', $email_form, PDO::PARAM_STR);
    $requette->bindValue(':mdp', $password_form, PDO::PARAM_STR);


    $requette->execute();
    header('Location:login.php');

}

?>





<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    </head>
    <body >
      
    <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4 ">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold  ">Authentification</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" method="post">

          <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="Email" name="email"/>
            </div>

            <div class="form-outline mb-3">
              <input type="email" id="" class="form-control form-control-lg" placeholder="nom" name="nom"/>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="prenom" name="prenom"/>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="profile" name="profil"/>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="mot de passe" name="mdp"/>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="form2Example28" class="form-control form-control-lg" placeholder="confirmation du mot de passe" name="mdp_conf"/>
            </div>

            <div class="pt-1 mb-1 p-20 text-center">
              <button class="btn btn-light btn-lg btn-block " type="button">se connecter</button>
            </div>

            <p class="small mb-2 pb-lg-2 text-center"><a class="text-muted " href="#!">mot de passe oublié?</a></p>
            <p class="text-center"> <a href="" class="link-info text-center">Creer un compte</a></p>

          </form>

        </div>

      </div>
      <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="assets/img/login-bg-img@2x (1).png"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
    </div>
  </div>
</section>
    </body> 
</html>