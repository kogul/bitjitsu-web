var len = 0,i=0;
var ob;
$(document).ready(function() {
    $.ajax({
        url: "/bitjitsu/user/inewsub",
        type: "post",
        dataType: "json",
        success: function (data) {
            console.log(data);
            len = data.data.game_ids.length;
                ob = setInterval(function () {
                     track(data.data.game_ids[i],ob);
                }, 1000);

        }
    })
});
function track(gid,ob){
    $.ajax({
        url: "/bitjitsu/user/track",
        type:"post",
        data: {game_id:gid},
        dataType: "json",
        success: function(data){
        console.log(data);
            if(data.data == 'completed'){
                if(i==0){
                    $('.pwrap').css("padding-top","10px");
                    $('.pwrap').html('<h1 class="animated flipInX">Replays</h1>');
                    $('.pwrap').append('<hr class="animated zoomIn">');
                }
                $('.pwrap').append('<div class="animated slideInDown"><a target="_blank" href="/bitjitsu/index.php/user/gameplay/?json='+gid+'">Replay '+(i+1)+'</a></div>');
                i++;
            }
            if(data.data == 'invalid'){
                $('.pwrap').css("padding-top","10px");
                $('.pwrap').html('<h1 class="animated flipInX">Replays</h1>');
                $('.pwrap').append('<hr class="animated zoomIn">');
                $('.pwrap').append('<p></p>');
            }
            if(i==len){
                console.log(i);
                clearInterval(ob);
            }
        }
    });
}

