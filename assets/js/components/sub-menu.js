$(document).ready(function () {
    $('.dropdown-submenu a.sub').on("click", function (e) {
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
});