var can = document.getElementById("spectator");
var ctx = can.getContext("2d");
var f = 0;
var ob = {
    "bots": [
    {
        "botname": "kevin",
        "childno": 0,
        "Xcoordinate": 25,
        "Ycoordinate": 30,
        "mass": 20,
        "angle": 180,
        "score":150
    },
    {
        "botname": "kevin",
        "childno": 1,
        "Xcoordinate": 5,
        "Ycoordinate": 30,
        "mass": 22,
        "angle": 18,
        "score":150
    },
    {
        "botname": "juno",
        "childno": 0,
        "Xcoordinate": 23,
        "Ycoordinate": 600,
        "mass": 60,
        "angle": 45,
        "score":90
    }
],

    "maxX": 14142,
    "maxY": 14142,

    "food": [[1,2],
    [2,9],
    [23, 35],
    [78, 345],
    [89, 233]],

    "virusrad": 15,
    "virus":[[123, 45],
    [3455, 34],
    [333, 77],
    [3455, 33],
    [333, 90],
    [23, 55]],

    "ffieldcircle": [{"innerrad": 30,
    "outerrad": 45,
    "origin": [67, 788]},

    {"innerrad": 30,
        "outerrad": 50,
        "origin": [6790, 88]}],
    "ffieldsquare": [{"origin": [233, 7888],
    "innerside": 90,
    "outerside": 110}]
}
//draw();
//update();
createvirus();

createfcirclr();
createsquare();
createfood();
createbots();
//check();
function createvirus() {
	for (var i =0; i<ob.virus.length; i++){
	    if(ob.virus[i][0]<ob.bots[f].Xcoordinate+(can.width/2)+ob.virusrad&&ob.virus[i][0]>ob.bots[f].Xcoordinate-(can.width/2)-ob.virusrad&&ob.virus[i][1]<ob.bots[f].Ycoordinate+(can.width/2)+ob.virusrad&&ob.virus[i][1]>ob.bots[f].Ycoordinate-(can.width/2)-ob.virusrad) {
            ctx.beginPath();
            ctx.arc((ob.virus[i][0]-ob.bots[f].Xcoordinate)+(can.width)/2,(ob.virus[i][1]-ob.bots[f].Ycoordinate)+can.height/2, ob.virusrad*0.3, 0, 2 * Math.PI);
            // if(yes == true) {
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
        ctx.arc(can.width/2,can.height/2,20,0,2*Math.PI);
        ctx.fillStyle = "red";
        ctx.fill();
        ctx.stroke();
   // }
    requestAnimationFrame(createbots);
}
function createfcirclr() {
    for(var i=0; i<ob.ffieldcircle.length; i++){
        if(ob.ffieldcircle[i].origin[0]<ob.bots[f].Xcoordinate+(can.width/2)+(ob.ffieldcircle[i].outerrad)&&ob.ffieldcircle[i].origin[0]>ob.bots[f].Xcoordinate-(can.width/2)-(ob.ffieldcircle[i].outerrad)&&ob.ffieldcircle[i].origin[1]<ob.bots[f].Ycoordinate+(can.height/2)+(ob.ffieldcircle[i].outerrad)&&ob.ffieldcircle[i].origin[1]>ob.bots[f].Ycoordinate-(can.height/2)-(ob.ffieldcircle[i].outerrad)) {
            ctx.beginPath();
            ctx.arc(((ob.ffieldcircle[i].origin[0]-ob.bots[f].Xcoordinate))+can.width/2, ((ob.ffieldcircle[i].origin[1]-ob.bots[f].Ycoordinate)*can.height)+can.height/2, ob.ffieldcircle[i].outerrad, 0, 2 * Math.PI);
            ctx.fillStyle = "orange";
            ctx.fill();
            ctx.stroke();
            ctx.beginPath();
            ctx.arc(((ob.ffieldcircle[i].origin[0]-ob.bots[f].Xcoordinate))+(can.width/2),((ob.ffieldcircle[i].origin[1]-ob.bots[f].Ycoordinate)*can.height)+(can.height/2), ob.ffieldcircle[i].innerrad, 0, 2 * Math.PI);
            ctx.fillStyle = "white";
            ctx.fill();
            ctx.stroke();
        }
    }
    requestAnimationFrame(createfcirclr);
}
function createsquare() {
        for(var i=0; i<ob.ffieldsquare.length;i++){
            if(ob.ffieldsquare[i].origin[0]<ob.bots[f].Xcoordinate+(can.width/2)+(ob.ffieldsquare[i].outerside)/2&&ob.ffieldsquare[i].origin[0]>ob.bots[f].Xcoordinate-(can.width/2)-(ob.ffieldsquare[i].outerside)/2&&ob.ffieldsquare[i].origin[1]<ob.bots[f].Ycoordinate+(can.height/2)+(ob.ffieldsquare[i].outerside)/2&&ob.ffieldsquare[i].origin[1]>ob.bots[f].Ycoordinate-(can.height/2)-(ob.ffieldsquare[i].outerside)/2) {
                ctx.beginPath();
                ctx.rect((ob.ffieldsquare[i].origin[0] - ob.bots[f].Xcoordinate)+can.width/2,(ob.ffieldsquare[i].origin[1] - ob.bots[f].Ycoordinate)+can.height/2, ob.ffieldsquare[i].outerside, ob.ffieldsquare[i].outerside);
                ctx.fillStyle = "red";
                ctx.fill();
                ctx.stroke();
                ctx.beginPath();
                ctx.rect((ob.ffieldsquare[i].origin[0] - ob.bots[f].Xcoordinate)+can.width/2,(ob.ffieldsquare[i].origin[1] - ob.bots[f].Ycoordinate)+can.height/2, ob.ffieldsquare[i].innerside, ob.ffieldsquare[i].innerside);
                ctx.fillStyle = "white";
                ctx.fill();
                ctx.stroke();
            }
        }
        requestAnimationFrame(createsquare);
}
function createfood() {
      for(var i=0; i<ob.food.length; i++){
          if(ob.food[i][0]<ob.bots[f].Xcoordinate+(can.width/2)+10&&ob.food[i][1]<ob.bots[f].Ycoordinate+(can.height/2)+10&&ob.food[i][1]>ob.bots[f].Ycoordinate-(can.height/2)-10&&ob.food[i][0]>ob.bots[f].Xcoordinate-(can.width/2)-10) {
              ctx.beginPath();
              ctx.arc((ob.bots[f].Xcoordinate-ob.food[i][0])+(can.width/2),(ob.bots[f].Ycoordinate-ob.food[i][1])+(can.height/2), 5, 0, 2 * Math.PI);
              ctx.fillStyle = "yellow";
              ctx.fill();
              ctx.stroke();
          }
      }
      requestAnimationFrame(createfood);
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
