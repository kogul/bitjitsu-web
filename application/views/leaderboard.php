<div class="col-md-offset-1 col-md-10 contarea">
    <h1>Leader Board</h1>
    <hr/>
    <div class="replace">
        <div class="col-md-offset-2 col-md-8">
            <table class="table table-bordered">
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
                    <td><?php echo $score->tname; ?></td>
                    <td><?php echo $score->tscore; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>