function checkout_button_onclick() {
 
}
function cart_item_bin_button_onclick(event) {
 //omega jank
 const product_listing_uuid = event.srcElement.parentNode.parentNode.getElementsByClassName("cart-item-quantity")[0].getElementsByClassName("cart-item-quantity-input")[0].id.split("-").at(-1);
 remove_item_from_cart(product_listing_uuid);
}

function cart_item_oninput(event) {
 if (event.srcElement.value == "") return;
 const quantity = parseInt(event.srcElement.value);
 if (quantity == 0) return;
 set_cart_item_quantity(event.srcElement.id.split("-").at(-1), quantity);
}
function set_cart_item_quantity(product_listing_uuid, quantity) {
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "/client_scripts/set_cart_item_quantity.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 const body = JSON.stringify({
  product_listing_uuid: product_listing_uuid,
  quantity: (quantity == NaN) ? 1 : quantity
  });
 xhr.onload = () => {
  console.log(xhr.responseText);
  const response = JSON.parse(xhr.responseText);
  if (response['status'] == 2) {
   window.location.replace("/login");
  } else {
   let quantity_element = document.getElementById("cart-item-quantity-input-" + product_listing_uuid);
   quantity_element.value = quantity;
   let grandparent = quantity_element.parentNode.parentNode;
   const price_element = grandparent.getElementsByClassName("cart-item-price")[0].getElementsByTagName("label")[0];
   const price = parseFloat(price_element.textContent.split("$")[1]);
   let total_price_element = grandparent.getElementsByClassName("cart-item-total-price")[0].getElementsByTagName("label")[0].textContent = "Total Cost: $" + (price * quantity).toFixed(2);
  }
 };
 xhr.send(body);
}

function remove_item_from_cart(product_listing_uuid) {
 const xhr = new XMLHttpRequest();
 xhr.open("POST", "/client_scripts/remove_item_from_cart.php");
 xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
 const body = JSON.stringify({
  product_listing_uuid: product_listing_uuid
 });
 xhr.onload = () => {
  window.location.replace("/cart");
 };
 xhr.send(body);
}

document.addEventListener("DOMContentLoaded", function() {
 for (let cart_item_element of document.getElementsByClassName("cart-item-quantity-input")) {
  cart_item_element.addEventListener("input", cart_item_oninput);
 }
});