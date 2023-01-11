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

if (window.location.href.search('panzio') == 22 ||  window.location.href.search('panzio') == 28) {

    const hideEmail = document.querySelectorAll(".footer__contact-link--hide")

    hideEmail.forEach(element => {
        element.classList.add("d-none")
    })

}

document.querySelectorAll(".fa-close").forEach(closeIcon => {
    closeIcon.addEventListener('click', e => {
        let text = document.getElementsByClassName("footer-grid-bottom");
        let i;
        for (i = 0; i < text.length; i++) {
            text[i].classList.add("d-none");
        }
        closeIcon.classList.add("d-none");
    });
});