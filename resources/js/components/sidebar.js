(function ($) {
    "use strict";
    /* sidebar menu */
    $("#menu").metisMenu();

    /* slimscroll activation */
    $(".menu-inner").slimScroll({
        height: "auto",
        size: "2px",
    });

    /* sidebar collapsing */
    if (window.innerWidth <= 1364) {
        $(".page-container").addClass("sbar_collapsed");
    }
    $(".nav-btn").on("click", function () {
        $(".page-container").toggleClass("sbar_collapsed");
    });
})(jQuery);
