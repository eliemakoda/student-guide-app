
<?php
require "./header.php";
?>

<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="page-title">Ajouter un Etudiant</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="./InscrEtudiant.php">Etudiant</a>
                  </li>
                  <li class="breadcrumb-item active">Ajouter un Etudiant</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-12">
                        <h5 class="form-title"><span>Détails Etudiant</span></h5>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            > ID
                            <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Matricule"
                        readonly
                          />
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >NOM <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Nom"
                          />
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Sexe <span class="login-danger">*</span></label
                          >
                          <select class="form-control select">
                            <option>Masculin</option>
                            <option>Feminin</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Niveau <span class="login-danger">*</span></label
                          >
                          <select class="form-control select">
                            <option value="1">1</option>
                            <option value="2">2</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms calendar-icon">
                          <label
                            >Date de Naissance
                            <span class="login-danger">*</span></label
                          >
                          <input
                            class="form-control datetimepicker"
                            type="text"
                            placeholder="DD-MM-YYYY"
                          />
                        </div>
                      </div>
                      <div class="col-12 col-sm-4">
                        <div class="form-group local-forms">
                          <label
                            >Telephone <span class="login-danger">*</span></label
                          >
                          <input
                            type="text"
                            class="form-control"
                            placeholder="Entrez votre numero de telephone"
                          />
                        </div>
                      </div>
                     
                      <div class="col-12">
                        <div class="student-submit">
                          <button type="submit" class="btn btn-primary text-center align-items-center">
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
    require './footer.php';
  ?>