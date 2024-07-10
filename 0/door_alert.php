<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>Door Alert</title>  
<?php 
include(BASE_PATH."assets/html/start-page.php"); 
?>
<div class="d-flex flex-column flex-shrink-0 p-3 main-content">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-12 p-0">
                <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Door Alert</span></p>
            </div>
        </div>
        <?php include(BASE_PATH."dropdown-selection/group-device-list.php"); ?>
        <div class="row">
            <div class="container mt-3 p-0">
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto d-flex align-items-center flex-wrap">
                        <div class="form-group d-flex align-items-center mb-2  ps-3 ">
                            <label for="actionDate" class="mr-2 mb-0">Filter:</label>
                            <input type="date" class="form-control" id="actionDate" style="width: auto;">
                        </div>
                        <div class="mb-2 ps-3 custom-size">
                            <button type="button" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Door Alert --> 
            <div class="col-xl-1 col-lg-1 clo-md-1 col-sm-1 col-xs-2"></div>
            <div id="door_alert_table" class="table-container col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-8">
                <div class="table-responsive rounded mt-2 border text center">
                    <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100 text-center" >
                        <thead class="sticky-header ">
                            <tr>                                    
                                <th class="bg-primary text-white">Alerts</th>
                                <th class="bg-primary text-white">Data & Time</th>
                            </tr>
                        </thead>
                        <tbody class="">  
                            <tr> 
                                <td>ID:CCMS_1 DoorOpened</td>
                                <td>16:00:38 17-08-2023</td>
                            </tr>
                            <tr>  
                                <td>ID:CCMS_1 DoorClosed</td>
                                <td>20:52:22 17-08-2023</td>
                            </tr>

                            <tr> 
                                <td>ID:CCMS_5 DoorOpened</td>
                                <td>17:00:38 18-08-2023</td>
                            </tr>
                            <tr>  
                                <td>ID:CCMS_5  DoorClosed</td>
                                <td>20:52:22 18-08-2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-xl-1 col-lg-1 clo-md-1 col-sm-1 col-xs-2"></div>
            
        </div>
    </div>
</div>
</main>
<script src="<?php echo BASE_PATH;?>assets/js/sidebar-menu.js"></script>
<script src="<?php echo BASE_PATH;?>js_modal_scripts/alerts.js"></script>
<?php include(BASE_PATH."assets/html/body-end.php"); ?>
<?php include(BASE_PATH."assets/html/html-end.php"); ?>
