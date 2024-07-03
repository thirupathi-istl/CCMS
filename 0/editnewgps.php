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
        <div class="col-12 p-0">
          <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Edit Location</span></p>
        </div>
      </div>
      <?php
      include (BASE_PATH . "dropdown-selection/group-device-list.php");
      ?>
      <div class="row ">
        <div class="col-sm-6 p-0 pe-sm-2 ">
          <div>
            <div class="card mt-3">
              <div class="card-header bg-primary bg-opacity-25 fw-bold">
                <span class="me-2">GPS</span>
                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Info"
                  data-bs-content="update gps location "> <i class="bi bi-info-circle"></i>
                </a>
              </div>
              <div class="card-body row">
                <form class="col-md-12" id="Address">
                  <div class="mb-2 mt-1 ms-3">
                    <label for="Street" class="form-label ">Lat&Long:</label>
                    <input type="text" class="form-control" id="street" placeholder="Enter coordinates">

                  </div>
                </form>
              </div>
              <div class="card-footer d-flex justify-content-between align-items-center">
                <div class="w-100 text-center">
                  <button type="submit" class="btn btn-primary mb-2">Update</button>
                </div>
              </div>
            </div>
          </div>
          <div>
            <div class="card mt-3">
              <div class="card-header bg-primary bg-opacity-25 fw-bold">
                <span class="me-2">Staic GPS</span>
                <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Info"
                  data-bs-content="To enable or diable the static GPS location"> <i class="bi bi-info-circle"></i>
                </a>

              </div>
              <div class="card-body row">
                <div class="d-flex justify-content-between align-items-center">
                  <span>Enable/Disable</span>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="setting1">
                    <label class="form-check-label" for="setting1"></label>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-sm-6 p-0 ps-sm-2 ">

          <div class="card mt-3">
            <div class="card-header bg-primary bg-opacity-25 fw-bold">
              <span class="me-2">Address</span>
              <a tabindex="0" role="button" data-bs-toggle="popover" data-bs-trigger="focus" data-bs-title="Info"
                data-bs-content="To add new address"> <i class="bi bi-info-circle"></i>
              </a>
            </div>
            <div class="card-body row">
              <form class="col-sm-12 col-md-12" id="Address">
                <div class="mb-2 mt-1 ms-3">
                  <label for="Street" class="form-label ">Street/Line:</label>
                  <input type="text" class="form-control" id="street" placeholder="Enter street">
                  <label for="area" class="form-label ">Area:</label>
                  <input type="text" class="form-control" id="area" placeholder="Enter Area">
                  <label for="city" class="form-label ">City/Town:</label>
                  <input type="text" class="form-control" id="city" placeholder="Enter City/Town">
                  <label for="district" class="form-label ">District:</label>
                  <input type="text" class="form-control" id="district" placeholder="Enter District">
                  <label for="State" class="form-label ">State:</label>
                  <input type="text" class="form-control" id="State" placeholder="Enter State">
                  <label for="pincode" class="form-label ">Pincode:</label>
                  <input type="text" class="form-control" id="pincode" placeholder="Enter Pincode">
                  <label for="Country" class="form-label ">Country:</label>
                  <input type="text" class="form-control" id="Country" placeholder="Enter Country">
                </div>
              </form>
            </div>
            <div class="card-footer text-end">
              <div class="w-100 text-center">
                <button type="submit" class="btn btn-primary mb-2">Update</button>
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
  <!-- Modals links -->
  </main>
  <script src="<?php echo BASE_PATH; ?>assets/js/sidebar-menu.js"></script>
  <script src="<?php echo BASE_PATH; ?>js_modal_scripts/devicesetting_popover.js"></script>
  <?php
  include (BASE_PATH . "assets/html/body-end.php");
  include (BASE_PATH . "assets/html/html-end.php");
  ?>