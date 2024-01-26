<?php
session_start();
require "./assets/include/App.php";
$apps= new App;
$id= $_GET["id_mat"];
$sql="SELECT * FROM chapitre where id_matiere=$id";
$results = $apps->SelectionnerTout($sql);
$sqlex= "SELECT * FROM  examen WHERE id_matiere=$id";
$exams= $apps->SelectionnerUn($sql);
require "./header.php";
?>
<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-9">
              <div class="blog-view">
                <div class="blog-single-post">
                  <a href="./AccueilEtudiant.php" class="back-btn"
                    ><i class="feather-chevron-left"></i> Retour</a
                  >
                
                  <div class="blog-image">
                    <a href="javascript:void(0);"
                      ><img
                        alt=""
                        src="assets/img/category/blog-detail.jpg"
                        class="img-fluid"
                    /></a>
                  </div>
                  <?php
                  if(isset($results)&&($results!=null)):
                    foreach($results as $res):
                  ?>
                  <h3 class="blog-title">
                 
                    <?php
                    echo "Statut: ";
                    echo $res->type;
                    ?>
                  </h3>
                 
                    <p>
                      pour plus d'informations sur ce chapitre cliquez 
                        <a href="<?php
                    echo $res->content_url;
                    ?>"> ici
                        <?php
                    echo $res->content_url;
                    ?>
                      </a>
                    </p>
                    <p>
                    <?php
                    echo $res->content_text
                    ;
                    ?>
                    </p>
                 
                  </div>
                </div>
                <?php
                endforeach;
                ?>
             <a href="./Evaluation.php?id_exam=<?php echo $exams->id ?>"> vous êtes Prêt ? passez votre examen </a>
                </div>
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