
function validateForm(event) {
    event.preventDefault();

    // Clear previous errors
    clearErrors();

    // Validation logic
    var isValid = true;

    // Name validation
    var name = document.getElementById("name").value;
    if (!name.trim()) {
        isValid = false;
        document.getElementById("nameError").textContent = "Please enter your name.";
    }

    // Date of Birth validation
    var dob = document.getElementById("dob").value;
    if (!dob) {
        isValid = false;
        document.getElementById("dobError").textContent = "Please select your date of birth.";
    } else {
        var today = new Date();
        var dobDate = new Date(dob);
        var age = today.getFullYear() - dobDate.getFullYear();
        var monthDiff = today.getMonth() - dobDate.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dobDate.getDate())) {
            age--;
        }
        if (age < 18) {
            isValid = false;
            document.getElementById("dobError").textContent = "You must be at least 18 years old.";
        }
    }

    // Age validation
    var age = document.getElementById("age").value;
    if (isNaN(age) || age <= 0) {
        isValid = false;
        document.getElementById("ageError").textContent = "Please enter a valid age.";
    }

    // National ID validation
    var nationalId = document.getElementById("nationalId").value;
    if (!nationalId.trim()) {
        isValid = false;
        document.getElementById("nationalIdError").textContent = "Please enter your national ID.";
    }

    // Marital Status validation
    var maritalStatus = document.getElementById("maritalStatus").value;
    if (document.getElementById("partnerName").value.trim() && maritalStatus === "") {
        isValid = false;
        document.getElementById("maritalStatusError").textContent = "Please select your marital status.";
    }

    // Partner's Name validation
    var partnerName = document.getElementById("partnerName").value;
    if (partnerName.trim() && maritalStatus === "") {
        isValid = false;
        document.getElementById("partnerNameError").textContent = "Please select your marital status first.";
    }

    // Partner's Date of Birth validation
    var partnerDob = document.getElementById("partnerDob").value;
    if (partnerName.trim() && !partnerDob) {
        isValid = false;
        document.getElementById("partnerDobError").textContent = "Please enter your partner's date of birth.";
    }

    // Blood Group validation
    var bloodGroup = document.getElementById("bloodGroup").value;
    if (!bloodGroup.trim()) {
        isValid = false;
        document.getElementById("bloodGroupError").textContent = "Please enter your blood group and rhesus.";
    }

    if (isValid) {
        // Form data is valid, proceed with AJAX submission
        var formData = new FormData(document.getElementById("myForm"));

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Define what happens on successful data submission
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                // Request was successful, you can do something here if needed
                alert("Form data submitted successfully.");
                // Optionally, you can reset the form after successful submission
                document.getElementById("myForm").reset();
            } else {
                // Request failed
                alert("Error submitting form data. Status:", xhr.status);
            }
        };

        // Define what happens in case of an error
        xhr.onerror = function() {
            alert.error("Error submitting form data.");
        };

        // Open a POST request to the server
        xhr.open("POST", "scripts.php"); // Replace "submit_form.php" with the URL of your server-side script

        // Send the form data
        xhr.send(formData);
    }
}

function clearErrors() {
    var errorElements = document.querySelectorAll(".error");
    errorElements.forEach(function(element) {
        element.textContent = "";
    });
}
