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
    include (BASE_PATH . "assets/html/start-page.php");
    ?>
    <div class="d-flex flex-column flex-shrink-0 p-3 main-content ">
        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-lg-12 p-0">
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>IOT Settings</span></p>
                </div>
            </div>
            <?php
            include (BASE_PATH . "dropdown-selection/group-device-list.php");
            ?>
            <div class="row ">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 p-0 mt-3 pe-md-2">
                            <div class="card">
                                <div class="card-header bg-primary bg-opacity-25 fw-bold d-flex align-items-center">
                                    <span class="me-2">Device ID change</span>
                                    <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                    data-bs-title="Info" data-bs-content="To change the deivce id."> <i class="bi bi-info-circle"></i>
                                </a>
                            </div>
                            <div class="card-body row">
                                <form class="col-sm-12" id="new_deviceid_change">
                                    <div class="mb-2 ms-2">
                                        <label for="new_deviceid_change" class="form-label">New Device ID:</label>
                                        <input type="text" class="form-control" id="new_deviceid_change"
                                        placeholder="Enter New Device ID">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
                                <div class="w-100 text-center">
                                    <button type="submit" class="btn btn-primary mb-2">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 p-0 mt-3 pe-lg-2 ps-md-2">
                        <div class="card">
                            <div class="card-header bg-primary bg-opacity-25 fw-bold d-flex align-items-center">
                                <span class="me-2">Device Serial ID</span>
                                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                                data-bs-title="Info" data-bs-content="To change the deivce serial id."> <i class="bi bi-info-circle"></i>
                            </a>
                        </div>
                        <div class="card-body row">
                            <form class="col-sm-12" id="new_device_serial_id">
                                <div class="mb-2 ms-2">
                                    <label for="new_device_serial_id" class="form-label">New Serial ID:</label>
                                    <input type="text" class="form-control" id="new_device_serial_id"
                                    placeholder="Enter New Serial ID">
                                </div>
                            </form>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
                            <div class="w-100 text-center">
                                <button type="submit" class="btn btn-primary mb-2">Update</button>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 p-0 mt-3 px-lg-2 pe-md-2">
                    <div class="card  mb-3">
                        <div class="card-header bg-primary bg-opacity-25 fw-bold">
                            <span class="me-2">Hysteresis Setting</span>
                            <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                            data-bs-title="Info" data-bs-content="To change the hysteresis value."> <i class="bi bi-info-circle"></i>
                        </a>
                    </div>
                    <div class="card-body row">
                        <form class="col-sm-12" id="hysteresis">
                            <div class="mb-2 ms-2">
                                <label for="hysteresis_value" class="form-label">Value:</label>
                                <select class="form-select" id="hysteresis_value">
                                    <option value="5">5</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                    <option value="50">50</option>
                                    <option value="60">60</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
                        <div class="w-100 text-center">
                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 p-0 mt-3 ps-md-2 ">
                <div class="card flex-grow-1">
                    <div class="card-header bg-primary bg-opacity-25 fw-bold">
                        <span class="me-2">On/Off Interval Time</span>
                        <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                        data-bs-title="Info" data-bs-content="To change the interval time for on/off."> <i class="bi bi-info-circle"></i>
                    </a>
                </div>
                <div class="card-body row">
                    <form class="col-sm-12" id="on_off_interval_time">
                        <div class="mb-2 ms-2">
                            <label for="on_off_interval_time_value" class="form-label">Value:</label>
                            <select class="form-select" id="on_off_interval_time_value">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                                <option value="60">60</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
                    <div class="w-100 text-center">
                        <button type="submit" class="btn btn-primary mb-2">Update</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-sm-4 p-0 mt-3 pe-sm-3">
            <div class="card h-100">
                <div class="card-header bg-primary bg-opacity-25 fw-bold">
                    <span class="me-2">Energy</span>
                    <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                    data-bs-title="Info" data-bs-content="To change energy of device."> <i class="bi bi-info-circle"></i>
                </a>
            </div>
            <div class="card-body row">
                <form class="col-sm-12" id="Energy">
                    <div class="mb-2 ms-2">
                        <label for="pf_settings" class="form-label">KWH:</label>
                        <input type="text" class="form-control" id="Energy_kwh" placeholder="0">
                        <label for="pf_settings" class="form-label">KVAH:</label>
                        <input type="text" class="form-control" id="Energy_Kwh" placeholder="0">
                    </div>
                </form>
            </div>
            <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
                <div class="d-flex flex-column flex-sm-row w-100 justify-content-center">
                    <button type="button" class="btn btn-primary me-sm-2 mb-2 "
                    data-bs-toggle="modal" data-bs-target="#multiple">All Devices</button>
                    <button type="button" class="btn btn-primary mb-2">Update</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4 p-0 mt-3 pe-sm-2">
        <div class="card h-100">
            <div class="card-header bg-primary bg-opacity-25 fw-bold">
                <span class="me-2">WIFI</span>
                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                data-bs-title="Info" data-bs-content="To change the details of wifi."> <i class="bi bi-info-circle"></i>
            </a>
        </div>

        <div class="card-body row">
            <form class="col-sm-12" id="wifi">
                <div class="mb-2 ms-2">
                    <label for="Access_Point" class="form-label">Access Point:</label>
                    <input type="text" class="form-control" id="Access_Point"
                    placeholder="Enter Access Point">
                    <label for="Password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="Password"
                    placeholder="Enter Password">
                </div>
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
            <div class="w-100 text-center">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
            </div>
        </div>
    </div>
