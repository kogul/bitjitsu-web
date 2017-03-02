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
        echo  "<div><a href='https://drive.google.com/open?id=0By0rvNg9_qznVml0LUVhWl93OEU'>Package</a></div>";
        echo  "<div><a href='".base_url('/user/selectcount')."'>Replays</a></div>";
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
    <p>The aim of the event is to create an Artificial Intelligence (bot) to play this online strategy game on your behalf. Imbue your bot with an excellent strategy, to help it in this battle for domination, against other bots in the arena!<br>
    Whether you are a beginning programmer or an expert, this is sure to be a great learning experience (with cool cash prizes!).<br>
    You can update your submissions at anytime and review your bot's actions, live. Take your time in cooking up a cunning strategy and implementing it.</p>
    <h4>THIS IS A TEAM EVENT OF 1 TO 3 MEMBERS</h4>
</div>
<div id="anokha-reg-box" class="col-md-12 register">
    <h1>Register And Form A Team</h1>
    <hr/>
    <div class="col-md-offset-1 col-md-4 rp">
        <a target="_blank" href="https://anokha.amrita.edu/events/E1700036"><h3>Register With Anokha</h3></a>
        <hr/>
        <img src="<?php echo base_url('/application/Assets/Css/Bg-Images/register.jpg'); ?>">
    </div>
    <div id="gform-reg-box" class="col-md-offset-2 col-md-4 rp">
        <a target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLScn39Qz0_xqdov7hdb_WMrqrBcHSoTmgb0L_AM27J68SaicDg/viewform"><h3>Fill The Google Form</h3></a>
        <hr/>
        <img src="<?php echo base_url('/application/Assets/Css/Bg-Images/form.jpg'); ?>">
    </div>
</div>
<div class="col-md-12 gamedes">
    <div class="col-md-offset-1 col-md-10 gcont">
        <h3>The Game is based on Agar.io</h3>
        <hr>
        <h4 style="text-align: center;">About Agar.io</h4>
        <p>The word "Agar" is the name of the cell wall of certain algae.<br>
        Agar.io is an addictive online multiplayer game where you - as the player - control a single cell in the begining.<br></p>
        <blockquote>Hereafter, the words blobs and cells are used interchangeably, and mean the same.</blockquote>
        <p>The aim is to become the largest cell in the arena by eating other player's cells and randomly spawned food.<br>
        <b>In the original implementation</b>, players restart when all of their cells are swallowed by another player, but not in our implementation.</p>
        <p>Special entities like <i>Viruses</i> can split cells larger than them into many pieces<sup class="conditions"><a href="#no-of-splits">1</a></sup> (depending on the mass) and smaller cells can hide underneath a virus for protection against larger cells.<br>
        Viruses are normally randomly generated, but players can make new viruses by ejecting a small fraction of a player's cell's mass into the virus a few times, causing the virus to split up (just like normal cells do).<br>
        Players can split their cell into two, and one of the two evenly divided cells will be flung in the direction of the cursor. Any no. of splits can be made<sup class="conditions"><a href="#no-of-splits">1</a></sup>, subject to the upper bound of 16 cells on the arena. The game is centered around this versatile move, which can be used,</p>
        <ul>
            <li>to mount a <i>ranged attack</i> to swallow other smaller cells,</li>
            <li>to escape an attack from another cell,</li>
            <li>to move more quickly around the map.</li>
        </ul>
        <p>
        Cells of a player can be merged back into each other cell<sup class="conditions"><a href="#merging-n-splitting">2</a></sup>.</p>
        <p>Aside from feeding viruses, players can eject (release) a small fraction of their mass to feed other cells or just throw it back as food.<br>
        A common strategy is to eject mass and tricking enemies into coming closer to the player. Once an enemy cell is close enough, the player can split his/her cell to eat the baited enemy.
        </p>
        <hr>
        <h4 style="text-align: center;">Yet we differ,</h4>
        <p>The game implementation for this event is inspired by Agar.io, but it is not <i>just another port of a popular game</i> The most obvious differences are:</p>
        <ol>            
            <li><h4>Independent cells</h4>
            The original game and most "forks" don't allow you to control all cells in your control. All cells flock around one of the cells and move/operate in sync.
            <i>We also allow you to control your blobs separately when a virus splits you or you decide to split a cell.</i></li>
            <li><h4>Splits are symmetric</h4>
            Cells always split in to 2 equal halves, unlike agar.io.</li>
            <li><h4>Merge whenever you want</h4>
            Agar.io places some restrictions on merging cells, we don't<sup class="conditions"><a href="#no-of-splits">1</a></sup>.</li>
            <li><h4>Viruses are static</h4>
            Player cannot <i>feed</i> viruses and create new ones.</li>
            <li><h4>Direction of <i>ejected mass</i></h4>
            Is clearly defined as the opposite of current movement direction.</li>            
        </ol>
        <p>A detailed list of differences is available in the Documentation section.</p>
        
        <h3>Getting started</h3>
        <p>We strongly recommend that you play the Agar.io game on your browser before reading the documentation.</p>
        <ol>
            <li>You must register your team on the <a href="#anokha-reg-box"><span class="anokha">anokha</span> 2017 site</a> <b>to recieve a password for this site, to access the Documentation</b>. Please fill <a href="#gform-reg-box">this form</a>.</li>
            <li>Try out the tutorial and submit a dumb bot, and keep making it better.</li>
        </ol>
        </p>
    </div>
</div>
<div class="col-md-12 glink">
    <div class="col-md-4">
        <img src="<?php echo base_url('/application/Assets/Css/Bg-Images/Agar-io.png'); ?>">
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
    <a href="https://arrow.pythonanywhere.com/bit-jitsu/2016" target="_blank">
        <div class="col-md-3 olink">
            <h3>The Archive</h3>
            <hr>
            <p>Have a look at the event that we conducted in <span class="anokha">anokha</span> 2016</p>
        </div>
    </a>
    <a href="<?php echo base_url("user/documentation");?>">
        <div class="col-md-offset-1 col-md-4 olink">
            <h3>Documentation</h3>
            <hr>
            <p>See the documentation of our game and get your hands dirty!</p>
        </div>
    </a>
    <a href="<?php echo base_url('user/resources/'); ?>">
        <div class="col-md-offset-1 col-md-3 olink">
            <h3>Resources</h3>
            <hr>
            <p>Checkout other AI Challenges and AI programming contests</p>
        </div>
    </a>
</div>
<div class="col-md-12 footnote" style="height: auto">
    <h4>Footnotes</h4>
    <p id="no-of-splits">
        <span>1</span>
        An upper bound on the no. of blobs on the arena is 16. The no. of splits is unbounded, as cells can be merged.
    </p>
    <p id="merging-n-splitting">
        <span>2</span>
        A hunter blob must be slightly bigger than it's prey blob. Exact numbers are available in the docs.
    </p>
</div>
</div>
</body>