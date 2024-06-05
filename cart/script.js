function cart_item_oninput(event) {
 const quantity = parseInt(event.srcElement.value);
 console.log(quantity);
 set_cart_item_quantity(event.srcElement.id.split("-").at(-1), quantity);
}
function set_cart_item_quantity(product_listing_uuid, quantity) {
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "/client_scripts/set_cart_item_quantity.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 const body = JSON.stringify({
  product_listing_uuid: product_listing_uuid,
  quantity: quantity
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
 for (let cart_item_element of document.getElementsByClassName("cart-item-quantity-input")) {
  cart_item_element.addEventListener("input", cart_item_oninput);
 }
});