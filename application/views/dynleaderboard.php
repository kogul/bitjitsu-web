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
                <td><?php echo $score->name; ?></td>
                <td><?php echo $score->score; ?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</div>