<?php
require './assets/include/App.php';
session_start();
if(isset($_GET['id_user']))
{
  $id= $_GET['id_user'];
  $sql= "SELECT * FROM user WHERE id=$id";
  $app= new App;
  $results= $app->SelectionnerUn($sql);
  $image= explode(',',$results->image);
}
require "./header.php";

?>


<div class="page-wrapper">
        <div class="content container-fluid">
          <div class="page-header">
            <div class="row">
              <div class="col">
                <h3 class="page-title">Profil</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="index.html">Tableau de Bord</a>
                  </li>
                  <li class="breadcrumb-item active">Profil</li>
                </ul>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="profile-header">
                <div class="row align-items-center">
                  <div class="col-auto profile-image">
                    <a href="#">
                      <img
                        class="rounded-circle"
                        alt="User Image"
                        src="assets/img/<?php echo $image[0];?>"
                      />
                    </a>
                  </div>
                  <div class="col ms-md-n2 profile-user-info">
                    <h4 class="user-name mb-0"></h4>
                    <h6 class="text-muted"><?php echo $results->firstname;?></h6>
                    <div class="user-Location">
                      <i class="fas fa-map-marker-alt"></i> <?php echo "Douala, Cameroun";?>
                    </div>
                    <div class="about-text"><?php echo $results->first_login;?></div>
                  </div>
              
                </div>
              </div>
              <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                  <li class="nav-item">
                    <a
                      class="nav-link active"
                      data-bs-toggle="tab"
                      href="#per_details_tab"
                      >A propos</a
                    >
                  </li>
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      data-bs-toggle="tab"
                      href="#password_tab"
                      >Mot de passe</a
                    >
                  </li>
                </ul>
              </div>
              <div class="tab-content profile-tab-cont">
                <div class="tab-pane fade show active" id="per_details_tab">
                  <div class="row">
                    <div class="col-lg-9">
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title d-flex justify-content-between">
                            <span>Details Personels </span>
                            <a
                              class="edit-link"
                              data-bs-toggle="modal"
                              href="#edit_personal_details"
                              ><i class="far fa-edit me-1"></i>Editer</a
                            >
                          </h5>
                          <div class="row">
                            <p
                              class="col-sm-3 text-muted text-sm-end mb-0 mb-sm-3"
                            >
                              Nom
                            </p>
                            <p class="col-sm-9"><?php echo $results->firstname;?></</p>
                          </div>
                        

                    </div>
                
                </div>

                <div id="password_tab" class="tab-pane fade">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Changer le mot de passe</h5>
                      <div class="row">
                        <div class="col-md-10 col-lg-6">
                          <form>
                            <div class="form-group">
                              <label>Ancien  Mot de passe </label>
                              <input type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label>Nouveau Mot de passe</label>
                              <input type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                              <label>Confirmer le Mot de passe </label>
                              <input type="password" class="form-control" />
                            </div>
                            <button class="btn btn-primary" type="submit">
                              Sauvegarder les changements 
                            </button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
<?php
    require './footer.php';
  ?>    
  </body>
  </html>