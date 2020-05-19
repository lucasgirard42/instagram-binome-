<?php
session_start();
include 'connexion.php';

$userSelect = $bdd->prepare("SELECT * FROM users WHERE username = ?");
$userSelect->execute([$_SESSION['username']]);
$user = $userSelect->fetch();

$user_data = $bdd->prepare("SELECT * FROM user_data WHERE user_id = ?");
$user_data->execute([$user['id']]);
$data = $user_data->fetch();

$request = $bdd->prepare("SELECT * FROM images WHERE user_id = ? ORDER BY images.created_at DESC");
$request->execute([$user['id']]);
$images = $request->fetchAll();


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
  <link rel="stylesheet" href="./css/Antonin.css">
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
          <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link mr-2" href="index.php"><i class="fas fa-home fa-2x"></i></a>
              <div class="dropdown show">
                <a class="nav-item nav-link mr-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-heart fa-2x"></i></a>
                <div class="dropdown-menu"  aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </div>
              <a class="nav-item nav-link mr-2" href="profil.php"><img src="<?php echo ".".($data['img_profil']) ?>" alt="" class="img-profil-navbar shadow-sm" width="35px;" height="35px;"></a>
              <a class="nav-item nav-link ml-4" href="add_image.php"><i class="fas fa-plus-circle fa-2x"></i></a>
            </div>
          </div>
        </div>
      </nav>
    </header>


    <div class="container-fluid h-100">
      <div class="container w-25 d-flex justify-content-center mt-5">
        <div class="card p-4 shadow" style="width: 22rem;">
          <h4 class="text-center text-underlined"><strong>Ajouter une photo</strong></h4>
          <form action="./data/add_image_upload.php" method="POST" enctype="multipart/form-data">

            <div class="form-group mt-4 ">
              <label for="img_profil">Selectionne ta photo</label>
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
              <textarea class="form-control mb-2" rows="2" name="description" placeholder="Faites une breve description de votre photo." required></textarea>
            </div>

            <div class="text-center">
              <button class="btn btn-success align-center" type="submit" name="submit">Ajouter</button>
            </div>

          </form>

        </div>
      </div>
    </div>

  </body>
  </html>
