<script>
    function openBatchConfirmModal(action, tableId) {
        const selectedDevices = document.querySelectorAll(`#${tableId} input[name$="Device"]:checked`);
        const actionText = action === 'install' ? 'install' : 'uninstall';
        document.getElementById('confirmActionText').innerText = `Are you sure you want to ${actionText} the following devices?`;

        const deviceList = document.getElementById('selectedDevicesList');
        deviceList.innerHTML = '';
        selectedDevices.forEach(device => {
            const li = document.createElement('li');
            li.textContent = device.parentElement.nextElementSibling.textContent; // Get the device ID from the next table cell
            deviceList.appendChild(li);
        });

        document.getElementById('confirmActionButton').onclick = function() {
            confirmAction(action, selectedDevices, tableId);
        };

        const confirmModal = new bootstrap.Modal(document.getElementById('confirmActionModal'));
        confirmModal.show();
    }

    function confirmAction(action, selectedDevices, tableId) {
        const actionDate = document.getElementById('actionDate').value; // Get selected date from modal

        selectedDevices.forEach(device => {
            const row = device.closest('tr');
            const statusCell = row.querySelector('td:nth-child(4)');
            let dateCell = row.querySelector('td:nth-child(5)'); // Assuming date cell is the fourth column in Total Modal
            if (tableId === 'installedDeviceTable'|| tableId === 'notinstalledDeviceTable') {
                dateCell = row.querySelector('td:nth-child(6)'); // Assuming date cell is the fifth column in Installed Modal
            }
            if (action === 'install') {
                statusCell.textContent = 'installed';
            } else {
                statusCell.textContent = 'not installed';
            }
            dateCell.textContent = actionDate; // Update date in the main modal
            console.log(`${action === 'install' ? 'Installing' : 'Uninstalling'}: ${device.value}`);
            // Perform installation/uninstallation action, e.g., send API request

            // Clear the checkbox after action
            device.checked = false;
        });

        const confirmModal = bootstrap.Modal.getInstance(document.getElementById('confirmActionModal'));
        confirmModal.hide();
    }
</script>