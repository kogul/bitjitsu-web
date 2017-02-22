<div class="col-md-offset-1 col-md-10 contarea lformc">
    <h1>Submit Your File</h1>
    <hr />
    <?php if(isset($msg)) {
        if (!strcmp($mtype, "error")) {
            echo "  <div class='col-md-offset-2 col-md-8 errormsg'>
        <p>" . $msg . "</p>
        </div>";
        }
        if (!strcmp($mtype, "success")) {
            echo "  <div class='col-md-offset-2 col-md-8 successmsg'>
        <p>" . $msg . "</p>
        </div>";
        }
    }
    ?>
    <form class="form-horizontal lform col-md-offset-2 col-md-8" action="/user/submission" method="post" enctype="multipart/form-data">

            <div class="col-md-6">
                <div class="form-group">
                    <input type="file" name="filesub" id="filesub">
                </div>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn sbtn">Submit</button>
            </div>
    </form>
</div>