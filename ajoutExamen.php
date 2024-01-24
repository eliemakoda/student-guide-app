
<?php
require "./assets/include/App.php";
$apps= new App;
$sql="SELECT * FROM matiere WHERE 1;";
$results= $apps->SelectionnerTout($sql);
if(isset($_POST['submit']))
{
  $nom=$_POST['nom'];
  $url=$_POST['url'];
  $matiere=$_POST['matiere'];
  $textcontent= $_POST['contenutext'];
  $sql="INSERT INTO examen(nom, content_url, content_text, id_matiere) VALUES(:nom, :content_url, :content_text, :id_matiere)";
  $tab=[
    ":nom"=>$nom, 
    ":content_url"=>$url,
     ":content_text"=>$textcontent, 
     ":id_matiere"=>$matiere
  ];
  $dest="./ListeExamen.php";
  $apps->inserer($sql,$tab,$dest);
}
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
                <h3 class="page-title">Ajouter un Examen</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="./InscrEtudiant.php">Examen</a>
                  </li>
                  <li class="breadcrumb-item active">Ajouter un Examen</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="./ajoutExamen.php">
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title"><span>Détails Examen</span></h5>
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
                            >Url de l'examen <span class="login-danger">*</span></label
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
                            <option value=<?php echo $res->id?>><?php echo $res->nom?></option>
                          <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                      <label class="col-form-label col-md-2">Contenu textuel du cours </label>
                      <div class="col-md-10">
                        <textarea
                     
                          class="form-control"
                          placeholder="Enter text here"
                          name="contenutext"
                        ></textarea>
                      </div>
                    </div>
                    
                     
                      <div class="col-12">
                        <div class="student-submit">
                          <button type="submit" class="btn btn-primary text-center align-items-center" name="submit">
                            Submit
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