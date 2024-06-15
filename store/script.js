function left_page_button_onclick(event) {
 const url_params = new URLSearchParams(window.location.search);
 const page_param = url_params.get("page");
 if (page_param == null) return;
 const page = parseInt(page_param);
 if (page == 0) return;
 url_params.set("page", (page - 1).toString());
 window.location.search = url_params;
 document.getElementById("page-label").textContent = page.toString();
}
function right_page_button_onclick(event) {
 const url_params = new URLSearchParams(window.location.search);
 const page_param = url_params.get("page");
 let page = 1;
 if (page_param == null) {
  url_params.append("page", "1");
 } else {
  page = parseInt(page_param) + 1;
  url_params.set("page",  page.toString());
 }
 window.location.search = url_params;
}

function add_cart_onclick(event) {
 add_item_to_cart(event.srcElement.id.split("-").at(-1));
}

function add_item_to_cart(listing_uuid) {
 console.log("bruh");
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "/client_scripts/add_item_to_cart.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 const body = JSON.stringify({
  product_listing_uuid: listing_uuid,
  quantity: 1
 });
 xhr.onload = () => {
  console.log(xhr.responseText);
  const response = JSON.parse(xhr.responseText);
  if (response['status'] == 2) {
   window.location.replace("/login");
  }
 }
 xhr.send(body);
}

document.addEventListener("DOMContentLoaded", function() {
 for (let add_cart_button of document.getElementsByClassName("product-listing-add-cart")) {
  add_cart_button.addEventListener("click", add_cart_onclick);
 }

 const url_params = new URLSearchParams(window.location.search);
 const page_param = url_params.get("page");
 if (page_param == null) {
  document.getElementById("page-label").textContent = "1";
 } else {
  document.getElementById("page-label").textContent = (parseInt(page_param) + 1).toString();
 }
});
