<div class="col-md-12 contarea player">
    <div class="col-md-12 modewrap">
        <div class="col-md-offset-4 col-md-4">
            <a class="btn mbtn" href="<?php echo base_url('/user/gameplay/?json='.$file); ?>">Switch to Normal mode</a>
        </div>
    </div>
    <div class="guide col-md-offset-1 col-md-10">
        <div class="col-md-6">
            <h3>Controls</h3>
            <hr>
            <p>Spacebar: Pause/Resume</p>
            <p>When Paused -  a:Next frame  d:previous frame</p>
            <p>Frame skip rate can be chosen from the options given below</p>
        </div>
        <div class="col-md-6">
            <h3>Replay Specifications</h3>
            <hr>
            <p>Red: Food</p>
            <p>Blue: Virus</p>
            <p>Green: Bots</p>
        </div>
    </div>
    <input type="hidden" value="<?php echo $userdata['name']; ?>" id="teamname">
    <canvas id="spectator" class="game" width="1066px" height="600px">
    </canvas>
    <div class="col-md-offset-1 col-md-10 framespec"><label>Rate of frames to skip: </label><select id="skiprate" name="skiprate">
                        <option value="1">1</option>
                        <option value="5" selected>5</option>
                        <option value="10">10</option>
        </select></div>
    <script src="<?php echo base_url('/replays/'.$file.'.js') ?>"></script>
    <script src="<?php echo base_url('/application/Assets/Js/Gameplay/spectator.js') ?>"></script>
</div>