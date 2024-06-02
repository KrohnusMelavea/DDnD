function username_input_onkeypress(event) {

}
function password_input_onkeypress(event) {

}

function login_button_onclick(event) {
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "/client_scripts/verify_credentials.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 const body = JSON.stringify({
  sUsername: document.getElementById("username-input").value,
  sPassword: document.getElementById("password-input").value
 });
 xhr.onload = () => {
  console.log(xhr.responseText);
  const response = JSON.parse(xhr.responseText);
  if (response['status'] == 0) {
   window.location.replace("/");
  }
 }
 xhr.send(body);
}