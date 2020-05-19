<?php
session_start();
include  'connexion.php';

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
        <form class="mx-auto" action="./data/sign_in_login.php" method="POST" >
          <img class="img-fluid" src="./images/instagram.png" width="250" height="100" class="d-inline-block align-top" alt="">
          <div class="form-group mt-3">
          <?php if(isset($_GET['error']) && $_GET['error'] === 'username'){  ?>
              <p class="text-danger text-center"><strong>veuilliez-vous inscrire !</strong></p>

             <?php  }
              ?>
            <div class="input-group flex-nowrap pt-5">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">@</span>
              </div>
              <input type="text" name='username' class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping" required>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
          </div>
          <button type="submit" name="login" class="btn btn-success pb-1">Login</button><br/>
          <strong>don't have an account? <a href="sign_up.php">Sign up</a></strong>
        </form>
      </div> 
    </div> 
  </div>
    
 

  

  </body>
  </html>
