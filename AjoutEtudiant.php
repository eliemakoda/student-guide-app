<?php
require './assets/include/App.php';
$sql="SELECT * FROM niveau WHERE 1";
$apps= new App;
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $surname=$_POST["surname"];
    $sexe=$_POST["sexe"];
    $datenaiss=$_POST["annee"];
    $religion=$_POST["religion"];
    $email=$_POST["email"];
    $niveau=$_POST["niveau"];
    $matricule=$_POST["matricule"];
    $telephone=$_POST["telephone"];
    $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
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
$sql="INSERT INTO student(name, matricule, surname, date_naiss, sexe, religion, email, id_niveau, password,image) VALUES(:name, :matricule, :surname, :date_naiss, :sexe, :religion, :email, :id_niveau, :password,:image)";
$tab=[
    ":name"=>$name,
     ":matricule"=>$matricule, 
     ":surname"=>$surname, 
     ":date_naiss"=>$datenaiss, 
     ":sexe"=>$sexe,
      ":religion"=>$religion, 
      ":email"=>$email,
       ":id_niveau"=>$niveau, 
      ":password"=>$password,
      ":image"=>implode(",",$urlsImages)
];
$dest= "./AjoutEtudiant.php";
$apps->inserer($sql,$tab,$dest);    
}
}
$nivs= $apps->SelectionnerTout($sql);
require './header.php'
?>
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title">Ajouter Etudiant</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="">Etudiant</a>
                            </li>
                            <li class="breadcrumb-item active">Ajouter un Etudiant</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card comman-shadow">
                    <div class="card-body">
                        <form method="POST" action="./AjoutEtudiant.php" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title student-info">
                                    Information  Etudiant 
                                        <span><a href="javascript:;"><i class="feather-more-vertical"></i></a></span>
                                    </h5>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Nom 
                                            <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="Entrez votre nom" name="name" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Prenom
                                            <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="Entrez votre Prenom" name="surname"/>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Sexe <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="sexe">
                                            <option value="Feminin">Feminin</option>
                                            <option value="Masculin">Masculin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms calendar-icon">
                                        <label>Date de Naissance
                                            <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" type="date" placeholder="Jour-Mois-Annee" name="annee" />
                                    </div>
                                </div>
                              
                               
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Religion <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="religion">
                                            <option value="Chretien">Chrétien</option>
                                            <option value="Musulman">Musulman</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>E-Mail <span class="login-danger">*</span></label>
                                        <input class="form-control" type="text" placeholder="Entrez votre Addresse Email " name="email" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Niveau <span class="login-danger">*</span></label>
                                        <select class="form-control select" name="niveau">
                                            <?php foreach($nivs as $niv): ?>
                                            <option value=<?php echo $niv->id ?>><?php echo $niv->num ?></option>
                                           <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>matricule  </label>
                                        <input class="form-control" type="text"  readonly  name="matricule" id="matricule"/>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Telephone </label>
                                        <input class="form-control" type="tel" placeholder="Entrez votre numero " name="telephone"/>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group local-forms">
                                        <label>Mot de passe  </label>
                                        <input class="form-control" type="password" placeholder="Entrez votre mot de passe " name="password" />
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="form-group students-up-files">
                                        <div class="form-group service-upload">
                                            <span>Choisir la photo de profil</span>
                                            <input type="file" name="images[]" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="student-submit">
                                        <button type="submit" class="btn btn-primary" name="submit">
                                            Enregistrer
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    // Récupérer l'élément input avec l'ID "matricule"
let matriculeInput = document.getElementById('matricule');

// Générer le matricule
function genererMatricule() {
  let date = new Date();
  let minute = date.getMinutes();
  let seconde = date.getSeconds();
  let entierAleatoire = Math.floor(Math.random() * 1000); // Générer un entier aléatoire entre 0 et 999

  // Formater la minute et la seconde pour avoir toujours deux chiffres
  minute = minute < 10 ? '0' + minute : minute;
  seconde = seconde < 10 ? '0' + seconde : seconde;

  // Créer le matricule en concaténant les différentes parties
  let matricule = 'KIA-' + '-'+minute + '-'+seconde + '-'+entierAleatoire;

  // Mettre à jour la valeur de l'input avec le matricule généré
  matriculeInput.value = matricule;
}

// Appeler la fonction genererMatricule au chargement de la page pour générer le matricule initial
genererMatricule();

</script>
<?php
require './footer.php';
?>