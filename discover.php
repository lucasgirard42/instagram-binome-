<?php
session_start();
//connexion à la BDD
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

$img_post = $bdd->prepare("SELECT * FROM images");
$img_post->execute();
$imagesPosts = $img_post->fetchAll();

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
<body class="smooth-scroll">

  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-white p-2" id="back2top">
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
              <a class="nav-item nav-link mr-2" href="discover.php"><i class="fas fa-globe fa-2x"></i></a>
              <div class="dropdown show">
                <a class="nav-item nav-link mr-2 dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-heart fa-2x"></i></a>
                <div class="dropdown-menu"  aria-labelledby="dropdownMenuLink">
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>PHP</strong> aime votre activité</li>
                    <li class="list-group-item"><strong>Bootstrap</strong> aime votre activité</li>
                  </ul>
                </div>
              </div>
              <a class="nav-item nav-link mr-2" href="profil.php"><img src="<?php echo ".".($data['img_profil']) ?>" alt="" class="img-profil-navbar shadow-sm" width="35px;" height="35px;"></a>
              <a class="nav-item nav-link ml-2" href="add_image.php"><i class="fas fa-plus-circle fa-2x"></i></a>
              <a class="nav-item nav-link ml-2" href="./data/disconnect.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <ul class="nav justify-content-center bg-white shadow-sm">
      <li class="nav-item mr-2">
        <a class="nav-link text-dark" href="#nature">Nature</a>
      </li>
      <li class="nav-item mr-2">
        <a class="nav-link text-dark" href="#food">Food</a>
      </li>
      <li class="nav-item mr-2">
        <a class="nav-link text-dark" href="#work">Business & Work</a>
      </li>
      <li class="nav-item mr-2">
        <a class="nav-link text-dark" href="#People">People</a>
      </li>
      <li class="nav-item mr-2">
        <a class="nav-link text-dark" href="#covid">COVID-19</a>
      </li>
    </ul>

    <div class="container mt-5">
      <h1><span class="badge badge-success justify-content-center mb-2">Nature</span></h1>
      <div class="row" id="nature">
        <!-- Photo NATURE  -->
        <div class="col-sm-4 pb-2">
          <img src="https://source.unsplash.com/random/600x800/?nature/1" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-4 pb-2">
          <img src="https://source.unsplash.com/random/600x800/?nature/2" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-4 pb-2">
          <img src="https://source.unsplash.com/random/600x800/?nature/3" class="img-fluid shadow" alt="Responsive image">
        </div>
      </div>

      <h1><span class="badge badge-warning justify-content-center mt-5 mb-2">Food</span></h1>
      <!-- Photo FOOD -->
      <div class="row mt-2" id="food">
        <div class="col-sm-6 pb-2">
          <img src="https://source.unsplash.com/random/800x600/?foodporn/1" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-6 pb-2">
          <img src="https://source.unsplash.com/random/800x600/?cake/2" class="img-fluid shadow" alt="Responsive image">
        </div>
      </div>

      <h1><span class="badge badge-primary justify-content-center mt-5 mb-2">Business & Work</span></h1>
      <!-- Photo CITY -->
      <div class="row mt-2" id="work">
        <div class="col-sm-3 pb-2">
          <img src="https://source.unsplash.com/random/600x600/?business/1" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-3 pb-2">
          <img src="https://source.unsplash.com/random/600x600/?business/2" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-3 pb-2">
          <img src="https://source.unsplash.com/random/600x600/?business/3" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-3 pb-2">
          <img src="https://source.unsplash.com/random/600x600/?business/4" class="img-fluid shadow" alt="Responsive image">
        </div>
      </div>
      </div>
    </div>

    <div class="container mt-5">
      <h1><span class="badge badge-info justify-content-center mb-2">People</span></h1>
      <div class="row" id="People">
        <!-- Photo NATURE  -->
        <div class="col-sm-4 pb-2">
          <img src="https://source.unsplash.com/random/600x800/?people/1" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-4 pb-2">
          <img src="https://source.unsplash.com/random/600x800/?people/2" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-4 pb-2">
          <img src="https://source.unsplash.com/random/600x800/?people/3" class="img-fluid shadow" alt="Responsive image">
        </div>
      </div>

      <h1><span class="badge badge-warning justify-content-center mt-5 mb-2">COVID-19</span></h1>
      <!-- Photo FOOD -->
      <div class="row mt-2" id="covid">
        <div class="col-sm-6 pb-2">
          <img src="https://source.unsplash.com/random/800x600/?covid-19/1" class="img-fluid shadow" alt="Responsive image">
        </div>
        <div class="col-sm-6 pb-2">
          <img src="https://source.unsplash.com/random/800x600/?covid-19/2" class="img-fluid shadow" alt="Responsive image">
        </div>
      </div>

    <a href="#back2top" class="fixed-bottom text-dark ml-5 mb-5"><i class="fas fa-arrow-circle-up fa-4x"></i></a>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>
