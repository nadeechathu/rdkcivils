// cookie_policy.js

// Function to set a cookie
function setCookie(name, value, days) {
    const expirationDate = new Date();
    expirationDate.setTime(expirationDate.getTime() + (days * 24 * 60 * 60 * 1000));
    const expires = "expires=" + expirationDate.toUTCString();
    document.cookie = name + "=" + value + "; " + expires + "; path=/";
}

// Function to get the value of a cookie by name
function getCookie(name) {
    const cookieName = name + "=";
    const cookies = document.cookie.split(';');
    for (let i = 0; i < cookies.length; i++) {
        let cookie = cookies[i].trim();
        if (cookie.indexOf(cookieName) === 0) {
            return cookie.substring(cookieName.length, cookie.length);
        }
    }
    return "";
}

// Check if the user has accepted the cookies
function checkCookiePolicy() {
    const cookiePolicyAccepted = getCookie("cookiePolicyAccepted");
    if (cookiePolicyAccepted !== "true") {
        // Show the cookie policy and bind event to the accept button
        document.getElementById("cookie-policy").style.display = "block";
        document.getElementById("accept-cookies").addEventListener("click", acceptCookiePolicy);
    }
}

// Function to accept the cookie policy
function acceptCookiePolicy() {
    setCookie("cookiePolicyAccepted", "true", 365); // Set the cookie for one year
    document.getElementById("cookie-policy").style.display = "none";
}

// Call the checkCookiePolicy function on page load
document.addEventListener("DOMContentLoaded", checkCookiePolicy);
