<div class="modal fade" id="permission" tabindex="-1" aria-labelledby="permission" aria-hidden="true" >
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="permissions">#<span id="userid_per"></span>-Permissions</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bg-primary bg-opacity-25 fw-bold">
                                Permissions
                            </div>
                            <div class="card-body bg-light">
                                <form id="permissions-form">
                                    <?php
                                    try {
                                        $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB_USER);

                                        if (!$conn) {
                                            $error = "Connection failed: " . mysqli_connect_error();
                                        } else {
                                            $sql = "SELECT * FROM `user_permissions` WHERE login_id='$user_login_id'";
                                            $result = mysqli_query($conn, $sql);
                                            $permissions="";
                                            if ($result) 
                                            {
                                                if (mysqli_num_rows($result) > 0) 
                                                {
                                                    $count=0;
                                                    $r = mysqli_fetch_assoc($result);
                                                    if($r['on_off_control']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="on_off_control">ON/OFF Control</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="on_off_control" data-permission="on_off_control"  value="on_off_control">
                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="on_off_control, ";

                                                    }
                                                    if($r['on_off_mode']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="on_off_mode">ON-OFF Oprational Modes</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="on_off_mode" data-permission="on_off_mode" value="on_off_mode">
                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="on_off_mode, ";
                                                    } 
                                                    if($r['device_info_update']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="device_info_update">Device Info Update</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="device_info_update" data-permission="device_info_update" value="device_info_update">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="device_info_update, ";
                                                    } 
                                                    if($r['threshold_settings']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="threshold_settings">Threshold Settings</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="threshold_settings" data-permission="threshold_settings" value="threshold_settings">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="threshold_settings, ";
                                                    } 
                                                    if($r['iot_settings']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="iot_settings">IoT-Settings</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="iot_settings" data-permission="iot_settings" value="iot_settings">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="iot_settings, "; 
                                                    } 
                                                    if($r['lights_info_update']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="lights_info_update">Lights Info Update</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="lights_info_update" data-permission="lights_info_update" value="lights_info_update">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="lights_info_update, ";
                                                    } 

                                                    if($r['device_add_remove']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="device_add_remove">Devices Add/Remove Updates</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="device_add_remove" data-permission="device_add_remove" value="device_add_remove">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="device_add_remove, ";
                                                    } 


                                                    if($r['user_details_updates']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="user_details_updates">Manage Users</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="user_details_updates" data-permission="user_details_updates" value="user_details_updates">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="user_details_updates, ";
                                                    } 

                                                    if($r['create_group']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="create_group">Create Group/Area </label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="create_group" data-permission="create_group" value="create_group">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="create_group, ";
                                                    } 

                                                    if($r['notification_update']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="notification_update">Notification Settings</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="notification_update" data-permission="notification_update" value="notification_update">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="notification_update, ";
                                                    } 
                                                    if($r['installation_status_update']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="installation_status_update">Install & Uninstall Status Update</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="installation_status_update" data-permission="installation_status_update" value="installation_status_update">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="installation_status_update, ";
                                                    } 
                                                    if($r['download_data']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="download_data">Downloads</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="download_data" data-permission="download_data" value="download_data">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="download_data, ";
                                                    }
                                                    if($r['user_permissions']==1)
                                                    {
                                                        echo '<div class="d-flex justify-content-between align-items-center">
                                                        <label class="form-check-label" for="user_permissions">User Permission</label>
                                                        <div class="form-check form-switch ms-auto">
                                                        <input class="form-check-input pointer" type="checkbox" name="permissions" id="user_permissions" data-permission="user_permissions" value="user_permissions">

                                                        </div>
                                                        </div>
                                                        <hr class="my-2">';
                                                        $count++;
                                                        $permissions.="user_permissions, ";
                                                    }

                                                    if($count==0)
                                                    {
                                                        echo '<p class="text-danger">Permissions List Not Available </p>';
                                                    } 
                                                    else
                                                    {
                                                        $permissions= substr($permissions, 0, -2);
                                                        $_SESSION['permission_variables']=$permissions;
                                                    }

                                                }
                                                else
                                                {

                                                    echo '<p class="text-danger">Permissions List Not Available </p>';
                                                }
                                                mysqli_free_result($result);
                                            } else {
                                                echo '<p class="text-danger">Permissions List Not Available </p>';
                                            }

                                            mysqli_close($conn);
                                        }


                                    } catch (Exception $e) {

                                    }
                                    ?>
                                </form>                                   
                            </div>            

                        </div> 
                    </div>
                    <div class="col-lg-2 col-xl-2 col-md-2 col-sm-4 col-xs-4"></div>  
                </div>
            </div>
            <div class="modal-footer mb-3">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary"  onclick="updateSelectedPermissions()">Save</button>
            </div>

        </div>
    </div>
</div>

