$(document).ready(run);

function run() {
    var SCROLL_TIME = 1000;

    $(".scroll").click(menuClick);

    function menuClick(event) {
        event.preventDefault();
        var id = $(this).attr("href");
        $("html, body").animate({
            "scrollTop": $(id).offset().top 
        }, SCROLL_TIME);
    }
}