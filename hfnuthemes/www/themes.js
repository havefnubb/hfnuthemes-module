$(document).ready(function(){
    // hide help
    $(".hfnutheme-help").hide();
    // show help
    $("#hfnutheme-help").click(function () {
        $(this).toggleClass("active").next().slideToggle("slow");
        if ($(this).hasClass("active")) {
            $(this).find("img").attr({
                src: $(this).attr('data-img-close')
            });
        }
        else {
            $(this).find("img").attr({
                src: $(this).attr('data-img-open')
            });
        }
    });
});