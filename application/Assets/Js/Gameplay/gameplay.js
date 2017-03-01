var can = document.getElementById("normal");
var ctx = can.getContext("2d");
var play =1, draw=0,fr=0;
$(document).ready(skiprate);
$(document).ready(function(){
    $(document).on('change','#skiprate',skiprate);
});
function skiprate(){
    fr = $('#skiprate').val();
    fr = Number(fr);
}
//draw();
//update();
var stat = 0;
$(document).ready(function () {
    core_redraw();
});
function core_redraw(){
iter_no();
clearf();
createfood();
createvirus();
createbots();
updatestat();
requestAnimationFrame(core_redraw);
}


function drew(){
clearf();
createfood();
createvirus();
createbots();
iter_no();
draw =0;
}
function iter_no(){
    $('#iter_num').html('#'+stat);
}
function clearf(){
    if(play||draw){
    ctx.clearRect(0,0,can.width,can.height);
}

}
function createvirus() {
    if(play||draw){
	for (var i =0; i<ob[stat].virus.length; i++){
            ctx.beginPath();
            ctx.arc((ob[stat].virus[i][0]*can.width/ob[stat].maxX),(ob[stat].virus[i][1]*can.height/ob[stat].maxY),35*0.21,0,2*Math.PI);
           // if(yes == true) {
           	    ctx.strokeStyle="blue";
                ctx.fillStyle = "blue";
                ctx.fill();
                ctx.stroke();
            //}
	}
}
}
function createbots() {
    if(play||draw){
    for (var i=0; i<ob[stat].bots.length; i++){
        ctx.beginPath();
        ctx.arc((ob[stat].bots[i].center[0]*can.width/ob[stat].maxX),(ob[stat].bots[i].center[1]*can.height/ob[stat].maxY),ob[stat].bots[i].radius*0.21,0,2*Math.PI);
        var bscore = ob[stat].score[ob[stat].bots[i].botname];
        ctx.font="15px Georgia";
        ctx.fillStyle = "green";
        var score = ob[stat].bots[i].botname + ":" + bscore;
        if((ob[stat].bots[i].center[1]*can.height/ob[stat].maxY)-ob[stat].bots[i].radius*0.21<15&&(ob[stat].bots[i].center[0]*can.width/ob[stat].maxX)+ob[stat].bots[i].radius*0.21>can.width-score.length*5){
            ctx.fillText(score, (ob[stat].bots[i].center[0] * can.width / ob[stat].maxX) - ob[stat].bots[i].radius * 0.21-score.length*10, (ob[stat].bots[i].center[1] * can.height / ob[stat].maxY) - ob[stat].bots[i].radius * 0.21+25);
        }
        else if((ob[stat].bots[i].center[0]*can.width/ob[stat].maxX)+ob[stat].bots[i].radius*0.21>can.width-score.length*5){
            ctx.fillText(score, (ob[stat].bots[i].center[0] * can.width / ob[stat].maxX) - ob[stat].bots[i].radius * 0.21-score.length*10, (ob[stat].bots[i].center[1] * can.height / ob[stat].maxY) - ob[stat].bots[i].radius * 0.21);
        }
        else  if((ob[stat].bots[i].center[1]*can.height/ob[stat].maxY)-ob[stat].bots[i].radius*0.21<15){
            ctx.fillText(score,(ob[stat].bots[i].center[0]*can.width/ob[stat].maxX)-ob[stat].bots[i].radius*0.21,(ob[stat].bots[i].center[1]*can.height/ob[stat].maxY)+ob[stat].bots[i].radius*0.21+10);
        }
        else {
            ctx.fillText(ob[stat].bots[i].botname + ":" + bscore, (ob[stat].bots[i].center[0] * can.width / ob[stat].maxX) - ob[stat].bots[i].radius * 0.21, (ob[stat].bots[i].center[1] * can.height / ob[stat].maxY) - ob[stat].bots[i].radius * 0.21);
        }
        ctx.strokeStyle = "green";
        ctx.fill();
      ctx.stroke();
    }
 }
}

function createfood() {
    if(play||draw){
      for(var i=0; i<ob[stat].food.length; i++){
          ctx.beginPath();
          ctx.arc((ob[stat].food[i][0]*can.width/ob[stat].maxX),(ob[stat].food[i][1]*can.height/ob[stat].maxY),2*0.21,0,2*Math.PI);
          ctx.fillStyle = "red";
          ctx.strokeStyle="red";
          ctx.fill();
          ctx.stroke();
      }
  }
}
function updatestat() {
    if(play){
    if(stat<ob.length-1) {
        ctx.beginPath();
        stat++;
    }
}

}
$(document).ready(function(){
  
   $('body').keydown(function(e){
       e.preventDefault();
    if(e.keyCode == '32'){
      play = !play;
     }
    if(!play){

    if(e.keyCode == '65'){
        console.log(fr);
        console.log(stat);
      if((stat-fr)>0){
      stat-=fr;
      draw=1;
      drew();
    }
     }
    if(e.keyCode == '68'){
      console.log(stat);
      console.log(fr);
      if((stat + fr)<ob.length){
      stat+=fr;
      draw=1;
      drew();
    }
   }
   }
    });
});
/*function draw() {
	ctx.clearRect(0,0,can.width,can.height);
	ctx.beginPath();
	ctx.arc(x, y, r, 0, 2 * Math.PI);
	ctx.fillStyle = "red";
	ctx.fill();
	ctx.globalCompositeOperation = 'destination-over';
    var circ =  ctx.stroke();
    requestAnimationFrame(draw);
}
function update() {
	/*if(x+30<can.width && y+30<can.height) {
        x++;
        y++;
    }x+=5;
		requestAnimationFrame(update);
}
function check(){
	for(var i=0; i<xc.length;i++) {
      if(Math.pow((r-2),2)>=(Math.pow((x-xc[i]),2)+Math.pow((y-yc[i]),2))){
          ctx.clearRect(0, 0, can.width, can.height);
          xc.splice(i,1);
          yc.splice(i,1);
          r += 2;
	  }
    }
    requestAnimationFrame(check);
}*/
