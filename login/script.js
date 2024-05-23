function cart_container_onclick(event) {
    window.location.href = "/ddnd/cart/index.php";
}

function username_input_onkeypress(event) {

}
function password_input_onkeypress(event) {

}

function login_button_onclick(event) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "verify_credentials.php");
    xhr.setRequestHeader("content-type", "application/json; charset=UTF-8");
    const body = JSON.stringify({
        sUsername: document.getElementById("username-input").value,
        sPassword: document.getElementById("password-input").value
    });
    xhr.onload = () => {
        const response = JSON.parse(xhr.responseText);
        if (response['status'] == 0) {
            window.location.replace("/ddnd/index.php");
        }
    }
    xhr.send(body);
}