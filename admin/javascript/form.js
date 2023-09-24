function calculateAge(dateOfBirth) {
  const dob = new Date(dateOfBirth);
  const today = new Date();
  const age = today.getFullYear() - dob.getFullYear();
  document.getElementsByName("age")[0].value = age;
}

function calculateDobFromAge(age) {
  const today = new Date();
  const yearOfBirth = today.getFullYear() - age;
  const dob = new Date(yearOfBirth, today.getMonth(), today.getDate());

  // Format the date of birth as 'YYYY-MM-DD' and set it in the "dobInput" field
  const dobFormatted = dob.toISOString().split("T")[0];
  document.getElementById("dobInput").value = dobFormatted;
}

function calculateExpiryDate(membershipType) {
  const startDate = new Date();
  let endDate = new Date();

  if (membershipType === "Silver") {
    endDate.setMonth(startDate.getMonth() + 6);
  } else if (membershipType === "Golden") {
    endDate.setFullYear(startDate.getFullYear() + 1);
  } else if (membershipType === "Platinum") {
    endDate.setFullYear(startDate.getFullYear() + 100);
  }

  const formattedStartDate = startDate.toISOString().split("T")[0];
  const formattedEndDate =
    endDate === "Lifetime" ? "Lifetime" : endDate.toISOString().split("T")[0];
  document.getElementsByName("start-date")[0].value = formattedStartDate;
  document.getElementsByName("end-date")[0].value = formattedEndDate;
}

// Toggle password visibility
document
  .querySelector(".toggle-password")
  .addEventListener("click", function () {
    const passwordField = document.querySelector(this.getAttribute("toggle"));
    if (passwordField.type === "password") {
      passwordField.type = "text";
      this.classList.remove("fa-eye");
      this.classList.add("fa-eye-slash");
    } else {
      passwordField.type = "password";
      this.classList.remove("fa-eye-slash");
      this.classList.add("fa-eye");
    }
  });
