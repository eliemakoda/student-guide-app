<?php
session_start();
require './assets/include/App.php';
$sql = "select * from chapitre left JOIN matiere on chapitre.id_matiere=matiere.id;";
$apps = new App;
$resultat = $apps->SelectionnerTout($sql);
if(isset($_POST["rechercher"]))
{
    $nom=$_POST["nomrech"];
    $sql="SELECT * FROM chapitre where content_text like '%$nom%' ";
    $resultat=$apps->SelectionnerTout($sql);
}
require "./header.php";
?>

<div class="page-wrapper">
  <div class="content container-fluid">
    <div class="page-header">
      <div class="row align-items-center">
        <div class="col">
          <h3 class="page-title">Matière</h3>
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index.php">Tableaau de Bord</a>
            </li>
            <li class="breadcrumb-item active">Matiere</li>
          </ul>
        </div>
      </div>
    </div>

    <form method="POST" action="./ListeChapitre.php">

      <div class="student-group-form">
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="rechercher par contenu ..." name="nomrech" />
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
                  <h3 class="page-title">Matiere</h3>
                </div>
                <div class="col-auto text-end float-end ms-auto download-grp">


                  <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Telecharger la liste</a>
                  <a href="./Listematière.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table border-0 star-student table-hover table-center mb-0 datatable table-striped">
                <thead class="student-thread">
                  <tr>
                    <th>

                    </th>
                    <th>ID</th>
                    <th>contenu chapitre</th>
                    <th>nom Matiere</th>
                    <th>Url</th>

                    <th class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($resultat) && ($resultat != null)) :
                    foreach ($resultat as $matiere) :
                  ?>
                      <tr>
                        <td>

                        </td>
                        <td> <?php echo $matiere->id ?></td>
                        <td>
                          <h2 class="table-avatar">
                            <a href="detailMatiere.php"><?php echo $matiere->content_text ?></a>
                          </h2>
                        </td>
                        <td><?php echo $matiere->nom ?></td>
                        <td><a href="<?php echo $matiere->content_url ?>"><?php echo $matiere->content_url ?></a></td>
                        <td class="text-end">
                          <div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-success-light me-2">
                              <i class="feather-eye"></i>
                            </a>
                            <a href="edit-teacher.php" class="btn btn-sm bg-danger-light">
                              <i class="feather-edit"></i>
                            </a>
                          </div>
                        </td>
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