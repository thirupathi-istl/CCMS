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
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Add Group/Area</span></p>
                </div>
            </div>
            <?php
            include (BASE_PATH . "dropdown-selection/group-device-list.php");
            ?>
            <div class="row ">
                <div class="col-sm-6 p-0 ps-sm-2">
                    <div class="card mt-3 ">
                        <div class="card-header bg-primary bg-opacity-25 fw-bold">
                            <span class="me-2">Add Devices</span>
                            <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus"  data-bs-title="Info" data-bs-content="update gps location">
                                <i class="bi bi-info-circle"></i>
                            </a>
                        </div>
                        <div class="card-body">

                            <div class="row mt-2">
                                <div class="col-sm-2">
                                </div>
                                <div class="col-sm-8">
                                    <div class="mb-2 ms-2">
                                        <label for="frame_update_time" class="form-label">Select  Group/Area</label>
                                        <select class="form-select" id="group_name" onchange="handleGroupChange()">
                                            <option value="">Select Group/Area</option>
                                            <?php
                                            include(BASE_PATH."dropdown-selection/group-list.php");
                                            ?>
                                            <option value="_add_new_group">Add New Group/Area</option>
                                        </select>
                                    </div>
                                    <div class="container mt-2">
                                        <?php
                                        include(BASE_PATH."dropdown-selection/multiple-devices.php")
                                        ?>
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
</main>

<?php
include(BASE_PATH."/devices/html/group-creation.php");
?>



<script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
<script src="<?php echo BASE_PATH; ?>assets/js/project/group_creation.js"></script>
<script src="<?php echo BASE_PATH; ?>json-data/json-data.js"></script>


<?php
include (BASE_PATH . "assets/html/body-end.php");
include (BASE_PATH . "assets/html/html-end.php");
?>