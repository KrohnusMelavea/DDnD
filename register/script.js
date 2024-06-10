function name_input_onkeypress(event) {

}
function email_input_onkeypress(event) {

}
function cellphone_input_onkeypress(event) {

}
function address_input_onkeypress(event) {

}
function username_input_onkeypress(event) {

}
function password_input_onkeypress(event) {

}
function retyped_password_input_onkeypress(event) {

}

function register_button_onclick(event) {
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "/client_scripts/add_profile.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 const body = JSON.stringify({
  sName: document.getElementById("name-input").value,
  sEmail: document.getElementById("email-input").value,
  sCellphone: document.getElementById("cellphone-input").value,
  sAddress: document.getElementById("address-input").value,
  sUsername: document.getElementById("username-input").value,
  sPassword: document.getElementById("password-input").value
 });
 xhr.onload = () => {
  const response = JSON.parse(xhr.responseText);
  if (response['status'] == 0) {
   window.location.replace("/");
  }
 }
 xhr.send(body);
}