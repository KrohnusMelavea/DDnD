

function account_information_button_onclick() {
 window.location.href = "/account/information";
}
function account_orders_button_onclick() {
 window.location.href = "/account/orders";
}

function cart_container_onclick(event) {
 window.location.href = "/cart";
}

function logout_button_onclick(event) {
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "logout.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 xhr.onload = () => {
  const response = JSON.parse(xhr.responseText);
  window.location.replace("/");
 }
 xhr.send("");
}