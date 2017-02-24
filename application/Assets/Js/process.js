$(document).ready(function(){
   $.ajax({
       url: "/user/inewsub",
       type:"post",
       dataType:"json",
       success:function (data) {
           console.log(data);
           $('.pwrap').css("padding-top","10px");
           $('.pwrap').html('<h1 class="animated flipInX">Replays</h1>');
           $('.pwrap').append('<hr class="animated zoomIn">');
           for(var i=0; i<data.data.game_ids.length;i++){
           $('.pwrap').append('<div class="animated slideInDown"><a>Replay '+(i+1)+'</a></div>');
       }
   })
});
