<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>User Activity</title> 
  <style>
    .table-container {
      display: none;
  }
</style> 
<?php 
include(BASE_PATH."assets/html/start-page.php"); 
?>
<div class="d-flex flex-column flex-shrink-0 p-3 main-content">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-12 p-0">
                <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>User Activity</span></p>
            </div>
        </div>
        <?php include(BASE_PATH."dropdown-selection/group-device-list.php"); ?>
        <div class="row">
            <div class="container mt-3 p-0">
                <div class="row justify-content-center align-items-center">
                    <div class="col-auto d-flex align-items-center flex-wrap">
                        <div class="mb-2 mr-md-3 ps-3">
                            <select id="dataSelect" class="form-select" aria-label="Large select example">
                                <option value="active_all">Active All</option>
                                <option value="on_off">On/Off</option>
                                <option value="voltage">Voltage</option>
                                <option value="current">Current</option>
                            </select>
                        </div>
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

            <!-- active all table --> 
            <div id="active_all_table" class="table-container">
                <div class="table-responsive rounded border">
                    <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100 text-center">
                        <thead>
                            <tr>
                                <th class="bg-logo-color text-white">Data & Time</th>
                                <th class="bg-logo-color text-white">Activity</th>
                                <th class="bg-logo-color text-white">User-ID</th> 
                                <th class="bg-logo-color text-white">User-Name</th>                               
                            </tr>
                        </thead>
                        <tbody id="deviceTableBody">
                            <tr>
                                <td class="col-size-1">15:25:23 29-05-2024</td>
                                <td>Lights On</td>
                                <td>9618433011 / tsiic@gmail.com</td>
                                <td>Jedimetla Tsiic</td>                          
                            </tr>
                            <tr>
                                <td class="col-size-1">15:25:23 29-05-2024</td>
                                <td>Lights OFF</td>
                                <td>9618433011 / tsiic@gmail.com</td>
                                <td>Jedimetla Tsiic</td>                          
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- On/Off table -->
            <div id="on_off_table" class="table-container">
                <div class="table-responsive rounded border">
                    <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100 text-center">
                        <thead>
                            <tr>
                                <th class="bg-logo-color text-white">Data & Time</th>
                                <th class="bg-logo-color text-white">ON/OFF</th>
                                <th class="bg-logo-color text-white">Time(Mins)</th> 
                                <th class="bg-logo-color text-white">User Details</th>                               
                            </tr>
                        </thead>
                        <tbody id="deviceTableBody">
                            <tr>
                                <td class="col-size-1">15:25:23 29-05-2024</td>
                                <td>ON</td>
                                <td>10</td>
                                <td>9618433011 / tsiic@gmail.com</td>                          
                            </tr>
                            <tr>
                                <td class="col-size-1">15:25:23 29-05-2024</td>
                                <td>OFF</td>
                                <td>15</td>
                                <td>9618433011 / tsiic@gmail.com</td>                          
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Voltage table --> 
            <div id="voltage_table" class="table-container">
                <div class="table-responsive rounded mt-2 border">
                    <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100">
                        <thead class="sticky-header text-center">
                            <tr class="header-row-1">                                    
                                <th class="bg-primary text-white" colspan="3">Min Voltages (Volts)</th>
                                <th class="bg-primary text-white" colspan="3">Max Voltage (Volts)</th>
                                <th class="bg-primary text-white">Data & Time</th>
                                <th class="bg-primary text-white" colspan="2">User Details</th>                            
                            </tr>
                            <tr class="header-row-2">
                                <th class="bg-secondary text-white">R</th>
                                <th class="bg-secondary text-white">Y</th>
                                <th class="bg-secondary text-white">B</th>
                                <th class="bg-secondary text-white">R</th>
                                <th class="bg-secondary text-white">Y</th>
                                <th class="bg-secondary text-white">B</th>            
                                <th class="bg-secondary text-white"></th>
                                <th class="bg-secondary text-white">User Id</th>
                                <th class="bg-secondary text-white">User Name</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">    
                            <tr>                                    
                                <td>170</td>
                                <td>170</td>
                                <td>170</td>
                                <td>220</td>
                                <td>220</td>
                                <td>220</td>
                                <td>16:00:38 17-08-2023</td>
                                <td>8801111150 / swamy@istlabs.in</td>
                                <td>Swamy</td>
                            </tr>
                            <tr>                                    
                                <td>150</td>
                                <td>150</td>
                                <td>150</td>
                                <td>210</td>
                                <td>210</td>
                                <td>210</td>
                                <td>16:00:38 17-08-2023</td>
                                <td>8801111156 / ajay@istlabs.in</td>
                                <td>Ajay</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <!-- Current table --> 
            <div id="current_table" class="table-container">
                <div class="table-responsive rounded mt-2 border">
                    <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100">
                        <thead class="sticky-header text-center">
                            <tr class="header-row-1">                                    
                                <th class="bg-primary text-white" colspan="3">Current (A)</th>
                                <th class="bg-primary text-white">Data & Time</th>
                                <th class="bg-primary text-white" colspan="2">User Details</th>                            
                            </tr>
                            <tr class="header-row-2">                                
                                <th class="bg-secondary text-white">R</th>
                                <th class="bg-secondary text-white">Y</th>
                                <th class="bg-secondary text-white">B</th>            
                                <th class="bg-secondary text-white"></th>
                                <th class="bg-secondary text-white">User Id</th>
                                <th class="bg-secondary text-white">User Name</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">    
                            <tr>                        
                                <td>40</td>
                                <td>30</td>
                                <td>40</td>
                                <td>16:00:38 17-08-2023</td>
                                <td>8801111150 / swamy@istlabs.in</td>
                                <td>Swamy</td>
                            </tr>
                            <tr>                        
                                <td>40</td>
                                <td>30</td>
                                <td>40</td>
                                <td>16:00:38 17-08-2023</td>
                                <td>8801111159 / ajay@istlabs.in</td>
                                <td>Ajay</td>
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
<script src="<?php echo BASE_PATH;?>js_modal_scripts/user_activity.js"></script>
<script>

</script>
<?php include(BASE_PATH."assets/html/body-end.php"); ?>
<?php include(BASE_PATH."assets/html/html-end.php"); ?>

