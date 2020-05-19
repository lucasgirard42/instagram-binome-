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
              <a class="nav-item nav-link mr-2" href="profil.php"><img src="<?php echo ".".($data['img_profil']) ?>" alt="" class="img-profil-navbar" width="35px;" height="35px;"></a>
              <a class="nav-item nav-link ml-2" href="add_image.php"><i class="fas fa-plus-circle fa-2x"></i></a>
              <a class="nav-item nav-link ml-2" href="./data/disconnect.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <div class="container w-50 mt-3 alert alert-danger alert-dismissible shadow-sm" role="alert">
      <h4 class="alert-heading text-center">Alerte CODING-19!</h4>
      <p><strong>En raison de la crise actuelle et du manque de "skills", le site n'est donc pas responsive.</strong></p>
      <hr>
      <p class="mb-0"><strong>Pour vous protéger et protéger les autres, n'utilisez pas PHP Vanilla et n'oubliez pas de fermer vos 	&lt;/div&gt;.<br/>
        Ce message n'a aucun sens mais lavez vous les mains quand même. &#128517;</strong></p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="container mt-3 ">
        <div class="container w-75 p-0">
          <div class="row">
            <div class="col-12 p-0">
              <div class="container bg-white shadow-sm p-5">
                <div class="story1" type="button" data-toggle="modal" data-target="#staticBackdrop">
                  <img src="./images/story-1.jpg"  alt="">
                  <svg viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="40"/>
                  </svg>
                </div>
                <div class="story2" type="button" data-toggle="modal" data-target="#staticBackdrop2">
                  <img src="./images/story-2.jpg" alt="">
                  <svg viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="40"/>
                  </svg>
                </div>
                <div class="story3" type="button" data-toggle="modal" data-target="#staticBackdrop3">
                  <img src="./images/story-3.jpg" alt="">
                  <svg viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="40"/>
                  </svg>
                </div>
                <div class="story4" type="button" data-toggle="modal" data-target="#staticBackdrop4">
                  <img src="./images/story-4.jpg" alt="">
                  <svg viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="40"/>
                  </svg>
                </div>
                <div class="story5" type="button" data-toggle="modal" data-target="#staticBackdrop5">
                  <img src="./images/story-5.jpg" alt="">
                  <svg viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="40"/>
                  </svg>
                </div>
                <div class="story6" type="button" data-toggle="modal" data-target="#staticBackdrop6">
                  <img src="./images/story-6.jpg" alt="">
                  <svg viewbox="0 0 100 100">
                    <circle cx="50" cy="50" r="40"/>
                  </svg>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-------CONTAINER USER POST ------>
      <?php foreach($imagesPosts as $imagePost){ ?>
        <?php

        $countLikesStatement = $bdd->prepare("SELECT count(*) FROM likes WHERE img_id = ? ");
        $countLikesStatement->execute([
          $imagePost['id']
        ]);
        $likeCount = $countLikesStatement->fetchColumn();

        ?>

        <div class="container mt-4">
          <div class="row">
            <div class="col-12 d-flex justify-content-center">
              <div class="card text shadow-sm" style="width: 35rem;">
                <img src="<?php echo  ".".($imagePost['img_path']) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                  <nav class="nav">
                    <a class="nav-item nav-link mr-2 text-danger" href="./data/like.php?image_id=<?= $imagePost['id'] ?>"><i class="fas fa-heart fa-2x"></i></a>
                  </nav>
                  <h5 class="card-title"><strong><?= $likeCount ?> J'aimes</strong></h5>
                  <p class="card-text"><i class="fas fa-pencil-alt"></i><?php echo " ".($imagePost['description']) ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php } ?>
      <a href="#back2top" class="fixed-bottom text-dark ml-5 mb-5"><i class="fas fa-arrow-circle-up fa-4x"></i></a>


      <!----------------------------------------------------------------------------MODAL DES USER STORIES --------------------------------------------------------------------->

      <!-----------USER STORIES 1---------->
      <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel"></h5>
              <img src="./images/story-1.jpg" class="w-50 " alt="">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://source.unsplash.com/A5rCN8626Ck/800x600/" class="d-block w-100 shadow" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://source.unsplash.com/EoThx95bYPg/800x600/" class="d-block w-100 shadow" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://source.unsplash.com/O453M2Liufs/800x600/" class="d-block w-100 shadow" alt="...">
                  </div>
                </div>
              </div>

            </div>

          </div>
        </div>
      </div>

      <!-----------USER STORIES 2---------->
      <div class="modal fade" id="staticBackdrop2" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="staticBackdropLabel2"></h5>
              <img src="./images/story-2.jpg" class="w-50" alt="">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="https://source.unsplash.com/random/800x600/?food/" class="d-block w-100 shadow" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/800x600/?travel/" class="d-block w-100 shadow" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="https://source.unsplash.com/random/800x600/?city/" class="d-block w-100 shadow" alt="...">
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div>
      </div>
    </div>


    <!-----------USER STORIES 3---------->
    <div class="modal fade" id="staticBackdrop3" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel"></h5>
            <img src="./images/story-3.jpg" class="w-50" alt="">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="https://source.unsplash.com/random/800x600/?dark/" class="d-block w-100 shadow" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="https://source.unsplash.com/random/800x600/?videogame/" class="d-block w-100 shadow" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="https://source.unsplash.com/random/800x600/?technology/" class="d-block w-100 shadow" alt="...">
                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>
  </div>

  <!-----------USER STORIES 4---------->
  <div class="modal fade" id="staticBackdrop4" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel2"></h5>
          <img src="./images/story-4.jpg" class="w-50" alt="">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://source.unsplash.com/random/800x600/?makeup/1/" class="d-block w-100 shadow" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/800x600/?makeup/2/" class="d-block w-100 shadow" alt="...">
              </div>
              <div class="carousel-item">
                <img src="https://source.unsplash.com/random/800x600/?makeup/3/" class="d-block w-100 shadow" alt="...">
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</div>


<!-----------USER STORIES 5---------->
<div class="modal fade" id="staticBackdrop5" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"></h5>
        <img src="./images/story-5.jpg" class="w-50" alt="">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://source.unsplash.com/random/800x600/?photography/1/" class="d-block w-100 shadow" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://source.unsplash.com/random/800x600/?photography/2/" class="d-block w-100 shadow" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://source.unsplash.com/random/800x600/?photography/3/" class="d-block w-100 shadow" alt="...">
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>
</div>


<!-----------USER STORIES 6---------->
<div class="modal fade" id="staticBackdrop6" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel2"></h5>
        <img src="./images/story-6.jpg" class="w-50" alt="">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="carouselExampleSlidesOnly" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://source.unsplash.com/random/800x600/?dark/" class="d-block w-100 shadow" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://source.unsplash.com/random/800x600/?videogame/" class="d-block w-100 shadow" alt="...">
            </div>
            <div class="carousel-item">
              <img src="https://source.unsplash.com/random/800x600/?technology/" class="d-block w-100 shadow" alt="...">
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
