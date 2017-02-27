var len = 0,i=0,j=1;
var done = new Array();
var ob;
$(document).ready(function() {
    $.ajax({
        url: "/user/inewsub",
        type: "post",
        dataType: "json",
        success: function (data) {
            console.log(data);
            len = data.data.game_ids.length;
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
            console.log(data);
            if(data.status == 'error' || data.status == 'fail'){
                $('.pwrap').html('<h1>There has been some internal error. Please report to organisers.</h1>');
                clearInterval(ob);
                clearint();
            }
            if(data.data == 'wait'){
                console.log("wait: "+i);
                seti();
                $('#replay'+i).html('waiting');
            }
            if(data.data == 'completed'){
                console.log("i: "+i);
                $('#replay'+i).html('<a target="_blank" href="/index.php/user/gameplay/?json='+gid+'">Replay '+(i+1)+'</a>');
                console.log("inside: "+done.length);
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
                $('.pwrap').append('<p>There has been some internal error. Please report to organisers.</p>');
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
    console.log("Clear: "+done.length);
    console.log("i: "+i);
   clearInterval(ob);
}