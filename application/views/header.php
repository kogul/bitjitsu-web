<?php json_encode($userdata); ?>
<!DOCTYPE html>
<html>
<head>
	<title>BitJitsu</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/bootstrap.css")?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/custom.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/Animate/animate.css")?>">
	<script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/jquery-3.1.1.js")?>"></script>
	<script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/bootstrap.js")?>"></script>
	<script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/custom.js")?>"></script>
</head>
<body>
   <div class="sidebar">
    <div class="closebtn" id="close"><img src="<?php echo base_url('/application/Assets/Css/Bg-Images/ic_close_black_24dp_1x.png'); ?>"></div>
    <div><a href="#">Home</a></div>
    <div><a href="#">Documentation</a></div>
    <div><a href="<?php echo base_url("/user/leaderboard"); ?>">Leaderboard</a></div>
       <?php if(!isset($userdata['logged_in'])) {
           echo "<div><a href='".base_url('/user/index')."'>Login</a></div>";
       }
          if((isset($userdata['logged_in']))){
              echo  "<div><a href='#'>Package</a></div>";
              echo  "<div><a href='".base_url('/user/gameplay')."'>Gameplay</a></div>";
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
    <div class="col-md-12 header">
    	<div class="col-md-offset-8 col-md-4 head">
    	<h1 class="col-md-12">BitJitsu</h1>
    	<hr class="animated zoomIn"/>
    	<p class="tagline">The AI Challenge</p>
    	</div>
    </div>

    <div class="col-md-12 cont">