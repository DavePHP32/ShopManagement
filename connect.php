<?php





?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="connect.css">
    </head>
    <body>
    <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4 ">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold  text-white">Authentification</span>
        </div>

        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

          <form style="width: 23rem;" method="post">

            <div class="form-outline mb-4">
                     <input type="email" id="" class="form-control form-control-lg " placeholder="Email"  name="email"/>
            </div>

            <div class="form-outline mb-5">
                     <input type="password" id="form2Example28" class="form-control form-control-lg"  placeholder="mot de passe" name="mdp"/>
            </div>

            <div class="pt-1 mb-5 p-20 text-center">
              <button class="btn btn-light btn-lg btn-block " type="button">se connecter</button>
            </div>

            <p class="small mb-2 pb-lg-2 text-center text-white"><a class="text-muted text-white " href="#!">mot de passe oublié?</a></p>
            <p class="text-center text-white"> <a href="compte.php" class="link-info text-center  text-white">Creer un compte</a></p>

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