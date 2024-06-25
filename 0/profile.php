<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>Dashboard</title>  
  <?php
  include(BASE_PATH."assets/html/start-page.php");
  ?>
  <div class="d-flex flex-column flex-shrink-0 p-3 main-content ">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
          <div class="col-12 p-0">
            <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Dashboard</span></p>
          </div>
        </div>
      <div class="row">
        <div class="col-md-3 mb-5 ">
            <div class="card">
            <div class="card m-2 ">
              <img src="../assets/photos/profile/profile.png" style="height: 14rem;" class="rounded float-star card-img-top" alt="Profile Image">
            </div>
            <div class="card-body  ">
                <h5 class="card-title" id="name">Pathivada Harsha Vardhan</h5>
                <h6 class="card-text" id="empid">#ISTL-E-2022055 </h6>
                <h6 class="card-text "id="role">Trainee Software Engineer</h6>
                
              </div>
            </div>
          </div>
        <div class=" col-md-9">
            <div class="card  h-100 overflow-auto mb-3">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="true" href="profile.php">Personel</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="change_credentials.php">Credentials</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link " href="#" >Disabled</a>
                        </li>
                      </ul>
                </div>
              <div class="card-body">
                  <div class="card  mb-3">
                      <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Personal Info</span>
                        <button type="button" class="btn btn-primary btn-sm ms-auto" onclick="openEditModal()">
                          Edit
                        </button>
                      </div>
                      <div class="card-body">
                        <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold"> Name</div>
                              <span id="empname">Pathivada Harsha Vardhan</span>
                            </div>
                          </li>
                          
                        </ul>
                      </div>
                 </div>

                <div class="card  mb-3">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Contact Info</span>
                  </div>
                  <div class="card-body">
                    <ul class="list-group">
                      <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">Mobile</div>
                          <span id="mobile">8074415157</span>
                        </div>
                        <div class="ms-2 me-auto">
                          <div class="fw-bold">Email</div>
                          <span id="email">harsha@istlabs.in</span>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="card  mb-3">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <span>Address</span>
                  </div>
                  <div class="card-body">
                  <ul class="list-group">
                          <li class="list-group-item d-flex justify-content-between ">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Village Name</div>
                              <span>Pusapatirega</span>
                            </div>
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">City</div>
                              <span>Vizianagaram</span>
                            </div>
                          </li>

                          <li class="list-group-item d-flex justify-content-between ">
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">State</div>
                              <span>Andhra Pradesh</span>
                            </div>
                            <div class="ms-2 me-auto">
                              <div class="fw-bold">Pincode</div>
                              <span>  535204</span>
                            </div>
                          </li>
                          
                        </ul>
                  </div>
                </div>
         </div>
     <div>  
</div>
</div>
</div>
    </div>
    </div>

    </div>  </div>  </div>
  <?php
  include("../profile/modals/editdetails_modal.php");
  ?>
</div>
</div>
  </main>
  <script src="<?php echo BASE_PATH;?>assets/js/sidebar-menu.js"></script>
  <?php
  include(BASE_PATH."assets/html/body-end.php"); 
  include(BASE_PATH."assets/html/html-end.php"); 
  ?>

<script src="<?php echo BASE_PATH;?>js_modal_scripts/profilejs/editdetails_modal.js"></script>