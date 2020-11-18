$(document).ready(function() {
    //
    $("body").fadeIn(150);

    //
    $('.sidebarCollapse').on('click', function () {
        $('#sidebar-side').toggleClass('active');
    });
});