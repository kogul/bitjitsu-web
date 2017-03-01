var can = document.getElementById("spectator");
var ctx = can.getContext("2d");
var name = $('#teamname').val();
var f = 0,play=1,draw=0,skipr = 0;
$(document).ready(skiprate);
$(document).ready(function(){
    $(document).on('change','#skiprate',skiprate);
});
function skiprate(){
    skipr = $('#skiprate').val();
    skipr = Number(skipr);
}
//update();
var stat=0;
$(document).ready(function () {
    core_redraw();
});
function core_redraw(){
	findbot();
clearcan();
iter_no();
createfood();
createvirus();
createbots();
updatestat();
requestAnimationFrame(core_redraw);
}


function drew(){
	findbot();
clearcan();
createfood();
createvirus();
createbots();
draw =0;
}
function findbot(){
	for(var i=0; i< ob[stat].bots.length; i++){
		if(ob[stat].bots[i].botname == name){
			f = i;
			break;
		}
	}
}
function createvirus() {
  if(play||draw){
	for (var i =0; i<ob[stat].virus.length; i++){
	    if(ob[stat].virus[i][0]<ob[stat].bots[f].center[0]+(can.width/2)+35&&ob[stat].virus[i][0]>ob[stat].bots[f].center[0]-(can.width/2)-35 &&ob[stat].virus[i][1]<ob[stat].bots[f].center[1]+(can.width/2)+35&&ob[stat].virus[i][1]>ob[stat].bots[f].center[1]-(can.width/2)-35) {

            ctx.beginPath();
            ctx.arc((ob[stat].virus[i][0]-ob[stat].bots[f].center[0])+(can.width)/2,(ob[stat].virus[i][1]-ob[stat].bots[f].center[1])+can.height/2, 35, 0, 2 * Math.PI);
            // if(yes == true) {
            ctx.strokeStyle = "blue";
            ctx.fillStyle = "blue";
            ctx.fill();
            ctx.stroke();
            //}
        }
	}
}
}
function iter_no(){
     ctx.beginPath();
     ctx.font="15px Monospace";
     ctx.fillStyle = "green";
     ctx.fillText("#"+stat,0,15);
}
function createbots() {
    //for (var i=0; i<ob.bots.length; i++){
    if(play||draw){
        ctx.beginPath();
        ctx.arc(can.width/2,can.height/2,ob[stat].bots[f].radius,0,2*Math.PI);
        ctx.strokeStyle = "green";
        ctx.fillStyle = "green";
        ctx.fill();
        ctx.stroke();
   // }
 }
}
function createfood() {
  if(play || draw){
      for(var i=0; i<ob[stat].food.length; i++){
          if(ob[stat].food[i][0]<ob[stat].bots[f].center[0]+(can.width/2)+10&&ob[stat].food[i][1]<ob[stat].bots[f].center[1]+(can.height/2)+10&&ob[stat].food[i][1]>ob[stat].bots[f].center[1]-(can.height/2)-10&&ob[stat].food[i][0]>ob[stat].bots[f].center[0]-(can.width/2)-10) {

              ctx.beginPath();
              ctx.arc((ob[stat].food[i][0]-ob[stat].bots[f].center[0])+(can.width/2),(ob[stat].food[i][1]-ob[stat].bots[f].center[1])+(can.height/2), 2, 0, 2 * Math.PI);
              ctx.strokeStyle = "red";
              ctx.fillStyle = "red";
              ctx.fill();
              ctx.stroke();
          }
      }
    }
}
function updatestat() {
  if (play) {
    if(stat < ob.length-1){
        stat++;
    }
  }
}
function clearcan(){
  if (play||draw) {
    if(stat < ob.length-1) {
        ctx.clearRect(0, 0, can.width, can.height);
    }
  }
}
$(document).ready(function(){
  
   $('body').keydown(function(e){
    if(e.keyCode == '32'){
      play = !play;
     }
    if(!play){
    if(e.keyCode == '68'){
        console.log(stat);
        console.log(skipr);
      if((stat-skipr)>0){
      stat-=skipr;
      draw=1;
      drew();
    }
     }
    if(e.keyCode == '65'){
      if((stat+skipr)<ob.length){
      stat+=skipr;
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
