<?php
session_start();
require './assets/include/App.php';
$sql="select * FROM qcm WHERE 1;";
$apps= new App;

$resultat= $apps->SelectionnerTout($sql);
if(isset($_POST["rechercher"]))
{
    $nom=$_POST["nomrech"];
    $sql="SELECT * FROM qcm where question like '%$nom%' ";
    $resultat=$apps->SelectionnerTout($sql);
}
require "./header.php";
?>

<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Question</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Tableau de Bord</a>
                  </li>
                  <li class="breadcrumb-item active">Liste de Questions</li>
                </ul>
              </div>
            </div>
          </div>
          <form method="POST" action="./ListeQuestions.php">

          <div class="student-group-form">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="rechercher par question ..."
                    name="nomrech"
                  />
                </div>
              </div>
              <div class="col-lg-2">
                <div class="search-student-btn">
                  <button type="btn" class="btn btn-primary" name="rechercher">Rechercher</button>
                </div>
              </div>

            </div>
          </div>
          </form>

          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-body">
                  <div class="page-header">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="page-title">Question</h3>
                      </div>
                      <div
                        class="col-auto text-end float-end ms-auto download-grp"
                      >
                       
                     
                        <button href="#" class="btn btn-outline-primary me-2"
                         onclick="saveAsPDF()"
                        ><i class="fas fa-download"></i> Telecharger la liste</button
                        >
                        <a href="./Listematière.php" class="btn btn-primary"
                          ><i class="fas fa-plus"></i
                        ></a>
                      </div>
                    </div>
                  </div>

                  <div class="table-responsive">
                    <table
                      class="table border-0 star-student table-hover table-center mb-0 datatable table-striped"
                    >
                      <thead class="student-thread">
                        <tr>
                          <th>
                            
                          </th>
                          <th>ID</th>
                          <th>Question</th>
                          <th>Reponse 1</th>
                          <th>Reponse 2</th>
                          <th>Bonne Reponse </th>
                          <th>Examen </th>

                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(isset($resultat)&&($resultat!=null)):
                          foreach($resultat as $quest):
                            $exams= $apps->SelectionnerUn("SELECT * FROM examen WHERE id=$quest->id_examen");
                        ?>
                        <tr>
                          <td>
                          
                          </td>
                          <td> <?php echo $quest->id?></td>
                          
                          <td><?php echo $quest->question?></td>
                          <td><?php echo $quest->reponse1?></td>
                          <td><?php echo $quest->reponse2?></td>
                          <td><?php echo $quest->reponseb?></td>
                          <td><?php echo $exams->nom?></td>

                        </tr>
                        <?php
                        endforeach;
                      endif;
                        ?>
                         
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <footer>
          <p>Copyright © 2024 Keyce Study Guide.</p>
        </footer>
      </div>
    </div>

<?php
    require './footer.php';
  ?>    
</body>
</html>