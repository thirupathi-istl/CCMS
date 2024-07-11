document.addEventListener('DOMContentLoaded', function() {
  const groupListElement = document.getElementById('group-list');
  const deviceIdDropdown = document.getElementById('device_id');

  if (groupListElement) {
    groupList();
  }

  if (deviceIdDropdown) {
    setDeviceId();
    deviceIdDropdown.addEventListener('change', handleDeviceIdChange);
    const deviceListid = localStorage.getItem("SELECTED_ID");
    if(deviceListid==null||deviceListid=="")
    {
      handleDeviceIdChange()
    }
  }

  if (groupListElement) {
    groupListElement.addEventListener('change', changeGroupList);
  }

  function setDeviceId() {        
    const selected_list = localStorage.getItem("Devive_ID_Selection");
    if (selected_list !== null) {
      deviceIdDropdown.selectedIndex = parseInt(selected_list, 10);
    }
  }

  function handleDeviceIdChange() {
    const indexDeviceList = deviceIdDropdown.selectedIndex;
    const deviceListValue = deviceIdDropdown.value;
    localStorage.setItem("Devive_ID_Selection", indexDeviceList);
    localStorage.setItem("SELECTED_ID", deviceListValue);
  }

  function groupList() {        
    const groupListName = localStorage.getItem("GroupName");
    if (groupListName !== null) {
      groupListElement.selectedIndex = parseInt(groupListName, 10);
    }
  }

  function changeGroupList() {
   $("#pre-loader").css('display', 'block');
   const groupListName = groupListElement.value;
   fetch('../common-files/group_change_update.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/x-www-form-urlencoded'
    },
    body: new URLSearchParams({GROUP_ID: groupListName})
  })
   .then(response => response.json())
   .then(data => {
    if (data !== "FAIL" && Array.isArray(data)) {
      if (deviceIdDropdown) {
        updateDeviceDropdown(data);
        localStorageReset();
        deviceIdDropdown.dispatchEvent(new Event('change'));
      }
      else
      {
        localStorageReset();
      }
    }
    $("#pre-loader").css('display', 'none');
  })
   .catch(error => {
     $("#pre-loader").css('display', 'none');
     alert("Error loading data!");
     console.error('Error:', error);
   });
 }

 function updateDeviceDropdown(data) {
  deviceIdDropdown.innerHTML = '';

  data.forEach(id_list => {
    const option = document.createElement('option');
    option.value = id_list.D_ID;    
    option.textContent = id_list.D_NAME;
    deviceIdDropdown.appendChild(option);
  });

  deviceIdDropdown.selectedIndex = 0;
  /*const multipleList = document.getElementById('multi_selection_device_id');
          if (multipleList) {
            const script = document.createElement('script');
            script.src = '../static/js/multi-selection.js';
            document.head.appendChild(script);
  }*/
}

function localStorageReset() {
  const indexGroupList = groupListElement.selectedIndex;
  const groupListValue = groupListElement.value;
  localStorage.setItem("GroupName", indexGroupList);
  localStorage.setItem("GroupNameValue", groupListValue);

  if (deviceIdDropdown)
  {
    deviceIdDropdown.selectedIndex = 0;
  }
}
});
