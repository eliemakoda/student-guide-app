<?php
// Vérifier si la session n'est pas déjà démarrée
if (session_status() == PHP_SESSION_NONE) {
    // Démarrer la session
    session_start();
} 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="assets/img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"rel="stylesheet">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/feather/feather.css">
    <link rel="stylesheet" href="assets/plugins/icons/flags/flags.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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

    <link
      rel="stylesheet"
      href="assets/plugins/datatables/datatables.min.css"
    />

    <link rel="stylesheet" href="assets/css/style.css" />
</head>

<body>

    <div class="main-wrapper">

        <div class="header">

            <div class="header-left">
                <a href="index.php" class="logo">
                    <!-- <img src="assets/img/logo.png" alt="Logo"> -->
                </a>
                <a href="index.php" class="logo logo-small">
                    <!-- <img src="assets/img/logo-small.png" alt="Logo" width="30" height="30"> -->
                </a>
            </div>
            <div class="menu-toggle">
                <a href="javascript:void(0);" id="toggle_btn">
                    <i class="fas fa-bars"></i>
                </a>
            </div>

            <div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <a class="mobile_btn" id="mobile_btn">
                <i class="fas fa-bars"></i>
            </a>

            <ul class="nav user-menu">
                

          
                <li class="nav-item zoom-screen me-2">
                    <a href="#" class="nav-link header-nav-list win-maximize">
                        <img src="assets/img/icons/header-icon-04.svg" alt="">
                    </a>
                </li>
                <?php  if(isset($_SESSION['name_etudiant'])): ?>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <?php
                            
                            $im= explode(",",$_SESSION['image_etudiant']);
                            ?>
                            <img class="rounded-circle" src="assets/img/<?php echo $im[0]; ?>" width="31"
                                alt="<?php
                                echo $_SESSION['surname_etudiant']; 
                                    echo "  ";
                                echo $_SESSION['name_etudiant']; 
                                
                                
                                ?>">
                            <div class="user-text">
                                <h6><?php 
                                echo $_SESSION['surname_etudiant'];
                                echo "  ";
                                echo $_SESSION['name_etudiant'];
                                
                                ?></h6>
                                <p class="text-muted mb-0">Etudiant</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                            <?php
                            
                            $im= explode(",",$_SESSION['image_etudiant']);
                            ?>
                                <img src="assets/img/<?php echo $im[0]; ?>" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?php echo $_SESSION['name_etudiant'];?></h6>
                                <p class="text-muted mb-0">Etudiant</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profil.php?id_etudiant=<?php echo  $_SESSION['id_etudiant'];?>">Mon Profil</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>

            </ul>
            <?php
            endif;
            ?>

        </div>


        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">
                            <span>Menu Principal</span>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-grid"></i> <span> Tableau de Bord </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="AccueilEtudiant.php" class="active">Accueil </a></li>
                             
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-grid"></i> <span> Mes Examens </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="MesEXamen.php" class="active">Mes Examens </a></li>
                             
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>