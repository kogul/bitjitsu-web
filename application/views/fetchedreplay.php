<div class="col-md-offset-1 col-md-10 contarea">
    <div class="col-md-12 pwrap" style="padding: 10px">
        <h1 class="animated flipInX">Replays</h1>
        <h4 class="animated fadeInUp">Submission Count: <?php echo $subcount; ?></h4>
        <hr class="animated zoomIn">
        <?php
        $i=1;
        foreach ($replaylist as $replay){
            echo "<a target='_blank' href='/user/gameplay/?json=".$replay['id']."'>Replay ".$i."</a>";
            echo "<p>".$replay['summary']."</p>";
            $i++;
        }

        ?>
</div>
</div>