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

$commentSelect = $bdd->prepare("SELECT * FROM comments ORDER BY comments.id DESC LIMIT 2");
$commentSelect->execute([$user['id']]);
$comments = $commentSelect->fetchAll();

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
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm bg-white p-2" id="back2top">
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
                <div class="dropdown-menu w-75"  aria-labelledby="dropdownMenuLink">
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


    <div class="container mt-5 pl-5">
      <div class="row">

        <div class="col-2">
        </div>

        <div class="col-4">
          <img src="<?php echo ".".($data['img_profil']) ?>" alt="" class="img-circle" width="200px;" height="200px;">
        </div>

        <div class="col-6 pl-5">
          <h2><?php
          echo ($user['username']);
          ?></h2>
          <ul class="list-inline">
            <li class="list-inline-item"><strong>59</strong> publications</li>
            <li class="list-inline-item"><strong>5886</strong> abonnés</li>
            <li class="list-inline-item"><strong>530</strong> abonnements</li>
          </ul>
          <ul class="list-unstyled">
            <li><i class="fas fa-pencil-alt"></i> <?php
            echo ($data['description']);
            ?></li>
            <li><i class="fas fa-map-pin"></i> <?php
            echo ($data['localisation']);
            ?></li>
            <li><i class="far fa-envelope"></i> <?php
            echo ($user['mail']);
            ?></li>
            <li><i class="fas fa-long-arrow-alt-right"></i> <?php
            echo ($data['url_user']);
            ?></li>
          </ul>
        </div>
      </div>
    </div><br/>



    <hr style="width: 50%; color: black; height: 0.01rem; background-color:grey;"/>

    <div class="container p-0">
      <div class="row">
        <?php foreach($images as $image){ ?>
          <div class=" modalimage col-md-4 col-sm-12 mt-4" type="button" data-toggle="modal" data-target="#staticBackdrop<?=$image["id"]?>">
            <img src="<?php echo  ".".($image['img_path']) ?>" alt="..." class="Responsive image" width="350px;" height="350px;">
          </div>
          <div class="modal fade" id="staticBackdrop<?=$image["id"]?>" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <img src="<?php echo ".".($image['img_path']) ?>" class="w-100 " alt="">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <p class="text-center mt-2"><i class="fas fa-camera-retro fa-2x"></i></p>
                <p class="ml-2"><i class="fas fa-pencil-alt"></i><?php echo " ".($image['description']) ?></p>
                <small class="text-right"><?php echo "Posté le ".($image['created_at']) ?></small>

                <hr style="width: 100%; color: black; height: 0.01rem; background-color:grey;"/>
                <p class="text-center mt-2"><i class="far fa-comments fa-2x"></i></p>
                <?php foreach($comments as $comment){ ?>
                  <p class="ml-2"><i class="far fa-comment-dots"></i><?= " ".($comment['comment']);?></p>
                <?php } ?>
                <form action="./data/commentary.php?image_id=<?=$image["id"]?>" method="post"></br>
                  <textarea name="text" class="shadow ml-5" cols="40" rows="3" placeholder="ajouter un commentaire..." ></textarea><br>
                  <button type="submit" class="btn btn-outline-primary ml-5 mb-3">Publier</button>
                </form>
              </div>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>
    <a href="#back2top" class="fixed-bottom text-dark ml-5 mb-5"><i class="fas fa-arrow-circle-up fa-4x"></i></a><br/><br/><br/><br/><br/>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
  </html>
