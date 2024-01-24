
<?php
require './assets/include/App.php';
if(isset($_POST['submit'])){
  $nom = $_POST['nom'];
  $url= $_POST['url'];
  $id_matiere=$_POST['matiere'];
  $type=$_POST['type'];
  $conttext=$_POST['contenuTextuel'];
$sql="INSERT INTO chapitre(content_url, content_text, type, id_matiere) VALUES (:content_url, :content_text, :type, :id_matiere)";
$tab=[
  ":content_url"=>$url, 
  ":content_text"=>$conttext, 
  ":type"=>$type, 
  ":id_matiere"=>$id_matiere
];
$destination="./ajoutChapitre.php";
$apps= new App;
$apps->inserer($sql,$tab,$destination);

}
$apps= new App;
$sql="SELECT * FROM matiere where 1";
$results=$apps->SelectionnerTout($sql);
require "./header.php";
?>
<?php
if(isset($results)&&($results!=null)):
?>
<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Ajouter un chapitre
                </h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="./ListeChapitre.php">Examen</a>
                  </li>
                  <li class="breadcrumb-item active">Ajouter un chapitre</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="./ajoutChapitre.php">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title"><span>Détails chapitre </span></h5>
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
                            >Url du chapitre <span class="login-danger">*</span></label
                          >
                          <input
                            type="url"
                            class="form-control"
                            placeholder="Url"
                            name="url"
                          />
                        </div>
                      </div>

                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Matiere Concernée <span class="login-danger">*</span></label
                          >
                          <select class="form-control select" name="matiere">
                            <?php
                            foreach($results as $res):
                            ?>
                            <option value=<?php echo $res->id?>><?php echo $res->nom; ?></option>
                            <?php
                            endforeach;
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Type de chapitre<span class="login-danger">*</span></label
                          >
                          <select class="form-control select" name="type">
                            <option value="Facultatif">Facultatif</option>
                            <option value="Obligatoire">Obligatoire</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-form-label col-md-2">Contenu textuel du cours </label>
                      <div class="col-md-10">
                        <textarea
                     
                          class="form-control"
                          placeholder="Enter text here"
                          name="contenuTextuel"
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
      endif;
    require './footer.php';
  ?>