<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="register.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>

<section class="h-100 bg-dark">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card card-registration my-4">
          <div class="row g-0">
            <div class="col-xl-6 d-none d-xl-block">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                   alt="Sample photo" class="img-fluid"
                   style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
            </div>
            <div class="col-xl-6">
              <div class="card-body p-md-5 text-black">
                <h3 class="mb-5 text-uppercase text-center">INSCRIPTION</h3>

                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1m" class="form-control form-control-lg"  placeholder="Nom" name="nom"/>
                    </div>
                  </div>
                  <div class="col-md-6 mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Example1n" class="form-control form-control-lg"  placeholder="Prénom" name="lastname"/>
                    </div>
                  </div>

                <div class="form-outline mb-5">
                  <input type="text" id="form3Example9" class="form-control form-control-lg"  placeholder="Email" name="email"/>
                </div>

                <div class="form-outline mb-5">
                  <input type="text" id="form3Example90" class="form-control form-control-lg" placeholder="Date de naissance" name="birthday" />
                </div>

                <div class="form-outline mb-5">
                  <input type="text" id="form3Example99" class="form-control form-control-lg" placeholder="mot de passe" name="password" />
                </div>

                <div class="form-outline mb-5">
                  <input type="text" id="form3Example97" class="form-control form-control-lg"  placeholder="confirmation du mot de passe" name="passwordConfirm"/>

                </div>

                <div class="d-flex justify-content-end pt-3">
                  <button type="button" class="btn btn-light btn-lg mt-5">Reset all</button>
                  <button type="button" class="btn btn-warning btn-lg ms-2 mt-5">Submit form</button>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>