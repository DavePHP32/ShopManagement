<?php
require_once('connection.php');
extract($_POST);
if (isset($_POST['envoie_form'])) {
  $requette = $bdd->prepare("SELECT  *FROM compte");
  $requette->execute();
        while ($donnees = $requette->fetch()) {
                $test = $donnees['email'];
                $test_password = $donnees['mdp'];
                       if ($mail_form == $test && $mdp_form == $test_password) {
                                header("Location:show.php");
                       }else{
                        echo "verifier vos infos";
                          }
        }
}





?>



<!DOCTYPE html>
<html lang="en">
   <!-- Mirrored from preschool.dreamguystech.com/html-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:39 GMT -->
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
      <title>Authentification</title>
      <link rel="shortcut icon" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style.css">

   </head>
   <body>
      <div class="main-wrapper login-body">
         <div class="login-wrapper">
            <div class="container">
               <div class="loginbox">
                  <div class="login-left">
                  </div>
                  <div class="login-right">
                     <div class="login-right-wrap">
                        <h1>Authentification</h1>
                        <p class="account-subtitle"></p>
                        <form method="post">
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Email" name="mail_form">
                           </div>
                           <div class="form-group">
                              <input class="form-control" type="text" placeholder="Password" name="mdp_form">
                           </div>
                           <div class="form-group">
                              <button class="btn btn-primary btn-block" type="submit" name="envoie_form">Se connecter</button>
                           </div>
                        </form>
                        <div class="text-center forgotpass"><a href="forgot-password.html">Mot de passe oublié?</a></div>
                       
                       
                        <div class="text-center dont-have"> <a href="register.php">creer un compte</a></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script src="assets/js/jquery-3.6.0.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="assets/js/script.js"></script>
   </body>
   <!-- Mirrored from preschool.dreamguystech.com/html-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Oct 2021 11:11:40 GMT -->
</html>