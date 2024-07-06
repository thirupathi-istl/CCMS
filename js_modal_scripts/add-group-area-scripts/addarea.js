document.addEventListener('DOMContentLoaded', function () {
    const stateSelect = document.getElementById('state');
    const districtSelect = document.getElementById('district');
    const otherStateInput = document.getElementById('other-state');
    const otherDistrictInput = document.getElementById('other-district');

    const districts = {
        AP: ["Visakhapatnam", "Vijayawada", "Guntur", "Nellore"],
        TN: ["Chennai", "Coimbatore", "Madurai", "Tiruchirappalli"],
        KA: ["Bengaluru", "Mysore", "Mangalore", "Hubli"],
        TS: ["Adilabad", "Khammam", "Karimnagar", "Kamareddy"],
        BH: ["Bhopal", "Raisen", "Rajgarh", "Sehore", "Vidisha"],
        MH: ["Mumbai", "Pune", "Nagpur", "Thane"],
        UP: ["Lucknow", "Kanpur", "Ghaziabad", "Agra"],
        GJ: ["Ahmedabad", "Surat", "Vadodara", "Rajkot"],
        RJ: ["Jaipur", "Jodhpur", "Udaipur", "Kota"],
        WB: ["Kolkata", "Howrah", "Durgapur", "Siliguri"],
        OR: ["Bhubaneswar", "Cuttack", "Rourkela", "Puri"],
        PB: ["Ludhiana", "Amritsar", "Jalandhar", "Patiala"],
        HR: ["Gurgaon", "Faridabad", "Rohtak", "Panipat"],
        BR: ["Patna", "Gaya", "Bhagalpur", "Muzaffarpur"],
        MP: ["Indore", "Bhopal", "Gwalior", "Jabalpur"],
    };

    stateSelect.addEventListener('change', function () {
        const selectedState = stateSelect.value;
        districtSelect.innerHTML = '<option value="">Select District</option>';
        otherStateInput.classList.add('d-none');
        otherDistrictInput.classList.add('d-none');
        if (selectedState === 'Other') {
            otherStateInput.classList.remove('d-none');
            otherDistrictInput.classList.remove('d-none');
        } else if (selectedState) {
            populateDistricts(selectedState);
        }
    });

    districtSelect.addEventListener('change', function () {
        const selectedDistrict = districtSelect.value;
        if (selectedDistrict === 'Other') {
            otherDistrictInput.classList.remove('d-none');
        } else {
            otherDistrictInput.classList.add('d-none');
        }
    });

    // Function to populate districts based on selected state
    function populateDistricts(selectedState) {
        districts[selectedState].forEach(function (district) {
            const option = document.createElement('option');
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);
        });
        const otherOption = document.createElement('option');
        otherOption.value = 'Other';
        otherOption.textContent = 'Other';
        districtSelect.appendChild(otherOption);
    }
});

// JavaScript function to update the "Select Area" dropdown
function updateArea() {
    // Get the form values
    const stateValue = document.getElementById('state').value;
    const districtValue = document.getElementById('district').value;
    const townValue = document.getElementById('town').value;
    const areaValue = document.getElementById('area').value;

    // Determine if "Other" was selected for state or district
    const selectedState = stateValue === 'Other' ? document.getElementById('other-state').value : stateValue;
    const selectedDistrict = districtValue === 'Other' ? document.getElementById('other-district').value : districtValue;

    // Construct the new option text based on the entered values
    const newOptionText = `${selectedState} ${selectedDistrict} ${townValue} ${areaValue}`;

    // Create a new option element
    const newOption = document.createElement('option');
    newOption.textContent = newOptionText;
    newOption.value = newOptionText;

    // Add the new option to the select element
    const selectAreaDropdown = document.getElementById('time'); // Assuming 'time' is the ID of your Select Area dropdown
    selectAreaDropdown.appendChild(newOption);

    // Optionally, clear the form fields after updating
    document.getElementById('state').value = '';
    document.getElementById('district').value = '';
    document.getElementById('town').value = '';
    document.getElementById('area').value = '';
    document.getElementById('other-state').value = ''; // Clear Other State input if used
    document.getElementById('other-district').value = ''; // Clear Other District input if used
}
