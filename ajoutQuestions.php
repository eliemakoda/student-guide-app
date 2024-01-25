
<?php
require './assets/include/App.php';
$apps= new App;
$results= $apps->SelectionnerTout("SELECT * FROM examen where 1;");
if(isset($_POST["submit"]))
{
  $question=$_POST["question"];
  $rep1=$_POST["rep1"];
  $rep2=$_POST["rep2"];
  $rep3=$_POST["repb"];
  $id=$_POST["examen"];
  $sql="INSERT INTO qcm(question, reponse1, reponse2, reponseb, id_examen) VALUES (:question, :reponse1, :reponse2, :reponseb, :id_examen)";
  $tab=[
   ":question"=>$question, 
   ":reponse1"=>$rep1, 
   ":reponse2"=>$rep2, 
   ":reponseb"=>$rep3,
    ":id_examen"=>$id
  ];
  $dest="./ajoutQuestions.php";
  $apps->inserer($sql,$tab,$dest);

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
                  <form method="POST" action="./ajoutQuestions.php">
                  <div class="form-group row">
                      <label class="col-form-label col-md-2">Entrez la question  </label>
                      <div class="col-md-10">
                        <textarea
                     
                          class="form-control"
                          placeholder="question"
                          name="question"
                        ></textarea>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title"><span>reponses</span></h5>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            > Reponse 1 
                            <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="reponse 1  "
                            name="rep1"
                          />
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            > Reponse 2 
                            <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="reponse 2"
                            name="rep2"
                          />
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            > Bonne reponse 
                            <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="entrez la bonne reponse   "
                            name="repb"
                          />
                        </div>
                      </div>
                    
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Examen Concerné<span class="login-danger">*</span></label
                          >
                          <select class="form-control select" name="examen">
                            <?php
                            foreach($results as $res):
                            ?>
                            <option value=<?php echo $res->id?>><?php echo $res->nom?></option>
                          <?php endforeach; ?>
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
    require './footer.php';
  ?>