<?php
require_once '../../base-path/config-path.php';
require_once BASE_PATH_1.'config_db/config.php';
require_once BASE_PATH_1.'session/session-manager.php';
SessionManager::checkSession();
$sessionVars = SessionManager::SessionVariables();
$mobile_no = $sessionVars['mobile_no'];
$user_id = $sessionVars['user_id'];
$role = $sessionVars['role'];
$user_login_id = $sessionVars['user_login_id'];
//=================================================
$return_response = "";
$total_switch_point=0;
$user_devices="";
//=================================================

/*$group_id = "ALL";*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$group_id = $_POST['GROUP_ID'];

	include_once(BASE_PATH_1."common-files/selecting_group_device.php");

	if($user_devices!="")
	{
		$user_devices= substr($user_devices, 0, -1);
	}

	$conn_db_all = mysqli_connect(HOST,USERNAME,PASSWORD, DB_ALL);
	if (!$conn_db_all) {
		die("Connection failed: " . mysqli_connect_error());
	}
	else
	{
		$date="";
		$signal="";
		$address="";
		$land_mark="";
		$rated_kva="";
		$installation_date="";
		$device_status="";
		$on_off_status="";
		$unit_capacity="";
		$operation_mode="";
		$installation_status="";
		$installed_lights=0;

		$sql = "SELECT  active_device, device_id, date_time , unit_capacity, installed_date, installed_status, location, active_device, poor_network, faulty, power_failure, on_off_status, operation_mode, total_lights FROM live_data_updates where device_id IN ($user_devices)";
		$status=0;
		if(mysqli_query($conn_db_all, $sql))
		{
			$result = mysqli_query($conn_db_all, $sql);
			if(mysqli_num_rows($result)>0)
			{
				while($r = mysqli_fetch_assoc( $result ))
				{
					$installation_date=$r['installed_date'];
					$date=date("H:i:s d-m-Y", strtotime($r['date_time']));				
					$device_id=$r['device_id'];					
					$status=$r['active_device'];
					$unit_capacity=$r['unit_capacity'];
					$operation_mode=$r['operation_mode'];
					$installed_lights=$r['total_lights'];


					if($r['location']!='0,0'&& strpos($r['location'], "0000000,000000") === false)
					{
						$address='<a  href="#" class="pt-0 pb-0" onclick=show_location("'.$r['location'].'")>Map</a>';
					}
					else
					{
						$address='<button class="address_update btn btn-primary pt-0 pb-0" onclick=address_update("'.$device_id.'")>Update</button>';
					}

					if($r['installed_status']==1)
					{
						if($r['active_device']==1)
						{						
							$device_status="<span class='text-white fw-semibold bg-success py-1 px-2 rounded'> Active</span>";
						}
						else if($r['poor_network']==1)
						{
							$device_status="<span class='fw-semibold bg-warning py-1 px-2 rounded'> Poor Newtwork</span>";
						}
						else if($r['power_failure']==1)
						{
							$device_status="Power Fail";
						}
						else if($r['faulty']==1)
						{
							$device_status="Faulty";
						}

						$installation_status="<span class='text-success fw-semibold'> Installed</span>";
					}
					else
					{
						$device_status="<span class='text-danger fw-semibold'> Not Installed</span>";
						$installation_status= "<span class='text-danger fw-semibold'> Not Installed</span>";

					}



					$on_off_status = $r['on_off_status'];


					if ($on_off_status == "1")
					{
						$on_off_status="<span class='text-white fw-semibold bg-info-emphasis py-1 px-2 rounded'>Auto ON</span>";
					}
					else if ($on_off_status == "2")
					{
						$on_off_status="Power Fail";
					}
					else if ($on_off_status == "3")
					{
						$on_off_status="<span class='text-white fw-semibold bg-success py-1 px-2 rounded'> Server ON</span>";
					}
					else if ($on_off_status == "4")
					{
						$on_off_status="<span class='text-white fw-semibold bg-success py-1 px-2 rounded'> Wifi ON</span>";
					}
					else if ($on_off_status == "5")
					{
						$on_off_status="<span class='text-white fw-semibold bg-info-emphasis py-1 px-2 rounded'> Manual ON</span>";
					}
					else if ($on_off_status == "6")
					{						
						$on_off_status="<span class='text-white fw-semibold bg-danger py-1 px-2 rounded'> SERVER OFF</span>";
					}

					else if ($on_off_status == "7")
					{
						$on_off_status="<span class='text-white fw-semibold bg-danger py-1 px-2 rounded'> WIFI OFF</span>";
					}
					else if ($on_off_status == "0")
					{
						$on_off_status="<span class='text-white fw-semibold bg-danger py-1 px-2 rounded'> OFF</span>";
					}
					else
					{
						$on_off_status="<span class='text-white fw-semibold bg-danger py-1 px-2 rounded'> OFF</span>";
					}
					$name=$device_id;

					foreach ($device_list as $device) {

						$c_id =  $device['D_ID'];
						if(trim($device_id)===$c_id)
						{						
							$name= $device['D_NAME'];						
						}
					}
					$installed_lights ='<button class="btn btn-info btn-sm p-0 px-2" onclick=openLightsModal("'.$device_id.'","'.$name.'")>'.$installed_lights.'</button>';
					
					/*if($installation_date==""||$installation_date==null)
					{
						$installation_date='<button class="address_update btn btn-primary pt-0 pb-0" onclick=update_installation_date("'.$device_id.'","'.$name.'")>Update</button>';

					}
					else
					{
						$installation_date=$installation_date.'<a class="edit pl-3 pb-0" title="Edit" data-toggle="tooltip" onclick=update_installation_date("'.$device_id.'","'.$name.'")><i class="fa fa-pencil text-primary mr-2" style="font-size:20px ;cursor: pointer;" aria-hidden="true"></i></a>';

					}*/

					
					


					/*
					if($unit_capacity==""||$unit_capacity==null||$unit_capacity<=0)
					{
						$unit_capacity='<a href="capacity_update.php">Update</a>';
					}*/


					$send[]=array("D_ID"=> $device_id, "D_NAME"=> $name , "INSTALLED_STATUS"=>$installation_status, "INSTALLED_DATE"=>$installation_date, "KW"=>$unit_capacity, "ACTIVE_STATUS"=>$status, "DATE_TIME"=>$date, "WORKING_STATUS"=>$device_status, "ON_OFF_STATUS"=>$on_off_status, "OPERATION_MODE"=>$operation_mode, "LMARK"=>$address,"INSTALLED_LIGHTS"=>$installed_lights, "REMOVE"=>$device_id);

				}
			}
		}
		
		mysqli_close($conn_db_all);
	}
	
}
else
{
	$return_response="Data not Available";
}

echo json_encode($send);
?>
