<!DOCTYPE html>
<html>
<head>
    <title>BitJitsu | <?php echo $pagetitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/bootstrap.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/custom.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/home.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/Animate/animate.css")?>">
    <script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/jquery-3.1.1.js")?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/bootstrap.js")?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/custom.js")?>"></script>
    <script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/home.js")?>"></script>
</head>
<body>
<div class="sidebar">
    <div class="closebtn" id="close"><img src="<?php echo base_url('/application/Assets/Css/Bg-Images/ic_close_black_24dp_1x.png'); ?>"></div>
    <div><a href="<?php echo base_url("/user/"); ?>">Home</a></div>
    <div><a target="_blank" href="<?php echo base_url("/user/documentation"); ?>">Documentation</a></div>
    <div><a href="<?php echo base_url("/user/leaderboard"); ?>">Leaderboard</a></div>
    <?php if(!isset($userdata['logged_in'])) {
        echo "<div><a href='".base_url('/user/login')."'>Login</a></div>";
    }
    if((isset($userdata['logged_in']))){
        echo  "<div><a href='#'>Package</a></div>";
        echo  "<div><a href='".base_url('/user/submission')."'>Submission</a></div>";
        echo  "<div><a href='".base_url('/user/logout')."'>Logout</a></div>";
    }
    ?>
</div>

<div class="navpan">
    <div class="menubt" id="menu">
        <img src="<?php echo base_url('/application/Assets/Css/Bg-Images/ic_view_headline_black_24dp_1x.png'); ?>">
    </div>
</div>
<div class="col-md-12 hheader">
    <div class="col-md-offset-2 col-md-8 hhead">
        <h1 class="col-md-12 animated fadeInUp">BitJitsu</h1>
        <hr class="animated zoomIn"/>
        <p class="tagline animated fadeInDown">The AI Challenge</p>
        <div class="animated zoomInDown" id="downar"><img src="<?php echo base_url("/application/Assets/Css/Bg-Images/ic_keyboard_arrow_down_black_24dp_2x.png") ?>"></div>
    </div>
</div>
<div class="col-md-12 awrap">
    <p>The aim of the event is to create an Artificial Intelligence (bot) to play this online strategy game on your behalf. Imbue your bot with an excellent strategy, to help it in this battle for domination, against other bots in the arena! Whether you are a beginning programmer or an expert, this is sure to be a great learning experience (with cool cash prizes!). Moreover it's a long challenge and you can take your time updating your submissions and review your bot's actions, live. Take your time in cooking up a cunning strategy and implementing it.</p>
    <h4>THIS IS A TEAM EVENT OF 1 UPTO 3 MEMBERS</h4>
</div>
<div class="col-md-12 register">
    <h1>Register And Form A Team</h1>
    <hr/>
    <div class="col-md-offset-1 col-md-4 rp">
        <a target="_blank" href="https://anokha.amrita.edu/"><h3>Register With Anokha</h3></a>
        <hr/>
        <img src="<?php echo base_url('/application/Assets/Css/Bg-Images/register.jpg'); ?>">
    </div>
    <div class="col-md-offset-2 col-md-4 rp">
        <a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLScn39Qz0_xqdov7hdb_WMrqrBcHSoTmgb0L_AM27J68SaicDg/viewform"><h3>Fill The Google Form</h3></a>
        <hr/>
        <img src="<?php echo base_url('/application/Assets/Css/Bg-Images/form.jpg'); ?>">
    </div>
</div>
<div class="col-md-12 gamedes">
    <div class="col-md-offset-1 col-md-10 gcont">
        <h3>The Game</h3>
        <hr>
        <h4>This game is based on Agar.io.</h4>
        <p>Agar.io is an addictive multiplayer game where you - as the player - can increase the mass of your cell(or cells) by eating other player's cells. The word "Agar" is the name of the cell wall of certain algae. The goal of the game is to obtain the largest cell; players restart when all of their cells are swallowed by another player. Players can change their cell's appearance with predefined words, phrases, symbols or skins.</p>
        <p>Viruses split cells larger than them into many pieces (16 or less, depending on the mass) and smaller cells can hide underneath a virus for protection against larger cells. Cells in 16 pieces can eat viruses without splitting. Viruses are normally randomly generated, but players can make new viruses by ejecting a small fraction of a player's cell's mass into the virus a few times, causing the virus to split up.
            Players can split their cell into two, and one of the two evenly divided cells will be flung in the direction of the cursor (a maximum of 16 split cells). This can be used as a ranged attack to swallow other smaller cells, to escape an attack from another cell, or to move more quickly around the map. Split cells eventually merge back into one cell. Aside from feeding viruses, players can eject (release) a small fraction of their mass to feed other cells. A player can also eject mass to trick enemies into coming closer to the player. Once an enemy cell is close enough, the player can split his/her cell to eat the baited enemy.
        </p>
        <h4>But We Differ</h4>
        <p>Force Field. Either in a circular or square fashion is a water stream, which slows down your blob(cell) and keeps you moving in the stream unless your tendency to move out is greater than the existing force field. We also allow you to control your blobs separately when a virus splits you.</p>

    </div>
</div>
<div class="col-md-12 glink">
    <div class="col-md-4">
        <img src="<?php echo base_url('/application/Assets/Css/Bg-Images/agar-io.png'); ?>">
    </div>
    <div class="col-md-8 glns">
         <h1>Try Out</h1>
         <hr/>
        <a target="_blank" href="http://agar.io/"><h3>Play Agar.io</h3></a>
        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.miniclip.agar.io&hl=en"><h3>Download App</h3></a>
    </div>
</div>

<div class="col-md-12 fewmore">
  <h1>And a few more</h1>
    <hr/>
    <div class="col-md-3 olink">
        <a target="_blank" href="https://arrow.pythonanywhere.com/bit-jitsu/2016"><h3>The Archive</h3></a>
        <hr>
        <p>Have a look at the event that we conducted previously</p>
    </div>
    <div class="col-md-offset-1 col-md-4 olink">
        <a target="_blank" href="<?php echo base_url('user/documentation/'); ?>"><h3>Documentation</h3></a>
        <hr>
        <p>See the documentation of this game and get your hands dirty</p>
    </div>
    <div class="col-md-offset-1 col-md-3 olink">
        <a href="<?php echo base_url('user/resources/'); ?>"><h3>Resources</h3></a>
        <hr>
        <p>Checkout other AI Challenges and AI programming contests</p>
    </div>
</div>