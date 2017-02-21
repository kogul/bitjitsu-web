$(document).ready(function () {
    setInterval(updatelb,20000);
});

 function updatelb() {
    $.ajax({
        url: "/index.php/user/update",
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
