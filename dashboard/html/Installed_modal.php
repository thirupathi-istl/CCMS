<div class="modal fade" id="installedModal" tabindex="-1" aria-labelledby="installedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="installedModalLabel">Installed Devices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="col-12 p-0">
                    <div class="table-responsive-1 rounded mt-2 border ">
                        <table class="table table-striped table-type-1 w-100 text-center"id="installedDeviceTable">
                            <thead>
                                <tr>
                                    <th class="bg-primary-subtle" scope="col">Select</th>
                                    <th class="bg-primary-subtle" scope="col">Device ID</th>
                                    <th class="bg-primary-subtle" scope="col">Device Name</th>

                                    <th class="bg-primary-subtle" scope="col">Installation Status</th>
                                    <th class="bg-primary-subtle" scope="col">Installed Date</th>
                                    <th class="bg-primary-subtle" scope="col">Location</th>
                                </tr>
                            </thead>
                            <tbody id="installed_device_list_table">
                                <!-- <tr>
                                    <td><input type="checkbox" name="installedDevice" value="Device 1"></td>
                                    <td>Device 1</td>
                                    <td> CCMS 1</td>
                                    <td>installed</td>
                                    <td>2024-06-09</td> 
                                    <td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>                                    
                                </tr> -->
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="openBatchConfirmModal('uninstall', 'installedDeviceTable')">Uninstall Selected</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
