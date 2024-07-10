<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <title>Downloads</title>
    <?php
    include (BASE_PATH . "assets/html/start-page.php");
    ?>
    <div class="d-flex flex-column flex-shrink-0 p-3 main-content ">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-12 p-0">
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>CCMS-Data-Download</span></p>
                </div>
            </div>
            <?php
            include (BASE_PATH . "dropdown-selection/device-list.php");
            ?>
            <div class="row">
                <div class="col-sm-3 p-0 pe-sm-2 ">
                </div>
                <div class="col-sm-6 p-0 pe-sm-2 ">
                    <div>
                        <div class="card mt-3">
                            <div class="card-header bg-primary bg-opacity-25 fw-bold">
                                <span class="me-2">Download Data</span>
                                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                    data-bs-title="Info" data-bs-content="To Download the device data."> <i
                                        class="bi bi-info-circle"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <form class="col-md-12" id="ccms-data">
                                    <div class="mb-2 mt-1 ms-3">
                                        <label for="select-group" class="form-label ">Group:</label>
                                        <select class="form-select" id="select-group">
                                            <option value="Select Telegram Group">Select Area</option>
                                            <option value="CCMS Amaravathi">CCMS Amaravathi</option>
                                            <option value="CCMS Bhopal">CCMS Bhopal</option>
                                        </select>
                                        <label for="select-device" class="form-label ">Device:</label>
                                        <select class="form-select" id="select-device">
                                            <option value="CCMS-1">Device 1</option>
                                            <option value="CCMS-2">Device 2</option>
                                            <option value="CCMS-3">Device 3</option>
                                            <option value="CCMS-4">Device 4</option>
                                            <option value="CCMS-5">Device 5</option>
                                            <option value="CCMS-6">Device 6</option>
                                            <option value="CCMS-7">Device 7</option>
                                            <option value="CCMS-8">Device 8</option>
                                            <option value="CCMS-9">Device 9</option>
                                            <option value="CCMS-10">Device 10</option>
                                        </select>
                                        <div class="row">
                                            <div class="col-md-6 mb-2 mt-1">
                                                <div class="form-group">
                                                    <label for="from-date">From Date:</label>
                                                    <input type="date" class="form-control" id="from-date">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-2 mt-1">
                                                <div class="form-group">
                                                    <label for="to-date">To Date:</label>
                                                    <input type="date" class="form-control" id="to-date">
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="w-100 text-center">
                                    <button type="submit" class="btn btn-primary mb-2">Download</button>
                                    <div class="mt-1 text-start">
                                        <p class="text-danger">*30 days data can be downloaded only once.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <!-- Modals links -->
            </main>
            <script src="<?php echo BASE_PATH; ?>js_modal_scripts/popover.js"></script>

            <script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
            <?php
            include (BASE_PATH . "assets/html/body-end.php");
            include (BASE_PATH . "assets/html/html-end.php");
            ?>