
<?php
require './assets/include/App.php';
$apps= new App;
if(isset($_POST['submit']))
{
    $nom= $_POST['nom'];
    $numero=$_POST['num'];
    $sql="INSERT INTO niveau(nom, num) VALUES(:nom, :num)";
    $tab=[
        ":nom"=>$nom,
        ":num"=>$numero
    ];
    $destination="./AjouterNiveau.php";
    $apps->inserer($sql,$tab,$destination);
}
require "./header.php";
?>
<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Ajouter un Niveau </h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="./InscrEtudiant.php">Niveau</a>
                  </li>
                  <li class="breadcrumb-item active">Ajouter un Niveau</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="./AjouterNiveau.php">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title"><span>Détails Niveau</span></h5>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            > Numero du niveau 
                            <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Numéro d'identification du niveau Ex: LGRH1  "
                            name="num"
                          />
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-form-label col-md-2">Entrez le nom du cours  </label>
                      <div class="col-md-10">
                        <textarea
                     
                          class="form-control"
                          placeholder="Intitulé du niveau"
                          name="nom"
                        ></textarea>
                      </div>
                    </div>
                    
                     
                      <div class="col-12">
                        <div class="student-submit">
                          <button type="submit" class="btn btn-primary text-center align-items-center" name="submit"> 
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
      <?php
    require './footer.php';
  ?>