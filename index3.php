<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>iScientific Techsolutions Labs</title>  
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">

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
    <div class=" d-flex flex-column flex-shrink-0 p-3 main-content ">

        <div class="container-fluid">
            <div class="row d-flex align-items-center">
                <div class="col-12 p-0">
                    <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Device List</span></p>
                </div>
            </div>
            <?php
            include("dropdown-selection/group-device-list.php");
            ?>

            
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">
                            <i class="bi bi-bar-chart-fill"></i> Total
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">220</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <i class="bi bi-check-circle-fill"></i> Installed
                        </div>
                        <div class="card-body ">
                            <h5 class="card-title">160</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">
                            <i class="bi bi-x-circle-fill"></i> Not-installed
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">60</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-info mb-3">
                        <div class="card-header">
                            <i class="bi bi-lightbulb-fill"></i> Active
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">220</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">
                            <i class="bi bi-exclamation-triangle-fill"></i> Poor N/W
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">160</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-secondary mb-3">
                        <div class="card-header">
                            <i class="bi bi-power"></i> Input Power Fail
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">60</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-dark mb-3">
                        <div class="card-header">
                            <i class="bi bi-bug-fill"></i> Faulty
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">60</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <i class="bi bi-clock-fill"></i> Auto/System On
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">100</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <i class="bi bi-hand-index-fill"></i> Manual On
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">30</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <i class="bi bi-toggle-off"></i> OFF
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">30</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-6">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <i class="bi bi-lamp-fill"></i> Installed Lights
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">2562</h5>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 60%;">60% ON</div>
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 40%;">40% OFF</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card text-dark bg-light mb-3">
                        <div class="card-header">
                            <i class="bi bi-battery-full"></i> Cumulative Load (watts)
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Active: 5872</h5>
                            <h5 class="card-title">Installed load: 187805</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">
                            <i class="bi bi-lightning-fill"></i> Total Consumption (Units)
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">224353460</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">
                            <i class="bi bi-graph-up-arrow"></i> Energy Saved (Units)
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">224353460</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-header">
                            <i class="bi bi-tree-fill"></i> Co2 Saved (Kg)
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">224350</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card bg-light mb-3">
                        <div class="card-header">
                            <i class="bi bi-chat-dots-fill"></i> Messages
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">BMC_CCMS_1(P1) BAIRAGARH - 06:49:39 29-04-2024</li>
                                <li class="list-group-item">BMC_CCMS_1(P1) BAIRAGARH - Power Resumed TIME: 06:48:39 29-04-2024</li>
                                <li class="list-group-item">CCMS_13 MCB/Contactor Turned ON in R, Y & B TIME: 00:00:53 30-04-2024</li>
                                <li class="list-group-item">BMC_CCMS_1(P1) - 05:47:59 29-04-2024</li>
                                <li class="list-group-item">BMC_CCMS_92(P92)_N2345043400_BAIRAGARH CHICHLI - 05:52:52 23-04-2024</li>
                                <li class="list-group-item">BMC_CCMS_1(P1) BAIRAGARH - Power Resumed TIME: 06:48:39 29-04-2024</li>
                                <li class="list-group-item">CCMS_13 MCB/Contactor Turned ON in R, Y & B TIME: 00:00:53 30-04-2024</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
<script src="assets/js/sidebar-menu.js"></script>
<?php
include("assets/html/body-end.php"); 
include("assets/html/html-end.php"); 
?>
