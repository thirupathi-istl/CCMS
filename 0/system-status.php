<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <style>
        table th, table td {
            white-space: nowrap;
        }
        table th:nth-child(2), table td:nth-child(2) {
            width: 150px; /* Adjust as needed */
        }
        table th, table td {
            width: 100px; /* Default width for other columns */
        }
    </style>

    <title>System Status</title>
    <?php
    include (BASE_PATH . "assets/html/start-page.php");
    ?>
</head>
<body>
    <div class="d-flex flex-column flex-shrink-0 p-3 main-content">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-12 p-0">
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>System Status</span></p>
                </div>
            </div>
            <?php
            include (BASE_PATH . "dropdown-selection/group-device-list.php");
            ?>
            <div class="row">
                <div class="col-md-12 p-0 ">
                    <div class="card mt-3">
                        <div class="card-header bg-primary bg-opacity-25 fw-bold">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="me-2">System Status</span>
                                    <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                        data-bs-title="Info"
                                        data-bs-content="The table display the SIMCOM Module Communication Fail Time.">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-4 mb-2 mt-1"></div>
                                <div class="col-md-4 mb-2 mt-1">
                                <div class="d-flex flex-column flex-sm-row w-100 justify-content-center">
                                        <div>
                                        <label for="simcom-select-date">Select Date:</label>
                                        <input type="date" class="form-control" id="simcom-select-date">
                                        </div>
                                        <div class="w-100 text-center ms-0 mt-3">
                                        <button type="button" class="btn btn-primary mt-2" id="search-button">Search</button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 m-1 mb-2">
                                    <div class="table-responsive rounded m-1 border" style="max-height:400px;overflow-y: auto;">
                                        <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100 text-center"
                                            id="dataTable" style="font-size: 0.9rem;">
                                            <thead>
                                                <tr>
                                                    <th class="bg-logo-color text-white" scope="col">Device_ID</th>
                                                    <th class="bg-logo-color text-white" scope="col">Updated On</th>
                                                    <th class="bg-logo-color text-white" scope="col">RTC</th>
                                                    <th class="bg-logo-color text-white" scope="col">FLASH</th>
                                                    <th class="bg-logo-color text-white" scope="col">WIFI</th>
                                                    <th class="bg-logo-color text-white" scope="col">ADE</th>
                                                    <th class="bg-logo-color text-white" scope="col">GPS</th>
                                                    <th class="bg-logo-color text-white" scope="col">ON/OFF</th>
                                                    <th class="bg-logo-color text-white" scope="col">R-CONTACTOR</th>
                                                    <th class="bg-logo-color text-white" scope="col">y-CONTACTOR</th>
                                                    <th class="bg-logo-color text-white" scope="col">b-CONTACTOR</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>CCMS_1</td>
                                                    <td>16:12:10 06-07-2024</td>
                                                    <td>FAIL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>AUTO OFF</td>
                                                    <td>Off</td>
                                                    <td>on</td>
                                                    <td>Off</td>
                                                </tr>
                                                <tr>
                                                    <td>CCMS_1</td>
                                                    <td>16:12:10 06-07-2024</td>
                                                    <td>FAIL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>AUTO OFF</td>
                                                    <td>Off</td>
                                                    <td>on</td>
                                                    <td>Off</td>
                                                </tr>
                                                <tr>
                                                    <td>CCMS_1</td>
                                                    <td>16:12:10 08-07-2024</td>
                                                    <td>FAIL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>NORMAL</td>
                                                    <td>AUTO OFF</td>
                                                    <td>Off</td>
                                                    <td>on</td>
                                                    <td>Off</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <div class="w-100 text-center">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="<?php echo BASE_PATH; ?>js_modal_scripts/office-use-js/system-status.js"></script>
        
        <script src="<?php echo BASE_PATH; ?>js_modal_scripts/popover.js"></script>
        <script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
        <?php
        include (BASE_PATH . "assets/html/body-end.php");
        include (BASE_PATH . "assets/html/html-end.php");
        ?>
    </div>
</body>
</html>
