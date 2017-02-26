<div class="col-md-12 contarea player">
    <div class="col-md-12 modewrap">
        <div class="col-md-offset-4 col-md-4">
            <a class="btn mbtn" href="<?php echo base_url('/user/spectator/?json='.$file); ?>">Switch to Spectator mode</a>
        </div>
    </div>
    <canvas id="normal" class="game" height="600px" width="1066px">

    </canvas>
    <script src="<?php echo base_url('/Json/'.$file.'.js') ?>"></script>
    <script src="<?php echo base_url('/application/Assets/Js/Gameplay/gameplay.js') ?>"></script>
</div>