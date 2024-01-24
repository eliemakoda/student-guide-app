<?php
require './assets/include/App.php';
$apps= new App;
if(isset($_POST['submit'])){
  $nom = $_POST['nom'];
  $email=$_POST["email"];
  $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
  $urlsImages = [];

  $uploadDirectory ="./assets/img/";
    
  // Vérifier s'il y a des erreurs lors du téléchargement des images
  if (!empty($_FILES["images"]["name"][0])) {
      foreach ($_FILES["images"]["name"] as $key => $imageName) {
          $imageTmpName = $_FILES["images"]["tmp_name"][$key];
          $urlsImages[]=$imageName;
          $imagePath = $uploadDirectory . $imageName;
          move_uploaded_file($imageTmpName,$imagePath);
  }


$sql="INSERT INTO user(email, password,firstname, image) VALUES (:email, :password,:firstname, :image)";

$tab=[
  ":email"=>$email,
  ":password"=>$password,
  ":firstname"=>$nom,
  ":image"=>implode(',',$urlsImages)
];
$destination= "./login.php";
$apps->inserer($sql,$tab,$destination);
};
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=0"
    />
    <title>Study Guide</title>

    <link rel="shortcut icon" href="assets/img/favicon.png" />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="assets/plugins/bootstrap/css/bootstrap.min.css"
    />

    <link rel="stylesheet" href="assets/plugins/feather/feather.css" />

    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css" />

    <link
      rel="stylesheet"
      href="assets/plugins/fontawesome/css/fontawesome.min.css"
    />
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css" />

    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>
<div class="main-wrapper login-body">
  <div class="login-wrapper">
    <div class="container">
      <div class="loginbox">
        <div class="login-left">
          <img class="img-fluid" src="assets/img/login.png" alt="Logo" />
        </div>
        <div class="login-right">
          <div class="login-right-wrap">
            <h1>Creer un compte </h1>
            <p class="account-subtitle">
              Entrez les détails de votre compte
            </p>

            <form method="POST" action="./Signup.php" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nom d'utilisateur <span class="login-danger">*</span></label>
                <input class="form-control" type="text" name="nom" />
                <span class="profile-views"><i class="fas fa-user-circle"></i></span>
              </div>
              <div class="form-group">
                <label>Email <span class="login-danger">*</span></label>
                <input class="form-control" type="email" name="email"/>
                <span class="profile-views"><i class="fas fa-envelope"></i></span>
              </div>
              <div class="form-group">
                <label>Mot de passe <span class="login-danger">*</span></label>
                <input class="form-control " type="password"  name="password"/>

              </div>

              <div class="form-group">
                <label>Confirm password
                  <span class="login-danger">*</span></label>
                <input class="form-control pass-confirm" type="text" />
                <span class="profile-views feather-eye reg-toggle-password"></span>
              </div>
              <div class="form-group service-upload">
                <span>Choisir ma photo de profil</span>
                <input type="file"  name="images[]" multiple>
              </div>
              <div class="dont-have">
                Déjà un compte? <a href="login.php">Se connecter</a>
              </div>
              <div class="form-group mb-0">
                <button class="btn btn-primary btn-block" type="submit" name="submit">
                
                  S'enregistrer
                </button>
              </div>
            </form>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script
      data-cfasync="false"
      src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"
    ></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="assets/js/script.js"></script>