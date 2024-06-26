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

     
        <div class="container">
    <div class="row">
        <div class="d-flex justify-content-end m-2">
            <button type="button" class="btn btn-primary" onclick="addUser()">Add User</button>
        </div>
        <div class="table-responsive rounded mt-2 border">
            <table class="table table-striped styled-table w-100">
                <thead>
                    <tr>
                        <th class="bg-logo-color text-white">S.No</th>
                        <th class="bg-logo-color text-white">Name</th>
                        <th class="bg-logo-color text-white">Role</th>
                        <th class="bg-logo-color text-white">Action</th>
                        <th class="bg-logo-color text-white">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>XYZ</td>
                        <td>Developer</td>
                        <td><i class="bi bi-trash-fill text-danger" onclick="deleteRow(this)"></i></td>
                        <td><button type="button" class="btn btn-primary" onclick="userview(this)">Devices Handled</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</main>
  <script src="<?php echo BASE_PATH;?>assets/js/sidebar-menu.js"></script>
  <script src="<?php echo BASE_PATH;?>js_modal_scripts/addnewuser.js"></script>
  <?php
  include(BASE_PATH."assets/html/body-end.php"); 
  include(BASE_PATH."assets/html/html-end.php");
  include(BASE_PATH."addnewuser/modals/adduser-button.php");
  include(BASE_PATH."addnewuser/modals/deviceshandled-button.php");
  include(BASE_PATH."addnewuser/modals/update-button.php");   
  include(BASE_PATH."addnewuser/modals/add-button.php");  
  ?>

