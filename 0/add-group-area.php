<?php
require_once 'config-path.php';
require_once '../session/session-manager.php';
SessionManager::checkSession();
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<style>
    .selected-box {
        max-height: 100px;
        /* Adjust this height as needed */
        overflow-y: auto;
        border: 1px solid #ced4da;
        border-radius: 0.25rem;
        padding: 0.5rem;
        margin-top: 1rem;
    }

    .selected-device {
        display: inline-block;
        margin: 2px;
        padding: 5px 10px;
        background-color: #007bff;
        color: white;
        border-radius: 0.25rem;
        cursor: pointer;
    }

    .selected-device .remove {
        margin-left: 8px;
        font-weight: bold;
        cursor: pointer;
    }
</style>

<head>
    <title>Add New Area or Group</title>
    <?php
    include (BASE_PATH . "assets/html/start-page.php");
    ?>
    <div class="d-flex flex-column flex-shrink-0 p-3 main-content ">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-12 p-0">
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>On-Off Control</span></p>
                </div>
            </div>
            <?php
            include (BASE_PATH . "dropdown-selection/group-device-list.php");
            ?>
            <div class="row ">
                <div class="col-sm-6 p-0 pe-sm-2">
                    <div>
                        <div class="card mt-3 ">
                            <div class="card-header bg-primary bg-opacity-25 fw-bold">
                                <span class="me-2">Add Area</span>
                                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                    data-bs-title="Info" data-bs-content="update gps location">
                                    <i class="bi bi-info-circle"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <form id="Address" class="row">
                                    <div class="col-md-6 mb-2 mt-1">
                                        <label for="state" class="form-label">State:</label>
                                        <select class="form-control" id="state">
                                            <option value="">Select State</option>
                                            <option value="AP">Andhra Pradesh</option>
                                            <option value="TN">Tamil Nadu</option>
                                            <option value="KA">Karnataka</option>
                                            <option value="TS">Telangana</option>
                                            <option value="BH">Bhopal</option>
                                            <option value="MH">Maharashtra</option>
                                            <option value="UP">Uttar Pradesh</option>
                                            <option value="GJ">Gujarat</option>
                                            <option value="RJ">Rajasthan</option>
                                            <option value="WB">West Bengal</option>
                                            <option value="OR">Odisha</option>
                                            <option value="PB">Punjab</option>
                                            <option value="HR">Haryana</option>
                                            <option value="BR">Bihar</option>
                                            <option value="MP">Madhya Pradesh</option>
                                            <option value="Other">Other</option>
                                        </select>
                                        <input type="text" class="form-control mt-2 d-none" id="other-state"
                                            placeholder="Enter State">
                                    </div>
                                    <div class="col-md-6 mb-2 mt-1">
                                        <label for="district" class="form-label">District:</label>
                                        <select class="form-control" id="district">
                                            <option value="">Select District</option>
                                            <!-- Districts will be populated based on selected state -->
                                        </select>
                                        <input type="text" class="form-control mt-2 d-none" id="other-district"
                                            placeholder="Enter District">
                                    </div>
                                    <div class="col-md-6 mb-2 mt-1">
                                        <label for="town" class="form-label">Town or City:</label>
                                        <input type="text" class="form-control" id="town"
                                            placeholder="Enter Town or City">
                                    </div>
                                    <div class="col-md-6 mb-2 mt-1">
                                        <label for="area" class="form-label">Area or Group:</label>
                                        <input type="text" class="form-control" id="area" placeholder="Enter Area or Group">
                                    </div>

                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="w-100 text-center">
                                    <button type="button" class="btn btn-primary mb-2"
                                        onclick="updateArea()">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 p-0 ps-sm-2">
                    <div class="card mt-3 ">
                        <div class="card-header bg-primary bg-opacity-25 fw-bold">
                            <span class="me-2">Add Devices</span>
                            <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                data-bs-title="Info" data-bs-content="update gps location">
                                <i class="bi bi-info-circle"></i>
                            </a>
                        </div>
                        <div class="card-body">

                            <div class="row mt-2">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-8">
                                    <form class="col-md-12" id="frame_update_time">
                                        <div class="mb-2 ms-2">
                                            <label for="frame_update_time" class="form-label">Select Area</label>
                                            <select class="form-select" id="time">
                                                <option value="Select Telegram Group">Select Area</option>
                                                <option value="CCMS Bhopal">CCMS Bhopal</option>
                                            </select>
                                        </div>
                                    </form>
                                    <div class="container mt-2">

                                        <div class="row mb-2">
                                            <div class="col">

                                                <div class="btn-group ms-2" role="group"
                                                    aria-label="Select and Deselect All">
                                                    <button id="selectAll" class="btn btn-secondary me-2">Select
                                                        All</button>
                                                    <button id="deselectAll" class="btn btn-secondary">Deselect
                                                        All</button>
                                                </div>
                                                <select id="multi_selection_device_id"
                                                    class="form-select multi_selection_device_id mt-2" multiple
                                                    aria-label="Select multiple devices">
                                                    <option value="device1">Device 1</option>
                                                    <option value="device2">Device 2</option>
                                                    <option value="device3">Device 3</option>
                                                    <option value="device4">Device 4</option>
                                                    <option value="device5">Device 5</option>
                                                    <option value="device6">Device 6</option>
                                                    <option value="device7">Device 7</option>
                                                    <option value="device8">Device 8</option>
                                                    <option value="device9">Device 9</option>
                                                    <option value="device10">Device 10</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="selected-box" id="selectedDevicesBox">
                                            <!-- Selected devices will be displayed here -->
                                        </div>
                                        <input type="hidden" id="deviceInput">
                                        <div class="row mt-2">
                                            <div class="col">
                                                Selected Devices: <span id="selectedCount">0</span>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col">
                                                <button type="submit" class="btn btn-primary mb-2"
                                                    onclick="updateDevice()">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

    


    <script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
    <script src="<?php echo BASE_PATH; ?>js_modal_scripts/add-group-area-scripts/adddevices.js"></script>
    <script src="<?php echo BASE_PATH; ?>js_modal_scripts/add-group-area-scripts/addarea.js"></script>

    <?php
    include (BASE_PATH . "assets/html/body-end.php");
    include (BASE_PATH . "assets/html/html-end.php");
    ?>