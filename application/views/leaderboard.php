<div class="col-md-offset-1 col-md-10 contarea">
    <h1 class="animated flipInX">Leader Board</h1>
    <hr class="animated zoomIn"/>
    <div class="replace">
        <div class="col-md-offset-2 col-md-8">
            <table class="table">
                <tr>
                    <th>Position</th>
                    <th>Team Name</th>
                    <th>Score</th>
                </tr>
                <?php
                $i = 0;
                foreach ($scores as $score){ ?>
                <tr>
                    <td><?php echo ++$i; ?></td>
                    <td><?php echo $score->name; ?></td>
                    <td><?php echo $score->score; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>