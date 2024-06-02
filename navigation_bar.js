function cart_container_onclick(event) {
 window.location.href = "/cart";
}
function search_button_onclick(event) {
 let search_input_element = document.getElementById("search-input");
 let store_selection_element = document.getElementById("store-selection");

 window.location.href = "/store?search_phrase=" + search_input_element.value + ",store=" + store_selection_element.value;
}