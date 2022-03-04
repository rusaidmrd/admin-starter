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

// Select2 plugin implementation
$(".select-all").click(function () {
    let $select2 = $(this).parent().siblings(".select2");
    $select2.find("option").prop("selected", "selected");
    $select2.trigger("change");
});
$(".deselect-all").click(function () {
    let $select2 = $(this).parent().siblings(".select2");
    $select2.find("option").prop("selected", "");
    $select2.trigger("change");
});

// Initiating the Select2 jquery plugin
$(".select2").select2({
    placeholder: "Select",
    allowClear: true,
});
