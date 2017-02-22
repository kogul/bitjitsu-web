<!DOCTYPE html>
<html>
<head>
	<title>BitJitsu</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/bootstrap.css")?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("/application/Assets/Css/custom.css")?>">
	<script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/jquery-3.1.1.js")?>"></script>
	<script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/bootstrap.js")?>"></script>
	<script type="text/javascript" src="<?php echo base_url("/application/Assets/Js/custom.js")?>"></script>
</head>
<body>
    <div class="col-md-12 header">
    	<div class="col-md-offset-8 col-md-4 head">
    	<h1 class="col-md-12">BitJitsu</h1>
    	<hr/>
    	<p>The AI Challenge</p>
    	</div>
    </div>
  <div class="col-md-12 navpan ">
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Home</a></li>
        <li><a href="#">Manual</a></li>
        <li><a href="<?php echo base_url("/user/leaderboard") ?>">Leaderboard</a></li>
          <?php if(!isset($userdata['logged_in'])) {
              echo "<li><a href='".base_url('/user/index')."'>Login</a></li>";
         }
          if((isset($userdata['logged_in']))){
          echo      "<li><a href='#'>Package</a></li>
                    <li><a href='".base_url('/user/gameplay')."'>Gameplay</a></li>
                    <li><a href='".base_url('/user/submission')."'>Submission</a></li>
                    <li><a href='".base_url('/user/logout')."'>Logout</a></li>);";
          }  ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</div>
    <div class="col-md-12 cont">