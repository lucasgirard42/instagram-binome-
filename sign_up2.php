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
  <?php
  session_start();
  include 'connexion.php';

  

  // var_dump($_SESSION['username']);
  // die();
  ?>
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

    <div class="container-fluid h-100  ">
      <div class="container w-25 d-flex justify-content-center mt-5">
        <div class="card p-4 shadow " style="width: 22rem;">
          <h3 class="text-center"><span class="badge badge-success">Inscription</span></h3>
          <p class="text-right"><span class="badge badge-dark">Etape 2 sur 2 </span></p>
          <form action="./data/sign_up_register2.php" method="POST" enctype="multipart/form-data">
            <div class="form-group mt-3">
              <label for="img_profil">Choisir une photo de profil</label>
              <input type="file" class="form-control-file"
              accept="image/*" name="img_profil" required>
              <?php
              if(isset($_GET['error']) && $_GET['error'] === 'image'){  ?>
                <p>Le format de votre image n'est pas bon!</p>
              <?php  }
              ?>
            </div>

            <div class="form-group mt-4">
              <label for="description">Description</label>
              <textarea class="form-control mb-2" rows="3" name="description" placeholder="Faites une breve description de votre profil." required></textarea>
            </div>

            <div class="form-group mt-4">
              <label for="localisation">Localisation</label>
              <input type="text" class="form-control w-100" name="localisation" placeholder="D'où êtes vous ?" required>
            </div>

            <div class="form-group mt-4">
              <label for="url_user">Ajouter un lien vers page externe</label>
              <input type="url" class="form-control w-100" name="url_user" placeholder="http://instagram.com" required>
            </div>
            <div class="text-center">
              <button class="btn btn-success w-50 mt-2" type="submit" name="submit">Valider</button>
            </div>

          </form>

        </div>
      </div>
    </div>

  </body>
  </html>
