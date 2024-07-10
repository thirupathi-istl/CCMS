<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>Alerts</title> 
<?php 
include(BASE_PATH."assets/html/start-page.php"); 
?>
<div class="d-flex flex-column flex-shrink-0 p-3 main-content">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-12 p-0">
                <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Alerts</span></p>
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

            <!-- alerts -->
            <div id="alerts_table" class="table-container">
                <div class="table-responsive rounded mt-2 border">
                    <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100">
                        <thead class="sticky-header text-center">
                            <tr class="header-row-1">                                    
                                <th class="bg-primary text-white">Alerts</th>
                                <th class="bg-primary text-white">Phases/Status</th>
                                <th class="bg-primary text-white" colspan="3">Voltage (Volts)</th>
                                <th class="bg-primary text-white" colspan="3">Current (Amp)</th>
                                <th class="bg-primary text-white">Data & Time</th>
                            </tr>
                            <tr class="header-row-2">
                                <th class="bg-secondary text-white"></th>
                                <th class="bg-secondary text-white"></th>
                                <th class="bg-secondary text-white">R</th>
                                <th class="bg-secondary text-white">Y</th>
                                <th class="bg-secondary text-white">B</th>
                                <th class="bg-secondary text-white">R</th>
                                <th class="bg-secondary text-white">Y</th>
                                <th class="bg-secondary text-white">B</th>            
                                <th class="bg-secondary text-white"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">    
                            <tr> 
                                <td>HIGH Voltage</td>
                                <td>Y (R & B Normal)</td>                                   
                                <td>170</td>
                                <td>170</td>
                                <td>170</td>
                                <td>220</td>
                                <td>220</td>
                                <td>220</td>
                                <td>16:00:38 17-08-2023</td>
                            </tr>
                            <tr>  
                                <td>MCB/Contactor OFF</td>
                                <td>R (Y & B Phase(s) ON)</td>                                  
                                <td>150</td>
                                <td>150</td>
                                <td>150</td>
                                <td>210</td>
                                <td>210</td>
                                <td>210</td>
                                <td>16:00:38 17-08-2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
</div>
</main>
<script src="<?php echo BASE_PATH;?>assets/js/sidebar-menu.js"></script>
<script src="<?php echo BASE_PATH;?>js_modal_scripts/alerts.js"></script>
<?php include(BASE_PATH."assets/html/body-end.php"); ?>
<?php include(BASE_PATH."assets/html/html-end.php"); ?>
