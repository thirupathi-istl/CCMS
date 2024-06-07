<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
  <title>Dashboard</title>  
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
            <p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Dashboard</span></p>
          </div>
        </div>
        <?php
        include("dropdown-selection/device-list.php");
        ?>
        <div class="row">
          
          



        
        </div>
      </div>
    </main>
    <script src="assets/js/sidebar-menu.js"></script>
    <?php
    include("assets/html/body-end.php"); 
    include("assets/html/html-end.php"); 
    ?>

