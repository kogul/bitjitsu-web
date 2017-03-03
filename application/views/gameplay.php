<div class="col-md-12 contarea player">
    <div class="col-md-12 modewrap">
        <div class="col-md-offset-4 col-md-4">
            <a class="btn mbtn" href="<?php echo base_url('/user/spectator/?json='.$file); ?>">Switch to Spectator mode</a>
        </div>
        <div class="guide col-md-offset-1 col-md-10">
            <div class="col-md-4">
            <h3>Controls</h3>
            <hr>
            <table class="table table-condensed mini" style="font-size: 40%;">
                <thead><tr><th>Key</th><th>Action</th></tr></thead>
                <tbody>
                    <tr><td>Space</td><td>Pause / Resume</td></tr>
                    <tr><td>A</td><td>Previous Frame</td></tr>
                    <tr><td>D</td><td>Next Frame</td></tr>
                </tbody>
            </table> 
            <p>When Paused, "Frame Skip Rate" can be chosen from the dropdown in the bottom.</p>
            </div>
            <div class="col-md-4">
            <h3>Replay Legend</h3>
            <hr>
            <table class="table table-condensed mini">
                <thead><tr><th>Colour</th><th>Entity</th></tr></thead>
                <tbody>
                    <tr><td>Red</td><td>Food</td></tr>
                    <tr><td>Green</td><td>Bots</td></tr>
                    <tr><td>Blue</td><td>Virus</td></tr>
                </tbody>
            </table> 
            </div>
            <div class="col-md-4">
                <h3 id="iter_num"></h3>
                <hr>
                <p><?php echo $summary; ?></p>
                <h3>Logs</h3>
                <p class="col-md-4"><?php echo "<a class='white-links' href='/game_logs/move/".$logs['move'].".js'>Moves</a>"; ?><br></p>
                <p class="col-md-4"><?php echo "<a class='white-links' href='/game_logs/debug/".$logs['debug'].".js'>Debug</a>"; ?><br></p>
                <p class="col-md-4"><?php echo "<a class='white-links' href='/game_logs/error/".$logs['error'].".js'>Error</a>"; ?><br></p>
            </div>
        </div>
    </div>
    <canvas id="normal" class="game" height="600px" width="1066px">

    </canvas>
    <div class="col-md-offset-1 col-md-10 framespec"><label>Rate of frames to skip: </label><select id="skiprate" name="skiprate">
            <option value="1">1</option>
            <option value="5" selected>5</option>
            <option value="10">10</option>
        </select></div>
    <script type="application/javascript" src="<?php echo base_url('/replays/'.$file.'.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('/application/Assets/Js/Gameplay/gameplay.js') ?>"></script>

</div>