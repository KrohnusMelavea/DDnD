let is_desktop_layout = true;

function load_navigation_bar() {
 const xhr = new XMLHttpRequest();
 if (window.innerHeight < window.innerWidth) {
  xhr.open("POST", "/client_generators/desktop/navigation_bar.php");
 } else {
  xhr.open("POST", "/client_generators/mobile/navigation_bar.php");
 }
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 xhr.onload = () => {
  const response = JSON.parse(xhr.responseText);
  if (response["status"] != 0) {
   return;
  }
  const body = document.getElementsByTagName("body")[0];
  const navigation_bar = document.getElementById("navigation-bar-container");
  navigation_bar.outerHTML = response["html"];
 }
 xhr.send();
}

function reload_navigation_bar() {
 if (window.innerHeight < window.innerWidth) {
  if (!is_desktop_layout) {
   is_desktop_layout = true;
   load_navigation_bar();
  }
 } else {
  if (is_desktop_layout) {
   is_desktop_layout = false;
   load_navigation_bar();
  }
 }
}

function cart_container_onclick(event) {
 window.location.href = "/cart";
}
function search_button_onclick(event) {
 let search_input_element = document.getElementById("search-input");
 let store_selection_element = document.getElementById("store-selection");
 window.location.href = "/store?search_phrase=" + search_input_element.value + "&store=" + store_selection_element.value;
}

document.addEventListener("DOMContentLoaded", load_navigation_bar);
window.addEventListener("resize", reload_navigation_bar);