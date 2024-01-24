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
                <?php  if(isset($_SESSION['email_admin'])): ?>

                <li class="nav-item dropdown has-arrow new-user-menus">
                    <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="assets/img/<?php echo $_SESSION['image'][0]; ?>" width="31"
                                alt="<?php echo $_SESSION['nom_admin']; ?>">
                            <div class="user-text">
                                <h6><?php echo $_SESSION['nom_admin']; ?></h6>
                                <p class="text-muted mb-0">Administrateur</p>
                            </div>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="user-header">
                            <div class="avatar avatar-sm">
                                <img src="assets/img/<?php echo $_SESSION['image'][0]; ?>" alt="User Image"
                                    class="avatar-img rounded-circle">
                            </div>
                            <div class="user-text">
                                <h6><?php echo $_SESSION['nom_admin'];?></h6>
                                <p class="text-muted mb-0">Administrateur</p>
                            </div>
                        </div>
                        <a class="dropdown-item" href="profil.php?id_user=<?php echo  $_SESSION['id_admin'];?>">Mon Profil</a>
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
                            <a href="#"><i class="feather-grid"></i> <span> Dashboard</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="index.php" class="active">Administration </a></li>
                                <li><a href="./Listematière.php">Matieres </a></li>
                                <li><a href="./ListeExamen.php">Examens</a></li>
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-grid"></i> <span> Niveau</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="index.php" class="active">Accueil </a></li>
                                <li><a href="./ListeNiveau.php">Liste Niveaux </a></li>
                                <li><a href="./AjouterNiveau.php">Ajouter un niveau</a></li>
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-book"></i> <span> Matiere</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="index.php" class="active">Matieres </a></li>
                                <li><a href="Listematière.php">Liste des matière  </a></li>
                                <li><a href="AjoutMatiere.php">Ajouter une matiere</a></li>
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-bookmark"></i> <span> Examens</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="./ListeExamen.php" class="active">Liste Examens </a></li>
                                <li><a href="./ajoutExamen.php">Ajouter Examens  </a></li>
                                <li><a href="./mesNotes.php">Notes</a></li>
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-layout"></i> <span> Chapitres de Cours</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="./ListeChapitre.php" class="active">Liste des Chapitre </a></li>
                                <li><a href="./ajoutChapitre.php">Ajouter Des chapitre  </a></li>
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-percent"></i> <span> Notes de cours</span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="./ListeNotes.php" class="active">Liste des Notes </a></li>
                            </ul>
                        </li>
                        <li class="submenu active">
                            <a href="#"><i class="feather-layout"></i> <span> Evaluation </span> <span
                                    class="menu-arrow"></span></a>
                            <ul>
                                <li><a href="./ListeQuestions.php" class="active">Liste des questions </a></li>
                                <li><a href="./ajoutChapitre.php">Ajouter Des Question   </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>