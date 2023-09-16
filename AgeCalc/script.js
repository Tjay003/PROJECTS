
function calculateAge() {
  var birthDate = document.getElementById("birthDate").value;
  var birthDateObj = new Date(birthDate);
  var today = new Date();
  var age = today.getFullYear() - birthDateObj.getFullYear();
  var monthDiff = today.getMonth() - birthDateObj.getMonth();
  var dayDiff = today.getDate() - birthDateObj.getDate();

  if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
    age--;
  }

  document.getElementById("result").innerHTML =
    "Your current age is: " + age;
}
