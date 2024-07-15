<div class="modal fade" id="notinstalledModal" tabindex="-1" aria-labelledby="notinstalledModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-danger-emphasis" id="notinstalledModalLabel">Not Installed Devices</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 p-0">
                    <div class="table-responsive-1 rounded mt-2 border">
                        <table class="table table-striped table-type-1 w-100 text-center" id="notinstalledDeviceTable">
                            <thead>
                                <tr>
                                    <th class="bg-primary-subtle" scope="col">Select</th>
                                    <th class="bg-primary-subtle" scope="col">Device ID</th>
                                    <th class="bg-primary-subtle" scope="col">Device Name</th>

                                </tr>
                            </thead>
                            <tbody id="not_installed_device_list_table">
                                <!-- <tr>
                                    <td><input type="checkbox" name="notinstalledDevice" value="Device 1"></td>
                                    <td>Device 1</td>
                                    <td> CCMS 1</td>
                                    <td>not installed</td>
                                    <td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td>
                                    <td>2024-06-09</td> 
                                </tr> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="openBatchConfirmModal('install', 'notinstalledDeviceTable')">Install Selected</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>