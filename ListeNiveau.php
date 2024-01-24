<?php
session_start();
require './assets/include/App.php';
$sql="select * FROM niveau WHERE 1;";
$apps= new App;
$resultat= $apps->SelectionnerTout($sql);

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
                <h3 class="page-title">Niveaux</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.php">Tableaau de Bord</a>
                  </li>
                  <li class="breadcrumb-item active">Niveau</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="student-group-form">
            <div class="row">
              <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search by ID ..."
                  />
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search by Name ..."
                  />
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Search by Phone ..."
                  />
                </div>
              </div>
              <div class="col-lg-2">
                <div class="search-student-btn">
                  <button type="btn" class="btn btn-primary">Rechercher</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-body">
                  <div class="page-header">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="page-title">Niveau</h3>
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
                          <th>Intitulé niveau</th>
                          <th> code Niveau</th>
                          <th class="text-end">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if(isset($resultat)&&($resultat!=null)):
                          foreach($resultat as $matiere):
                        ?>
                        <tr>
                          <td>
                          
                          </td>
                          <td> <?php echo $matiere->id?></td>
                          
                          <td><?php echo $matiere->nom?></td>
                          <td><?php echo $matiere->num?></td>
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