<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>Add New User</title>  
  <?php
  include(BASE_PATH."assets/html/start-page.php");
  ?>
  <div class="d-flex flex-column flex-shrink-0 p-3 main-content ">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-12 p-0">
            <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Add New User</span></p>
            </div>
        </div>
 

        <div class="row">                 

            <div class="container mt-2 p-0">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-12 col-md-6 col-lg-4 mb-2">
                            <div class="input-group">
                                <input type="text" class="form-control " placeholder="Search..." id="searchInput">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" onclick="searchTable()">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-2 text-end ">
                            <button type="button" class="btn btn-primary w-md-auto" onclick="addUser()">Add User</button>
                        </div>
                    </div>
            </div>


       
                <div class="col-12 p-0">
                    <div class="table-responsive rounded mt-2 border">
                    <table class="table table-striped styled-table w-100 text-center resulttable">
                                <thead>
                                    <tr>
                                        <th class="bg-logo-color text-white">S.No</th>
                                        <th class="bg-logo-color text-white">Name</th>
                                        <th class="bg-logo-color text-white">User_Id</th>
                                        <th class="bg-logo-color text-white">User_Role</th>
                                        <th class="bg-logo-color text-white">Email</th>
                                        <th class="bg-logo-color text-white">Mobile</th>
                                        <th class="bg-logo-color text-white">Password</th>
                                        <th class="bg-logo-color text-white">Status</th>
                                        <th class="bg-logo-color text-white ">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>XYZ</td>
                                        <td>B6QA12</td>
                                        <td>Employee</td>
                                        <td>name@gmail.com</td>
                                        <td>1234567890</td>
                                        <td>xyz@123</td>
                                        <td><button type="button" class="btn btn-primary" onclick="userview(this)">Devices Handled</button></td>
                                        <td><i class="bi bi-trash-fill text-danger" onclick="deleteRow(this)"></i></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>ABC</td>
                                        <td>B6QA25</td>
                                        <td>Employee</td>
                                        <td>name@gmail.com</td>
                                        <td>1234567890</td>
                                        <td>xyz@123</td>
                                        <td><button type="button" class="btn btn-primary" onclick="userview(this)">Devices Handled</button></td>
                                        <td><i class="bi bi-trash-fill text-danger" onclick="deleteRow(this)"></i></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</main>
  <script src="<?php echo BASE_PATH;?>assets/js/sidebar-menu.js"></script>
  <script src="<?php echo BASE_PATH;?>js_modal_scripts/addnewuser.js"></script>
  <script src="<?php echo BASE_PATH;?>js_modal_scripts/searchbar.js"></script>
  <?php
  include(BASE_PATH."assets/html/body-end.php"); 
  include(BASE_PATH."assets/html/html-end.php");
  include(BASE_PATH."addnewuser/modals/adduser-button.php");
  include(BASE_PATH."addnewuser/modals/deviceshandled-button.php");
  include(BASE_PATH."addnewuser/modals/update-button.php");   
  include(BASE_PATH."addnewuser/modals/add-button.php");  
  ?>
