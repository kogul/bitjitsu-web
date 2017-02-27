$(document).ready(function () {
    if($(window).width<991) {
        $('.hheader').height(($(window).height()) / 2);
    }
});
$(document).ready(function () {
    $('#downar').click(function () {
        $(window).scrollTop($('.awrap').offset().top);
    });
});
$(document).ready(agimg);
$(window).resize(agimg);
function agimg(){
    if($(window).width()>991) {
        $('.glns').height($('.glink img').height());
    }
}
$(document).ready(olink);
$(window).resize(olink());
function olink(){
    if($(window).width()>991) {
        var ol = document.getElementsByClassName('olink');
        var hmax = Math.max($(ol[0]).height(), $(ol[1]).height(), $(ol[2]).height());

        for (var i = 0; i < ol.length; i++) {
            $('.olink').height(hmax);
        }
    }
}