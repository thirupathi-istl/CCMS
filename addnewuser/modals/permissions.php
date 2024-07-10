<style>
    .form-check-input:checked {
            background-color: green;
            border-color: green;
            
        }
    .form-check-input:focus {
            box-shadow: 0 0 0 .2rem rgba(0, 255, 0, 0.25);
       }
</style>
<div class="modal fade" id="permission" tabindex="-1" aria-labelledby="permission" aria-hidden="true" style="background:rgba(0,0,0,0.8)">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="permissions">Permissions</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-2 col-xl-2 col-md-2 col-sm-3 col-xs-4"></div>                    
                    <div class="col-lg-8 col-xl-8 col-md-8 col-sm-6 col-xs-4">
                        <div class="card">
                            <div class="card-header bg-primary bg-opacity-25 fw-bold">
                                Modify Permissions
                            </div>
                            <div class="card-body bg-secondary text-white bg-opacity-75">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>ON/OFF Control</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="on-off" data-permission="on-off">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>ON-OFF Oprational Modes</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="ON-OFF-Oprational-Modes" data-permission="ON-OFF-Oprational-Modes">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Settings</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="settings" data-permission="settings">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Threshold & Location Update Settings</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="Threshold-Location" data-permission="Threshold-Location">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Notification Settings</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="Notification" data-permission="Notification">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Add User</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="adduser" data-permission="adduser">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Add & Remove Device</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="add-and-remove-device" data-permission="add-and-remove-device">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Install & Uninstall Select</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="install-uninstall" data-permission="install-uninstall">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Add & Remove Light</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="install-uninstall" data-permission="install-uninstall">
                                        
                                    </div>
                                </div>
                                <hr class="my-2">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span>Downloads</span>
                                    <div class="form-check form-switch ms-auto">
                                        <input class="form-check-input" type="checkbox" id="install-uninstall" data-permission="install-uninstall">
                                        
                                    </div>
                                </div>                                   
                            </div>            
                            <div class="card-footer text-center">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-2 col-xl-2 col-md-2 col-sm-4 col-xs-4"></div>  
                </div>
            </div>
            <div class="modal-footer mb-3">
                
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>