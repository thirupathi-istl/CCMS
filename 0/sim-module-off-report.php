<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Sim Module Off Report</title>
    <?php
    include (BASE_PATH . "assets/html/start-page.php");
    ?>
    <div class="d-flex flex-column flex-shrink-0 p-3 main-content">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-06 p-0">
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Simcom Fail Status</span>
                    </p>
                </div>
            </div>
            <?php
            // include("dropdown-selection/device-list.php");
            include (BASE_PATH . "dropdown-selection/group-device-list.php");
            ?>
            <div class="row">
                <div class="col-sm-3 p-0 pe-sm-2">
                </div>
                <div class="col-sm-6 p-0 pe-sm-2">
                    <div class="card mt-3">
                        <div class="card-header bg-primary bg-opacity-25 fw-bold">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="me-2">Simcom Fail Status</span>
                                    <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                        data-bs-title="Info"
                                        data-bs-content="The table display the SIMCOM Module Communication Fail Time">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-4 mb-2 mt-1"></div>
                                    <div class="col-md-8 mb-2 mt-1">
                                        <div class="d-flex flex-column flex-sm-row w-100 justify-content-center">
                                            <div>
                                                <label for="simcom-select-date">Select Date:</label>
                                                <input type="date" class="form-control" id="simcom-select-date">
                                            </div>
                                            <div class="w-100 text-center ms-0 mt-4">
                                                <button type="button" class="btn btn-primary mb-2"
                                                    id="search-button">Search</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-3">

                                </div>
                                <div class="col-sm-e m-1 mb-2">
                                    <div class="table-responsive rounded m-1 border"
                                        style="max-height:400px;overflow-y: auto;">
                                        <table
                                            class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100 text-center"
                                            id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="bg-logo-color text-white" scope="col">Simcom Fail Time
                                                    </th>
                                                    <th class="bg-logo-color text-white" scope="col">Server Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 08-06-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 09-07-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 05-07-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 28-06-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 28-06-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 28-06-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 05-07-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 05-07-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 05-07-2024</td>
                                                </tr>
                                                <tr>
                                                    <td>00:50:52 28-06-2024</td>
                                                    <td>00:51:20 05-07-2024</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="w-100 text-end">
                                <button type="button" class="btn btn-primary mb-2">Add More</button>
                            </div>

                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">

                            <div class="w-100 text-center">
                                <button type="submit" class="btn btn-primary mb-2">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
              
                <script src="<?php echo BASE_PATH; ?>js_modal_scripts/office-use-js/sim-module-off-report.js"></script>
                
                <script src="<?php echo BASE_PATH; ?>js_modal_scripts/popover.js"></script>
                <script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
                <?php
                include (BASE_PATH . "assets/html/body-end.php");
                include (BASE_PATH . "assets/html/html-end.php");
                ?>