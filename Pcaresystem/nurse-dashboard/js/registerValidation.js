
function validateForm(event) {





  var partnerName = document.getElementById('partnerName').value.trim();
  var phoneNumber = document.getElementById('phoneNumber').value.trim();
  var contactNumber = document.getElementById('contactNumber').value.trim();
  var gravida = document.getElementById('gravida').value.trim();
  var termDeliveries = document.getElementById('termDeliveries').value.trim();
  var prematureDeliveries = document.getElementById('prematureDeliveries').value.trim();
  var numAbortions = document.getElementById('numAbortions').value.trim();
  var parity = document.getElementById('parity').value.trim();

    event.preventDefault();

    // Clear previous errors
    clearErrors();
    var isValid = true;
    var name = document.getElementById("name").value;
    if (!name.trim()) {
        isValid = false;
        showError("name", "Please enter your name.");
    }

    // Date of Birth validation (optional)
    var dob = document.getElementById("dob").value;

    // Age validation (optional)
    var age = document.getElementById("age").value;
    if (isNaN(age) || age <= 0) {
        isValid = false;
        showError("age", "Please enter a valid age.");
    }

    // National ID validation (optional)
    var nationalId = document.getElementById("nationalId").value;
    if (isNaN(nationalId) || nationalId <= 0) {
        isValid = false;
        showError("nationalId", "Please enter a valid national ID.");
    }

    var partnerName = document.getElementById('partnerName').value.trim();
    if (!pertnerName.trim()) {
        isValid = false;
        showError("name", "Partner Names required.");
    }

    // Telephone Number validation
    var phoneNumber = document.getElementById("phoneNumber").value;
    if (!phoneNumber.match(/^\d{10}$/)) {
        isValid = false;
        showError("phoneNumber", "Please enter a valid phone number (10 digits).");
    }

    if (isValid) {
        // Form data is valid, you can proceed to submit the form
        // Here you would typically send the form data to the server or perform any other actions

        // For demonstration purposes, let's just log the form data
        var formData = new FormData(document.getElementById("myForm"));
        for (var pair of formData.entries()) {
            console.log(pair[0] + ': ' + pair[1]);
        }

        // After validation, you can submit the form using AJAX or any other method to insert data into the database
    }
}

function showError(fieldId, errorMessage) {
    var field = document.getElementById(fieldId);
    field.style.borderColor = "red";
}

function clearErrors() {
    var errorElements = document.querySelectorAll(".error");
    errorElements.forEach(function(element) {
        element.parentNode.removeChild(element);
    });
    var formFields = document.querySelectorAll("input[type='text'], input[type='tel'], input[type='date'], input[type='number']");
    formFields.forEach(function(field) {
        field.style.borderColor = "#ccc";
    });
}
</script>
