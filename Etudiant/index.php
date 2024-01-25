<?php
require "./assets/include/App.php";
$apps = new App;
if(isset($_POST["submit"])){
$matricule=$_POST["matricule"];
$password= $_POST["password"];
$req= "SELECT * FROM student Where matricule=:matricule";
$tab= [
  "matricule"=>$matricule,
  "password"=>$password
];
$dest="./AccueilEtudiant.php";
$apps->se_connecter_etudiant($req,$tab,$dest);
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
                <h1>Bienvenue à Study Guide </h1>
                <p class="account-subtitle">
                  <!-- Creer un compte? <a href="Signup.php">Creer un c</a> -->
                </p>
                <h2>Se Connecter</h2>

                <form method="POST" action="./index.php">
                  <div class="form-group">
                    <label>matricule <span class="login-danger">*</span></label>
                    <input class="form-control" type="text" name="matricule"/>
                    <span class="profile-views"
                      ><i class="fas fa-user-circle"></i
                    ></span>
                  </div>
                  <div class="form-group">
                    <label>Mot de passe <span class="login-danger">*</span></label>
                    <input class="form-control pass-input" type="text" name="password" />
                    <span
                      class="profile-views feather-eye toggle-password"
                    ></span>
                  </div>
                  <div class="forgotpass">
                    <div class="remember-me">
                      <label
                        class="custom_check mr-2 mb-0 d-inline-flex remember-me"
                      >
                         Se souvenir de moi
                        <input type="checkbox" name="radio" />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" name="submit">
                      Se connecter 
                    </button>
                  </div>
                </form>

            
              </div>
            </div>
          </div>
        </div>
      </div>

<script src="assets/js/jquery-3.6.0.min.js"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/feather.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>