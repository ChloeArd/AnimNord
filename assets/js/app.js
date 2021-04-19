// allows, thanks to the position of the scrollbar, to change the position of the menu.
let positionMenu = $('#menu').offset().top;
$(window).scroll(
    function() {
        if ($(window).scrollTop() >= positionMenu) {
            // fixed
            $('#menu').addClass("floatable");
        }
        else {
            // relative
            $('#menu').removeClass("floatable");
        }
    }
);

//When we click on "logoMenu" we unfold or replicate the drop-down sub menu.
$subMenu = $("#subMenu");

if ($("#menuMobile")) {
    $("#logoMenu").click(function () {
        $subMenu.slideToggle(600, "linear");
        $subMenu.css({
            "display": "flex",
            "flex-direction": "Column"
        });
    });
}

