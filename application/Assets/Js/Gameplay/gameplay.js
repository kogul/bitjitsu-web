var can = document.getElementById("normal");
var ctx = can.getContext("2d");

//draw();
//update();
var stat = 0;
clearf();

createbots();
createfcirclr();
createsquare();
createfood();
createvirus();
updatestat();

function clearf(){
    ctx.clearRect(0,0,can.width,can.height);
    requestAnimationFrame(clearf);

}
function createvirus() {
	for (var i =0; i<ob[stat].virus.length; i++){
            ctx.beginPath();
            console.log(i);
            ctx.arc((ob[stat].virus[i][0]*can.width/ob[stat].maxX),(ob[stat].virus[i][1]*can.height/ob[stat].maxY),35*0.21,0,2*Math.PI);
           // if(yes == true) {
           	    ctx.strokeStyle="blue";
                ctx.fillStyle = "blue";
                ctx.fill();
                ctx.stroke();
            //}

	}
        requestAnimationFrame(createvirus);
}
function createbots() {
    for (var i=0; i<ob[stat].bots.length; i++){
        ctx.beginPath();
        ctx.arc((ob[stat].bots[i].center[0]*can.width/ob[stat].maxX),(ob[stat].bots[i].center[1]*can.height/ob[stat].maxY),ob[stat].bots[i].radius*0.21,0,2*Math.PI);
        var bscore = ob[stat].score[ob[stat].bots[i].botname];
        ctx.font="15px Georgia";
        ctx.fillStyle = "green";
        ctx.fillText(ob[stat].bots[i].botname+":"+bscore,(ob[stat].bots[i].center[0]*can.width/ob[stat].maxX)-ob[stat].bots[i].radius*0.21,(ob[stat].bots[i].center[1]*can.height/ob[stat].maxY)-ob[stat].bots[i].radius*0.21);
        ctx.strokeStyle = "green";
        ctx.fill();
        ctx.stroke();
    }
        requestAnimationFrame(createbots);
    }
function createfcirclr() {
    for(var i=0; i<ob[stat].ffieldcircle.length; i++){
        ctx.beginPath();
        ctx.arc((ob[stat].ffieldcircle[i].origin[0]*can.width/ob[stat].maxX),(ob[stat].ffieldcircle[i].origin[1]*can.height/ob[stat].maxY),ob[stat].ffieldcircle[i].outerrad*0.21,0,2*Math.PI);
        ctx.fillStyle = "#FC0";
        ctx.strokeStyle = "#FC0";
        ctx.fill();
        ctx.stroke();
        ctx.beginPath();
        ctx.arc((ob[stat].ffieldcircle[i].origin[0]*can.width/ob[stat].maxX),(ob[stat].ffieldcircle[i].origin[1]*can.height/ob[stat].maxY),ob[stat].ffieldcircle[i].innerrad*0.21,0,2*Math.PI);
        ctx.fillStyle = "white";
        ctx.strokeStyle = "white";
        ctx.fill();
        ctx.stroke();
    }
        requestAnimationFrame(createfcirclr);
}
function createsquare() {
        for(var i=0; i<ob[stat].ffieldsquare.length;i++){
            ctx.beginPath();
            ctx.rect((ob[stat].ffieldsquare[i].origin[0]*can.width/ob[stat].maxX),(ob[stat].ffieldsquare[i].origin[1]*can.height/ob[stat].maxY),ob[stat].ffieldsquare[i].outerside*0.21,ob[stat].ffieldsquare[i].outerside*0.21);
            ctx.fillStyle = "red";
            ctx.strokeStyle = "red";
            ctx.fill();
            ctx.stroke();
            ctx.beginPath();
            ctx.rect((ob[stat].ffieldsquare[i].origin[0]*can.width/ob[stat].maxX),(ob[stat].ffieldsquare[i].origin[1]*can.height/ob[stat].maxY),ob[stat].ffieldsquare[i].innerside*0.21,ob[stat].ffieldsquare[i].innerside*0.21);
            ctx.fillStyle = "white";
            ctx.strokeStyle = "white";
            ctx.fill();
            ctx.stroke();
        }
    requestAnimationFrame(createsquare);
}
function createfood() {
      for(var i=0; i<ob[stat].food.length; i++){
          ctx.beginPath();
          ctx.arc((ob[stat].food[i][0]*can.width/ob[stat].maxX),(ob[stat].food[i][1]*can.height/ob[stat].maxY),2*0.21,0,2*Math.PI);
          ctx.fillStyle = "red";
          ctx.strokeStyle="red";
          ctx.fill();
          ctx.stroke();
      }
    requestAnimationFrame(createfood);
}
function updatestat() {
    if(stat<ob.length-1) {
        ctx.beginPath();
        stat++;
    }
      requestAnimationFrame(updatestat);

}
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
