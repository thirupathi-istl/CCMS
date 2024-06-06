<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
	<title>Device List</title>  	
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
						<p class="m-0 p-0"><span class="text-body-tertiary">Pages / </span><span>Device List</span></p>
					</div>
				</div>
				<?php
				include("dropdown-selection/device-list.php");
				?>

				<div class="row">
					<div class="col-12 p-0">
						<button class="btn"></button>
					</div>
					<div class="col-12 p-0">
						<div class="table-responsive rounded mt-2 border ">
							<table class="table table-striped table-type-1 w-100 ">
								<thead>
									<tr >
										
										<th class="bg-logo-color text-white" >Device-Name</th>
										<th class="bg-logo-color text-white" >Device-ID</th>										
										<th class="bg-logo-color text-white" >Installation Status</th>
										<th class="bg-logo-color text-white" >Installed Date</th>
										<th class="bg-logo-color text-white" >Capacity(kW)</th>
										<th class="bg-logo-color text-white col-size-1" >Last Update</th>
										<th class="bg-logo-color text-white" >On/Off Status</th>
										<th class="bg-logo-color text-white" >Operation Mode</th>
										<th class="bg-logo-color text-white" >Active Status</th>
										<th class="bg-logo-color text-white" >Location</th>
										<th class="bg-logo-color text-white" >Actions</th>
									</tr>
								</thead>
								<tbody>

									<!-- Example rows -->
									<tr >
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr >
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr class="active-row"><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr><tr>
										<td>Device 1</td>
										<td>ID001</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>25</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>On</td>
										<td>Automatic</td>
										<td>Active</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<tr>
										<td>Device 2</td>
										<td>ID002</td>
										<td>Installed</td>
										<td>29-05-2024</td>
										<td>15</td>
										<td class="col-size-1">15:25:23 29-05-2024</td>
										<td>Off</td>
										<td>Manual</td>
										<td>Inactive</td>
										<td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
										<td>Edit/Delete</td>
									</tr>
									<!-- Add more rows as needed -->
								</tbody>
							</table>
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
