; (function ($) {
    $(document).ready(function () {
        $("#notice-ninja .notice-dismiss").on("click", function () {
            console.log("clicked");
            setCookie("nn-close", "1", 60);
        });
    });
})(jQuery);

function setCookie(cookieName, cookieValue, expiryInSecond) {
    var expiry = new Date();
    expiry.setTime(expiry.getTime() + 1000 * expiryInSecond);
    document.cookie = cookieName + "=" + cookieValue + ";expires=" + expiry.toGMTString() + "; path=/";

}