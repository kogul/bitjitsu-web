var can = document.getElementById("normal");
var ctx = can.getContext("2d");
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
createbots();
createfcirclr();
createsquare();
createfood();
//check();
function createvirus() {
	for (var i =0; i<ob.virus.length; i++){
            ctx.beginPath();
            ctx.arc(ob.virus[i][0]*0.04,ob.virus[i][1]*0.04,ob.virusrad*0.04,0,2*Math.PI);
           // if(yes == true) {
                ctx.fillStyle = "blue";
                ctx.fill();
                ctx.stroke();
            //}

	}
	requestAnimationFrame(createvirus);
}
function createbots() {
    for (var i=0; i<ob.bots.length; i++){
        ctx.beginPath();
        ctx.arc(ob.bots[i].Xcoordinate*0.04,ob.bots[i].Ycoordinate*0.04,ob.bots[i].mass*0.04,0,2*Math.PI);
        ctx.fillStyle = "red";
        ctx.fill();
        ctx.stroke();
    }
    requestAnimationFrame(createbots);
}
function createfcirclr() {
    for(var i=0; i<ob.ffieldcircle.length; i++){
        ctx.beginPath();
        ctx.arc(ob.ffieldcircle[i].origin[0]*0.04,ob.ffieldcircle[i].origin[1]*0.04,ob.ffieldcircle[i].outerrad*0.04,0,2*Math.PI);
        ctx.fillStyle = "orange";
        ctx.fill();
        ctx.stroke();
        ctx.beginPath();
        ctx.arc(ob.ffieldcircle[i].origin[0]*0.04,ob.ffieldcircle[i].origin[1]*0.04,ob.ffieldcircle[i].innerrad*0.04,0,2*Math.PI);
        ctx.fillStyle = "white";
        ctx.fill();
        ctx.stroke();
    }
    requestAnimationFrame(createfcirclr);
}
function createsquare() {
        for(var i=0; i<ob.ffieldsquare.length;i++){
            ctx.beginPath();
            ctx.rect(ob.ffieldsquare[i].origin[0]*0.04,ob.ffieldsquare[i].origin[1]*0.04,ob.ffieldsquare[i].outerside*0.04,ob.ffieldsquare[i].outerside*0.04);
            ctx.fillStyle = "red";
            ctx.fill();
            ctx.stroke();
            ctx.beginPath();
            ctx.rect(ob.ffieldsquare[i].origin[0]*0.04,ob.ffieldsquare[i].origin[1]*0.04,ob.ffieldsquare[i].innerside*0.04,ob.ffieldsquare[i].innerside*0.04);
            ctx.fillStyle = "white";
            ctx.fill();
            ctx.stroke();
        }
        requestAnimationFrame(createsquare);
}
function createfood() {
      for(var i=0; i<ob.food.length; i++){
          ctx.beginPath();
          ctx.arc(ob.food[i][0]*0.04,ob.food[i][1]*0.04,ob.virusrad*0.04,0,2*Math.PI);
          ctx.fillStyle = "yellow";
          ctx.fill();
          ctx.stroke();
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
