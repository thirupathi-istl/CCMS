<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>Gis Map</title>  
  <?php
    include("assets/html/html-link.php");
    include("assets/html/body-start.php");  
    include("assets/icons-svg/icons.php");
    include("assets/html/theme-selection.php");
  ?>
  <main class="d-flex flex-nowrap mt-5"> 
    <?php
      include("assets/html/navbar.php"); 
      include("assets/html/sidebar.php"); 
    ?>
    <div class="d-flex flex-column flex-shrink-0 p-3 main-content ">
      <div class="container-fluid">

        <div class="row d-flex align-items-center">
          <div class="col-12 p-0">
            <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Gis Map</span></p>
          </div>
        </div>
        <?php
          include("dropdown-selection/device-list.php");
        ?>
        <div class="row">
          <div class="col-12">
            <div class="row pe-0 h-100">
              <div class="col-12 rounded mt-2 p-0 ">
                <div id="map" style="height: 650px; width: 100%;"></div>
              </div>
              <div class="col-12 mt-2">

                <small>* <i class="bi bi-geo-alt-fill text-danger h5" aria-hidden="true" ></i> Lights are Turned OFF  </small>
                <small>* <i class="bi bi-geo-alt-fill text-success h5" aria-hidden="true" ></i> Lights are turned ON  </small>
                <small>* <i class="bi bi-geo-alt-fill text-warning h5" aria-hidden="true" ></i> Poor Network Units    </small>
                <small>* <i class="bi bi-geo-alt-fill text-purple h5" aria-hidden="true" ></i> Communication Loss Units    </small>
                <small>* <i class="bi bi-geo-alt-fill text-primary h5" aria-hidden="true" ></i> Power Fail Units    </small>

              </div>

            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/project/map.js"></script>
  
  <script>
   // map();

  </script>
  <?php
    include("assets/html/body-end.php"); 
    include("assets/html/html-end.php"); 
  ?>

