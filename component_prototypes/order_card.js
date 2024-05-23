function rotate_order_card_statuses() {
    for (let order_card of document.getElementsByClassName('order-card')) {
        for (let order_card_status of order_card.getElementsByClassName('order-card-status')) {
            const order_card_rect = order_card.getBoundingClientRect();
            const transform = `rotate(${Math.atan(-order_card_rect.height/order_card_rect.width)}rad)`;
            order_card_status.style.transform = transform;
        }
    }
}

function window_onload() {
    for (let order_card_status of document.getElementsByClassName("order-card-status")) {
        order_card_status.style.transition = "0s";
    }
    rotate_order_card_statuses();
    document.getElementsByTagName("html")[0].style.visibility = "visible";
}
function window_onresize() {
    rotate_order_card_statuses();
}
window.addEventListener('load', window_onload);
window.addEventListener('resize', window_onresize);