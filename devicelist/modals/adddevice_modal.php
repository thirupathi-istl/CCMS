<!-- Add Device Modal -->
<div class="modal fade" id="addDeviceModal" tabindex="-1" aria-labelledby="addDeviceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header justify-content-center" >
                    <h5 class="modal-title" id="addDeviceModalLabel">Add New Device</h5>
                </div>
                <div class="modal-body">
                    <form id="addDeviceForm">
                        <div class="mb-3">
                            <label for="deviceName" class="form-label">Device Name</label>
                            <input type="text" class="form-control" id="deviceName">
                        </div>
                        <div class="mb-3">
                            <label for="deviceID" class="form-label">Device ID</label>
                            <input type="text" class="form-control" id="deviceID" required>
                        </div>
                        <div class="mb-3">
                            <label for="groupArea" class="form-label">Group/Area</label>
                            <input type="text" class="form-control" id="groupArea">
                        </div>
                        <div class="mb-3">
                            <label for="capacity" class="form-label">Capacity (kW)</label>
                            <input type="number" class="form-control" id="capacity" required>
                        </div>
                        <div class="mb-3">
                            <label for="activationCode" class="form-label">Activation Code</label>
                            <input type="text" class="form-control" id="activationCode">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="addDevice()">Add New Device</button>
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addDeviceModal')">Close</button>

                </div>
            </div>
        </div>
    </div>