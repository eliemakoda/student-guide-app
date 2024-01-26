<?php
session_start();
require './assets/include/App.php';
$sql="select * ,matiere.nom as nnom, examen.nom as nnom from note LEFT join examen on note.id_examen= examen.id left join matiere on note.id_matiere= matiere.id where 1;";
$apps= new App;
$resultat= $apps->SelectionnerTout($sql);
if(isset($_POST["rechercher"]))
{
    $nom=$_POST["nomrech"];
    $sql="select * ,matiere.nom as mnom, examen.nom as nnom from note LEFT join examen on note.id_examen= examen.id left join matiere on note.id_matiere= matiere.id  where  matiere.nom like '%$nom%' ";
    $resultat=$apps->SelectionnerTout($sql);
}
require "./header.php";
?>
<script>
function saveAsPDF() {
  const doc = new jsPDF();

  // Select the table element
  const table = document.querySelector('.table');

  // Use html2canvas to capture the table as an image and add it to the PDF
  html2canvas(table).then((canvas) => {
    const imgData = canvas.toDataURL('image/png');
    const imgProps = doc.getImageProperties(imgData);
    const pdfWidth = doc.internal.pageSize.getWidth();
    const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

    doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);

    // Save the PDF file
    doc.save('table.pdf');
  });
}

</script>
<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Notes</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Tableau de Bord</a>
                  </li>
                  <li class="breadcrumb-item active">Note</li>
                </ul>
              </div>
            </div>
          </div>

          <form method="POST" action="./ListeEtudiants.php">

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
                        <h3 class="page-title">Notes Etudiants</h3>
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
                          <th>Nom Matiere</th>
                          <th>Nom examen </th>
                          <th> Note</th>
                          <th> Coefficicent</th>

                          <th class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(isset($resultat)&&($resultat!=null)):
                          foreach($resultat as $etudiant):
                        ?>
                        <tr>
                          <td>
                          
                          </td>
                          <td> <?php echo $etudiant->mnom?></td>
                          
                          <td><?php
                          echo $etudiant->nnom;                 
                           ?></td>

                          <td><?php echo $etudiant->note?></td>
                          <td><?php echo $etudiant->coefficient	?></td>

                          <td class="text-end">
                            <div class="actions">
                              <a
                                href="javascript:;"
                                class="btn btn-sm bg-success-light me-2"
                              >
                                <i class="feather-eye"></i>
                              </a>
                              <a
                                href="edit-teacher.php"
                                class="btn btn-sm bg-danger-light"
                              >
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