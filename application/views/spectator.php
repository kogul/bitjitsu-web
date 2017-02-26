<div class="col-md-12 contarea player">
    <div class="col-md-12 modewrap">
        <div class="col-md-offset-4 col-md-4">
            <a class="btn mbtn" href="<?php echo base_url('/user/gameplay/?json='.$file); ?>">Switch to Normal mode</a>
        </div>
    </div>
    <input type="hidden" value="<?php echo $userdata['name']; ?>" id="teamname">
    <canvas id="spectator" class="game" width="1066px" height="600px">
    </canvas>
    <script src="<?php echo base_url('/Json/'.$file.'.js') ?>"></script>
    <script src="<?php echo base_url('/application/Assets/Js/Gameplay/spectator.js') ?>"></script>
</div>