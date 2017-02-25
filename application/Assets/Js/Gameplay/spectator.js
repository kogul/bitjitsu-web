var can = document.getElementById("spectator");
var ctx = can.getContext("2d");
var name = $('#teamname').val();
var f=0;
var stat=0;


//update();
findbot();
clearcan();
createfood();
createvirus();
createfcirclr();
createsquare();

createbots();
updatestat();
//check();
function findbot(){
	for(var i=0; i< ob[stat].bots.length; i++){
	    console.log(ob[stat].bots[i].botname);
		if(ob[stat].bots[i].botname == name){
			f = i;
			console.log(f);
			break;
		}
	}
}
function createvirus() {
	for (var i =0; i<ob[stat].virus.length; i++){
	    if(ob[stat].virus[i][0]<ob[stat].bots[f].center[0]+(can.width/2)+35&&ob[stat].virus[i][0]>ob[stat].bots[f].center[0]-(can.width/2)-35 &&ob[stat].virus[i][1]<ob[stat].bots[f].center[1]+(can.width/2)+35&&ob[stat].virus[i][1]>ob[stat].bots[f].center[1]-(can.width/2)-35) {

            ctx.beginPath();
            console.log((ob[stat].virus[i][0]-ob[stat].bots[f].center[0])+(can.width)/2);
            console.log((ob[stat].virus[i][1]-ob[stat].bots[f].center[1])+can.height/2);
            ctx.arc((ob[stat].virus[i][0]-ob[stat].bots[f].center[0])+(can.width)/2,(ob[stat].virus[i][1]-ob[stat].bots[f].center[1])+can.height/2, 35, 0, 2 * Math.PI);
            // if(yes == true) {
            ctx.strokeStyle = "blue";
            ctx.fillStyle = "blue";
            ctx.fill();
            ctx.stroke();
            //}
        }

	}
	requestAnimationFrame(createvirus);
}
function createbots() {
    //for (var i=0; i<ob.bots.length; i++){

        ctx.beginPath();
        ctx.arc(can.width/2,can.height/2,ob[stat].bots[f].radius,0,2*Math.PI);
        ctx.strokeStyle = "green";
        ctx.fillStyle = "green";
        ctx.fill();
        ctx.stroke();
   // }
    requestAnimationFrame(createbots);
}
function createfcirclr() {
    for(var i=0; i<ob[stat].ffieldcircle.length; i++){
        if(ob[stat].ffieldcircle[i].origin[0]<ob[stat].bots[f].center[0]+(can.width/2)+(ob[stat].ffieldcircle[i].outerrad)&&ob[stat].ffieldcircle[i].origin[0]>ob[stat].bots[f].center[0]-(can.width/2)-(ob[stat].ffieldcircle[i].outerrad)&&ob[stat].ffieldcircle[i].origin[1]<ob[stat].bots[f].center[1]+(can.height/2)+(ob[stat].ffieldcircle[i].outerrad)&&ob[stat].ffieldcircle[i].origin[1]>ob[stat].bots[f].center[1]-(can.height/2)-(ob[stat].ffieldcircle[i].outerrad)) {
           // ctx.clearRect(0,0,can.width,can.height);
            ctx.beginPath();
            ctx.arc(((ob[stat].ffieldcircle[i].origin[0]-ob[stat].bots[f].center[0]))+can.width/2, ((ob[stat].ffieldcircle[i].origin[1]-ob[stat].bots[f].center[1]))+can.height/2, ob[stat].ffieldcircle[i].outerrad, 0, 2 * Math.PI);
            ctx.strokeStyle = "orange";
            ctx.fillStyle = "orange";
            ctx.fill();
            ctx.stroke();
            ctx.beginPath();
            ctx.arc(((ob[stat].ffieldcircle[i].origin[0]-ob[stat].bots[f].center[0]))+(can.width/2),((ob[stat].ffieldcircle[i].origin[1]-ob[stat].bots[f].center[1]))+(can.height/2), ob[stat].ffieldcircle[i].innerrad, 0, 2 * Math.PI);
            ctx.strokeStyle = "white";
            ctx.fillStyle = "white";
            ctx.fill();
            ctx.stroke();
        }
    }
    requestAnimationFrame(createfcirclr);
}
function createsquare() {
        for(var i=0; i<ob[stat].ffieldsquare.length;i++){
            if(ob[stat].ffieldsquare[i].origin[0]<ob[stat].bots[f].center[0]+(can.width/2)+(ob[stat].ffieldsquare[i].outerside)/2&&ob[stat].ffieldsquare[i].origin[0]>ob[stat].bots[f].center[0]-(can.width/2)-(ob[stat].ffieldsquare[i].outerside)/2&&ob[stat].ffieldsquare[i].origin[1]<ob[stat].bots[f].center[1]+(can.height/2)+(ob[stat].ffieldsquare[i].outerside)/2&&ob[stat].ffieldsquare[i].origin[1]>ob[stat].bots[f].center[1]-(can.height/2)-(ob[stat].ffieldsquare[i].outerside)/2) {
                ctx.beginPath();
                //ctx.rect((ob[stat].ffieldsquare[i].origin[0] - ob[stat].bots[f].center[0])+can.width/2,(ob[stat].ffieldsquare[i].origin[1] - ob[stat].bots[f].center[1])+can.height/2, ob[stat].ffieldsquare[i].outerside, ob[stat].ffieldsquare[i].outerside);
                ctx.strokeStyle = "#FC0";
                ctx.fillStyle = "#FC0";
                ctx.fill();
                ctx.stroke();
                ctx.beginPath();
                ctx.rect((ob[stat].ffieldsquare[i].origin[0] - ob[stat].bots[f].center[0])+can.width/2,(ob[stat].ffieldsquare[i].origin[1] - ob[stat].bots[f].center[1])+can.height/2, ob[stat].ffieldsquare[i].innerside, ob[stat].ffieldsquare[i].innerside);
                ctx.strokeStyle = "white";
                ctx.fillStyle = "white";
                ctx.fill();
                ctx.stroke();
            }
        }
        requestAnimationFrame(createsquare);
}
function createfood() {
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
      requestAnimationFrame(createfood);
}
function updatestat() {
    if(stat < ob.length-1){
        stat++;
    }
    requestAnimationFrame(updatestat);
}
function clearcan(){
    if(stat < ob.length-1) {
        ctx.clearRect(0, 0, can.width, can.height);
    }
    requestAnimationFrame(clearcan);
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
