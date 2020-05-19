<?php
session_start();
include 'connexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://kit.fontawesome.com/a58b6117a4.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
  integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/lucas.css">
  <title>Instagram</title>
</head>
<body>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white p-2">
      <div class="container p-1">
        <a class="navbar-brand" href="index.php">
          <img src="./images/instagram_logo.webp" width="140" height="68" class="d-inline-block align-top" alt=""></a>
          <img src="./images/designed_by_no_bg.png" width="140" height="68" class="mx-auto" alt="">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </nav>
    </header>

    <div class="container-fluid h-100 ">
      <div class="container w-25 d-flex justify-content-center mt-5">
        <div class="card p-4 shadow" style="width: 22rem;">
          <h3 class="text-center"><span class="badge badge-success">Inscription</span></h3>
          <p class="text-right"><span class="badge badge-dark">Etape 1 sur 2 </span></p>
          <form class="p-3" action="./data/sign_up_register.php" method="POST">
            <div class="form-row">
              <div class="col-md-12 mb-3">
                <label for="validationDefault01">Prénom</label>
                <input type="text" name="firstname" class="form-control" id="validationDefault01" placeholder="Prénom" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefault02">Nom</label>
                <input type="text" name="lastname" class="form-control" id="validationDefault02" placeholder="Nom" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <label for="validationDefault02">E-mail</label>
                <input type="text" name="mail" class="form-control" id="validationDefault02" placeholder="E-mail" value="" required>
              </div>
              <div class="col-md-12 mb-3">
                <?php
                if(isset($_GET['error']) && $_GET['error'] === 'username'){  ?>
                  <p class="text-danger text-center"><strong>L'username est deja utilisé!</strong></p>
                <?php  }
                ?>
                <label for="validationDefaultUsername">Pseudo</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                  </div>
                  <input type="text" name="username" class="form-control" id="validationDefaultUsername" placeholder="Pseudo" aria-describedby="inputGroupPrepend2" required>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" name="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="validationDefault04">Téléphone</label>
                <input type="tel" name="phone" class="form-control" id="validationDefault04" placeholder="Téléphone" required>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                <label class="form-check-label" for="invalidCheck2">
                  J'ai lu et accepte les conditions d'utilisations.
                </label>
              </div>
            </div>
            <div class="text-center">
              <a class="btn btn-danger " href="sign_in.php" role="button">Retour</a>
              <button class="btn btn-success col-md-12 w-50" type="submit">Continuer</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  </body>
  </html>
