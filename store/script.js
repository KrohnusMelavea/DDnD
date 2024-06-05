function add_cart_onclick(event) {
 add_item_to_cart(event.srcElement.id.split("-").at(-1));
}

function add_item_to_cart(listing_uuid) {
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
   window.location.replace("login");
  }
 }
 xhr.send(body);
}

document.addEventListener("DOMContentLoaded", function() {
 for (let add_cart_button of document.getElementsByClassName("product-listing-add-cart")) {
  add_cart_button.addEventListener("click", add_cart_onclick);
 }
});
