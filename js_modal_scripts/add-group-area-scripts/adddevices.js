$(document).ready(function() {
    var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    var select = document.getElementById('multi_selection_device_id');
  
    function updateSelectedCount() {
      var selectedCount = $('#selectedDevicesBox .selected-device').length;
      $('#selectedCount').text(selectedCount);
    }
  
    function updateSelectedDevicesBox() {
      var selectedDevices = $('.multi_selection_device_id option:selected');
      var selectedDevicesBox = $('#selectedDevicesBox');
      selectedDevicesBox.empty();
      selectedDevices.each(function() {
        var device = $(this).text();
        var value = $(this).val();
        var deviceElement = $('<div class="selected-device">' + device + '<span class="remove" data-value="' + value + '">×</span></div>');
        selectedDevicesBox.append(deviceElement);
        $(this).hide();
      });
      updateSelectedCount();
    }
  
    function removeDeviceFromSelected(value) {
      $('.multi_selection_device_id option[value="' + value + '"]').prop('selected', false).show();
      updateSelectedDevicesBox();
    }
  
    if (!isMobile) {
      $('.multi_selection_device_id').on('mousedown', function(e) {
        e.preventDefault();
        var scroll = select.scrollTop;
        e.target.selected = !e.target.selected;
        updateSelectedDevicesBox(); // Update selected devices display
        setTimeout(function() {
          select.scrollTop = scroll;
        }, 0);
        $(select).focus();
      }).on('mousemove', function(e) {
        e.preventDefault();
      });
    } else {
      $('#multi_selection_device_id').css("height", "40px");
    }
  
    // Event listener for the remove button
    $(document).on('click', '.selected-device .remove', function() {
      var value = $(this).data('value');
      removeDeviceFromSelected(value);
    });
  
    // Select All functionality
    $('#selectAll').on('click', function() {
      $('.multi_selection_device_id option').prop('selected', true);
      updateSelectedDevicesBox();
    });
  
    // Deselect All functionality
    $('#deselectAll').on('click', function() {
      $('.multi_selection_device_id option').prop('selected', false).show();
      updateSelectedDevicesBox();
    });
  
    // Initial count update
    updateSelectedDevicesBox();
  });