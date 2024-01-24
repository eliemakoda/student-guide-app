
<?php
require './assets/include/App.php';
$sql="select * from niveau where 1;";
$apps= new App;
$result=$apps->SelectionnerTout($sql);
if(isset($_POST["submit"])){
  $nom= $_POST["nom"];
  $coef=$_POST["coefficient"];
  $niveau=$_POST["id_niveau"];

$sql="INSERT INTO matiere(nom, id_niveau, coefficient) VALUES(:nom, :id_niveau, :coefficient)";
$tab= [
  ":nom"=>$nom,
  ":id_niveau"=>$niveau, 
  ":coefficient"=>$coef
];
$destination="./Listematière.php";
$apps->inserer($sql,$tab,$destination);
}
require "./header.php";
?>
<?php
if(isset($result)&& ($result!=null)):
?>
<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Ajouter une Matière</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="./InscrEtudiant.php">Matière</a>
                  </li>
                  <li class="breadcrumb-item active">Ajouter une Matiere</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="./AjoutMatiere.php">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title"><span>Ajouter une  Matière</span></h5>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            > Nom
                            <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Nom"
                            name="nom"
                          />
                        </div>
                      </div>
                   
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Coefficient de la matière <span class="login-danger">*</span></label
                          >
                          <input
                            type="number"
                            class="form-control"
                            placeholder="Coefficient"
                            name="coefficient"
                          />
                        </div>
                      </div>

                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Niveau <span class="login-danger">*</span></label
                          >
                          <select class="form-control select" name="id_niveau">
                            <?php
                            foreach($result as $res):
                            ?>
                            <option value=<?php echo $res->id?>><?php echo $res->nom?></option>
                            <?php
                            endforeach;
                            ?>
                          </select>
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
      else:
      ?>
      <div class="align-items-center">
        <p class="text-lg-center"> veuillez renseigner un niveau </p>
    </div>
      <?php
      endif;
    require './footer.php';
  ?>
</body>
</html>