</div>


<div class="col-sm-4 p-0 mt-3 ps-sm-2 ">

    <div class="h-100 ">
        <div class="card ">
            <div class="card-header bg-primary bg-opacity-25 fw-bold">
                <span class="me-2">Read IOT Settings</span>
                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                data-bs-title="Info" data-bs-content="Read more about device settings"> <i class="bi bi-info-circle"></i>
            </a>
        </div>
        <div
        class="card-footer d-flex justify-content-between align-items-center flex-wrap">
        <div class="w-100 text-center">
            <button type="submit" class="btn btn-primary mb-2">Update</button>
        </div>

    </div>
</div>


<div class="card mt-3">
    <div class="card-header bg-primary bg-opacity-25 fw-bold">
        <span class="me-2">Reset</span>
        <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
        data-bs-title="Info" data-bs-content="reset the device"> <i class="bi bi-info-circle"></i>
    </a>
</div>
<div
class="card-footer d-flex justify-content-between align-items-center flex-wrap">
<div class="w-100 text-center">
    <button type="submit" class="btn btn-primary mb-2">Reset</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-6 p-0 mt-3 pe-md-2 d-flex flex-column">
        <div class="card flex-grow-1">
            <div class="card-header bg-primary bg-opacity-25 fw-bold">
                <span class="me-2">Angle</span>
                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"
                data-bs-title="Info" data-bs-content="To change angle."> <i class="bi bi-info-circle"></i>
            </a>
        </div>
        <div class="card-body row">
            <form class="col-sm-6 border-end" id="maxangle">
                <div class="fw-bold m-0">Angle (below)</div>
                <div class="mb-2 ms-2">
                    <label for="r_phaseangle" class="form-label text-danger">R Phase:</label>
                    <input type="text" class="form-control" id="r_phaseangle"
                    placeholder="Enter angle (0-9)">
                    <label for="y_phaseangle" class="form-label text-warning">Y Phase:</label>
                    <input type="text" class="form-control" id="y_phaseangle"
                    placeholder="Enter angle (0-9)">
                    <label for="b_phaseangle" class="form-label text-primary">B Phase:</label>
                    <input type="text" class="form-control" id="b_phaseangle"
                    placeholder="Enter angle (0-9)">
                </div>
            </form>
            <form class="col-sm-6" id="minangle">
                <div class="fw-bold m-0">Angle (above)</div>
                <div class="mb-2 ms-2">
                    <label for="r_phaseangle" class="form-label text-danger">R Phase:</label>
                    <input type="text" class="form-control" id="r_phaseangle"
                    placeholder="Enter angle (0-9)">
                    <label for="y_phaseangle" class="form-label text-warning">Y Phase:</label>
                    <input type="text" class="form-control" id="y_phaseangle"
                    placeholder="Enter angle (0-9)">
                    <label for="b_phaseangle" class="form-label text-primary">B Phase:</label>
                    <input type="text" class="form-control" id="b_phaseangle"
                    placeholder="Enter angle (0-9)">
                </div>
            </form>
        </div>
        <div class="card-footer d-flex justify-content-between align-items-center flex-wrap">
            <div class="w-100 text-center">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
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

<script src="<?php echo BASE_PATH; ?>js_modal_scripts/popover.js"></script>
<script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
<script src="<?php echo BASE_PATH; ?>assets/js/project/settings-iot.js"></script>
<?php
include (BASE_PATH . "assets/html/body-end.php");
include (BASE_PATH . "assets/html/html-end.php");
?>