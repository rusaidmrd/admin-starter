require("./bootstrap");
require("../js/pages/login");
require("../js/components/sidebar");

/* Preloader */
var preloader = $("#preloader");
preloader.hide();
$(window).on("load", function () {
    setTimeout(function () {
        preloader.fadeOut("slow", function () {
            $(this).remove();
        });
    }, 1000);
});

$(".notify-list").slimScroll({
    height: "435px",
});

$("form.admin-user-form :input").each(function () {
    var input = $(this);
    if (input.val() != "") {
        input.closest(".form-gp").addClass("focused");
    }
});

// Initiating the sweetalert2 plugin
const Swal = require("sweetalert2");
window.Swal = Swal;
