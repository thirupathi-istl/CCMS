<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>

    <title>Data Review Settings</title>
    <?php
    include (BASE_PATH . "assets/html/start-page.php");
    ?>
    <div class="d-flex flex-column flex-shrink-0 p-3 main-content ">
        <div class="container-fluid">

            <div class="row d-flex align-items-center">
                <div class="col-12 p-0">
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>User-Actions</span></p>
                </div>
            </div>
            <?php
            // include("dropdown-selection/device-list.php");
            include (BASE_PATH . "dropdown-selection/group-device-list.php");
            ?>
            <div class="row">
                <div class="col-sm-2 p-0 pe-sm-2 ">
                </div>
                <div class="col-sm-8 p-0 pe-sm-2 ">
                    <div class="card mt-3">
                        <div class="card-header bg-primary bg-opacity-25 fw-bold">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="me-2">User Actions</span>
                                    <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                        data-bs-title="Info"
                                        data-bs-content="Admin can Update.">
                                        <i class="bi bi-info-circle"></i>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive rounded m-1 border" style=" overflow-y: auto;">
                                <table class="table table-striped table-bordered table-hover table-type-1 table-sticky-header w-100 text-center" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th class="bg-logo-color text-white" scope="col">Configuration</th>
                                            <th class="bg-logo-color text-white" scope="col">Status</th>
                                            <th class="bg-logo-color text-white" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>ONOFF</td>
                                            <td>Updated</td>
                                            <td></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>RESET</td>
                                            <td>Updated</td>
                                            <td></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>SCHEDULE_TIME</td>
                                            <td>Updated</td>
                                            <td></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>SOFTWARE</td>
                                            <td>Updated</td>
                                            <td></td>
                                            
                                        </tr>
                                        <tr>
                                            <td>VOLTAGE</td>
                                            <td>Updated</td>
                                            <td></td>
                                           
                                        </tr>
                                        <tr>
                                            <td>DEFAULT</td>
                                            <td>Updated</td>
                                            <td></td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



                </div>
                

             
                <script src="<?php echo BASE_PATH; ?>js_modal_scripts/popover.js"></script>
                <script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
                <?php
                include (BASE_PATH . "assets/html/body-end.php");
                include (BASE_PATH . "assets/html/html-end.php");
                ?>