$(document).ready(function () {
    setInterval(updatelb,200000);
});

 function updatelb() {
    $.ajax({
        url: "/bitjitsu/index.php/user/update",
        type: "post",
        dataType: "html",
        success: function (data) {
            $('.replace').replaceWith(data);
        }
    });
}
$(document).ready(canmar);
$(window).resize(canmar);
function canmar(){
    var cwid = $('.game').width();
    var wwid = $('.contarea').width();
    var mar = (wwid - cwid)/2;
    $('.game').css("margin-left",mar);
}
$(document).ready(function(){
    $('#menu').click(function(){
        if($(window).height()>$('.sidebar').height()){
            $(".sidebar").height($(window).height()-10);
        }
        $('.sidebar').css("left","0px");
    });
});
$(document).ready(function(){
    $('#close').click(function(){
        $('.sidebar').css("left","-210px");
    });
});
$(document).ready(function () {
    $(document).scroll(function(){
        var pos = $(window).scrollTop();
        $('#menu').css("top",pos);
        $(".sidebar").css("top",pos);
    });
});