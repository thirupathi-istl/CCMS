	
<div class="d-flex flex-column flex-shrink-0 pt-0 p-3 bg-body sidebar-menu mt-xl-3" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="">
	<div class="offcanvas-header">       
		<button type="button" class="btn-close p-0" id="sidebar-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<ul class="nav nav-pills flex-column mb-auto" >
		<li>
			<a href="index.php" class="nav-link link-body-emphasis" aria-current="page">
				<i class="bi bi-grid"></i>
				Dashboard
			</a>
		</li>

		<li>
			<a href="device-list.php" class="nav-link link-body-emphasis">
				<i class="bi bi-list-ol"></i>
				Devices List
			</a>
		</li>
		<li>
			<a href="on-off-control.php" class="nav-link link-body-emphasis">
				<i class="bi bi-toggles"></i>
				On/Off Control
			</a>
		</li>
		
		<li>
			<a href="gis-map.php" class="nav-link link-body-emphasis">
				<i class="bi bi-geo-alt-fill"></i>
				GIS Map
			</a>
		</li>
		<li>
			<a href="data-report.php" class="nav-link link-body-emphasis">
				<i class="bi bi-table"></i>
				Data Report
			</a>
		</li>
		<!-- <li>
			<a href="#" class="nav-link link-body-emphasis">
				<svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#setting-gear"/></svg>
				Settings
			</a>
		</li> -->

		<li>
			<a href="#" class="nav-link btn-toggle collapsed"  data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
				<i class="bi bi-gear"></i>
				Settings
			</a> 
			<div class="collapse " id="home-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-3">
					
					<li><a href="thresholdsettings.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded active_dp"><i class="bi bi-arrow-return-right"></i>Threshold Settings</a></li>
					<li><a href="editnewgps.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Edit GPS Location</a></li>
					<li><a href="notificationsettings.php" class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Notification Settings</a></li>
					<li><a href="devicesetting.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Device Settings</a></li>
					<li><a href="add-group-area.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Add Group or Area</a></li>


				</ul>
			</div>
		</li>

		<li>
            <a href="#" class="nav-link btn-toggle collapsed" data-bs-toggle="collapse" data-bs-target="#alertsCollapse" aria-expanded="false">
                <i class="bi bi-bell-fill"></i>
                Alerts
            </a>
            <div class="collapse" id="alertsCollapse">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-3">
                    <li><a href="alerts.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded active_dp"><i class="bi bi-arrow-return-right"></i>Alerts</a></li>
                    <li><a href="power_on_off_status.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Power On/Off Status</a></li>
                    <li><a href="door_alert.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Door Alert</a></li>
                    <li><a href="notification.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Notification</a></li>
                </ul>
            </div>
        </li>

		<!-- <li>
			<a href="#" class="nav-link btn-toggle collapsed"  data-bs-toggle="collapse" data-bs-target="#alert-collapse" aria-expanded="false">
				<i class="bi bi-gear"></i>
				Settings
			</a> 
			<div class="collapse " id="alert-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-3">
					
					<li><a href="thresholdsettings.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded active_dp"><i class="bi bi-arrow-return-right"></i>Threshold Settings</a></li>
					<li><a href="editnewgps.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Edit GPS Location</a></li>
					<li><a href="notificationsettings.php" class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Notification Settings</a></li>
					<li><a href="devicesetting.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Device Settings</a></li>


				</ul>
			</div>
		</li> -->
		<li>
			<a href="user-activity.php" class="nav-link link-body-emphasis">
				<i class="bi bi-lightning-charge-fill"></i>
				User Activity
			</a>
		</li>
		<li>
			<a href="download-ccms-data.php" class="nav-link link-body-emphasis "  >
				<i class="bi bi-download"></i>
				Downloads
			</a> 
			
		</li>
		<li>
			<a href="#" class="nav-link btn-toggle collapsed "  data-bs-toggle="collapse" data-bs-target="#office-collapse" aria-expanded="false">
				<i class="bi bi-gear"></i>
				Office Use
			</a> 
			<div class="collapse " id="office-collapse">
				<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small px-3">
					
					<li><a href="device-reports.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded active_dp"><i class="bi bi-arrow-return-right"></i>Device Reports</a></li>
					<li><a href="review-settings.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Review Settings</a></li>
					<li><a href="loaded-settings.php" class=" nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Loaded Settings</a></li>
					<li><a href="sim-module-off-report.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>SIM Module Off report</a></li>
					<li><a href="simcom-status.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Simcom Status</a></li>
					<li><a href="system-status.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>System status</a></li>
					<li><a href="down-time.php" class="nav-link link-body-emphasis d-inline-flex text-decoration-none rounded"><i class="bi bi-arrow-return-right"></i>Down Time</a></li>

				</ul>
			</div>
		</li>

		<!-- <li>
			<a href="#" class="nav-link link-body-emphasis">
				<svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
				Products
			</a>
		</li>
		<li>
			<a href="#" class="nav-link link-body-emphasis">
				<svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
				Customers
			</a>
		</li>
		<li>
			<a href="#" class="nav-link link-body-emphasis">
				<svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
				Orders

			</a>
		</li>
		<li>
			<a href="#" class="nav-link link-body-emphasis">
				<svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
				Products
			</a>
		</li>
		<li>
			<a href="#" class="nav-link link-body-emphasis">
				<svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
				Customers
			</a>
		</li> -->
		

	</ul>
	<!-- <div class="dropdown" >
		<a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
			<img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
			<strong>ISTLABS</strong>
		</a>
		<ul class="dropdown-menu text-small shadow">

			<li><a class="dropdown-item bs-primary" href="#">Settings</a></li>
			<li><a class="dropdown-item" href="#">Profile</a></li>
			<li><hr class="dropdown-divider"></li>
			<li><a class="dropdown-item" href="#">Sign out</a></li>
		</ul>
	</div> -->

	
</div>