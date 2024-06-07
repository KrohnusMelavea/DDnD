function deactivation_button_onclick() {
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "/client_scripts/deactivate_account.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 xhr.onload = function() {
  const response = JSON.parse(xhr.responseText);
  if (response["status"] == 0) {
   window.location.href = "/";
  }
 }
 xhr.send("");
}

document.addEventListener("DOMContentLoaded", function() {
 document.getElementById("deactivation-button").addEventListener("click", deactivation_button_onclick);
})
