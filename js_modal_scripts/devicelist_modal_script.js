

    function addDevice() {
        var deviceName = document.getElementById('deviceName').value;
        var deviceID = document.getElementById('deviceID').value;
        var groupArea = document.getElementById('groupArea').value;
        var capacity = document.getElementById('capacity').value;

        var table = document.querySelector('.styled-table tbody');
        var newRow = table.insertRow();

        newRow.innerHTML = ' <td>' + deviceName + '</td> <td>' + deviceID + '</td> <td>Installed</td> <td>' + getCurrentDate() + '</td> <td>' + capacity + '</td> <td class="col-1">' + getCurrentTime() + ' '+ getCurrentDate() + '</td> <td>Off</td> <td>Manual</td> <td>Active</td> <td><a href="https://www.google.com/maps?q=17.467754,%2078.603072" target="_blank">Location</a></td> <td><button class="btn btn-info btn-sm" onclick="openLightsModal(this)">0</button></td> <td><i class="bi bi-trash-fill text-danger" onclick="deleteRow(this)"></i></td> ';

    }

    function getCurrentDate() {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        return dd + '-' + mm + '-' + yyyy;
    }

    function getCurrentTime() {
        var now = new Date();
        var hh = String(now.getHours()).padStart(2, '0');
        var mm = String(now.getMinutes()).padStart(2, '0');
        var ss = String(now.getSeconds()).padStart(2, '0');
        return hh + ':' + mm + ':' + ss;
    }

    function closeModal(modalId) {
        var modal = document.getElementById(modalId);
        modal.classList.remove('show');
        modal.setAttribute('aria-hidden', 'true');
        modal.setAttribute('style', 'display: none');
        var modalBackdrop = document.getElementsByClassName('modal-backdrop')[0];
        modalBackdrop.parentNode.removeChild(modalBackdrop);
        document.body.classList.remove('modal-open');
    }

    function deleteRow(element) {
        element.closest('tr').remove();
    }

    function openLightsModal(element) {
        var row = element.closest('tr');
        var deviceName = row.cells[0].innerText;
        document.getElementById('lightsModalLabel').innerText = 'Installed Lights -' +deviceName;


        var lightsTableBody = document.getElementById('lightsTableBody');
    lightsTableBody.innerHTML = ''; 

    var lightsData = [
        { brandName: 'Philips', wattage: 10, lights: 5, totalWatts: 50 },
        { brandName: 'Havells', wattage: 15, lights: 3, totalWatts: 45 }
        ];

    lightsData.forEach(light => {
        var row = lightsTableBody.insertRow();
        row.innerHTML = '<td>' + light.brandName + '</td><td>' + light.wattage + '</td><td>' + light.lights + '</td><td>' + (light.lights * light.wattage) + '</td><td><i class="bi bi-trash-fill text-danger" onclick="deleteLightRow(this)"></i></td>';

    });

    var lightsModal = new bootstrap.Modal(document.getElementById('lightsModal'));
    lightsModal.show();
}


function showAddLightsForm() {
    var addLightModal = new bootstrap.Modal(document.getElementById('addLightModal'));
    addLightModal.show();
}

function addLight() {
    var brandName = document.getElementById('brandName').value;
    var wattage = document.getElementById('wattage').value;
    var lights = document.getElementById('lights').value;
    var totalWatts = lights * wattage;

    var lightsTableBody = document.getElementById('lightsTableBody');
    var newRow = lightsTableBody.insertRow();
    newRow.innerHTML = '<td>' + brandName + '</td><td>' + wattage + '</td><td>' + lights + '</td><td>' + totalWatts + '</td><td><i class="bi bi-trash-fill text-danger" onclick="deleteLightRow(this)"></i></td>';


    var addLightModal = bootstrap.Modal.getInstance(document.getElementById('addLightModal'));
    addLightModal.hide();

    document.getElementById('addLightsForm').reset();
}

function deleteLightRow(element) {
    element.closest('tr').remove();
}
