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

$buttonFilter = $("#filterCategories");

if ($buttonFilter) {
    $buttonFilter.click(function () {
        $(".categories").slideToggle(600, "linear");
        $(".categories").css("display", "block");
    });
}

let x = window.matchMedia("(min-width: 900px)")

// animation every 2 second for a screen min-width : 900px
setInterval(function () {
    if (x.matches) {
        $(".question").animate({
            width: "60%",
            height: "250px",
            padding: "50px",
            fontSize: "35px",
        }, 2000);

        $(".buttonWhite2").animate({
            padding: "40px",
            fontSize: "25px",
        }, 2000);

        $(".separatorHorizontal").animate({
            width: "100%"
        }, 2000);

        $(".numberLost").animate({
            opacity: "0.5"
        }, 2000);
    }
}, 2000);

// animation every 3 second or a screen min-width : 900px
setInterval(function () {
    if (x.matches) {
        $(".question").animate({
            width: "50%",
            height: "150px",
            padding: "10px",
            fontSize: "30px"
        }, 3000);

        $(".buttonWhite2").animate({
            padding: "20px",
            fontSize: "20px",
        }, 3000);

        $(".separatorHorizontal").animate({
            width: "40%"
        }, 3000);

        $(".numberLost").animate({
            opacity: "1"
        }, 2000);
    }
}, 3000);

