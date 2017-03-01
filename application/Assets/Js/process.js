var len = 0,i=0,j=1;
var done = new Array();
var ob, back;
$(document).ready(function() {
    console.log("will do sub");
    $.ajax({
        url: "/user/inewsub",
        type: "post",
        dataType: "json",
        success: function (data) {
            back = data;
            for (var ind = 0; ind < data.data.game_ids.length; ind++) {
                 if(ind == 0) {
                    $('.pwrap').css("padding-top", "10px");
                    $('.pwrap').html('<h1 class="animated flipInX">Replays</h1>');
                    $('.pwrap').append('<hr class="animated zoomIn">');
                }
                 $('.pwrap').append('<p class="animated slideInDown" id="replay'+ind+'">Loading</p>');
                 done[ind] = ind;
                 }
                ob = setInterval(function () {
                    track(data.data.game_ids[i], ob);
                }, 1000);

        },
        error: function(d){
            console.log(d);
            alert('fail');
        }
    })
});
function track(gid,ob){
    $.ajax({
        url: "/user/track",
        type:"post",
        data: {game_id:gid},
        dataType: "json",
        success: function(data){
            if(data.status == 'error' || data.status == 'fail'){
                $('.pwrap').html('<h1 style="font-size: 30px">There has been some internal error. Please report to ananya95@gmail.com</h1>');
                $('.pwrap').append('<p>Your game ids are:</p>');
                for(var count=0; count<back.data.game_ids.length; count++){
                    $('.pwrap').append('<p>'+back.data.game_ids[count]+'</p>');
                }
                clearInterval(ob);
                clearint();
            }
            if(data.data == 'wait'){
                seti();
                $('#replay'+i).html('waiting');
            }
            if(data.data == 'completed'){
                $('#replay'+i).html('<a target="_blank" href="/user/gameplay/?json='+gid+'">Replay '+(i+1)+'</a>');
                getsummary(gid,i);
                if(done.length == 1){
                    clearint();
                }
                var index = done.indexOf(i);
                done.splice(index,1);
                seti();
            }
            if(data.data == 'invalid'){
                $('.pwrap').css("padding-top","10px");
                $('.pwrap').html('<h1 class="animated flipInX">Replays</h1>');
                $('.pwrap').append('<hr class="animated zoomIn">');
                $('.pwrap').append('<p>There has been some internal error. Please report to ananya95@gmail.com</p>');
                $('.pwrap').append('<p>Your game ids are:</p>');
                for(var count=0; count<back.data.game_ids.length; count++){
                    $('.pwrap').append('<p>'+back.data.game_ids[count]+'</p>');
                }
            }
        }
    });
}
function seti() {
    if(done.length == 0){
        clearint();
    }
    if(j>=done.length){
        j = 0;
    }
    i = done[j];
    j++;
}
function clearint() {
   clearInterval(ob);
}
function getsummary(gid,num){
    $.ajax({
        url:"/user/getsummary",
        type:"post",
        data: {game_id: gid},
        dataType: "json",
        success:function (data) {
           $('#replay'+num).append('<p class="animated fadeInDown" style="font-size: 25px">'+data.summary+'</p>');

        }
    });
}