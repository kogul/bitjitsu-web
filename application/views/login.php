<div class="col-md-offset-1 col-md-10 contarea lformc">
    <h1 class="animated flipInX">Login</h1>
    <hr class="animated zoomIn" />
    <?php if(isset($msg)){
      echo"  <div class='col-md-offset-1 col-md-10 errormsg'>
        <p>".$msg."</p>
    </div>"; }?>
    <form class="form-horizontal lform col-md-offset-1 col-md-10" method="post" action="/user/login">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Team Name</label>
            <div class="col-sm-10">
                <input type="text" name="usrname" class="form-control" id="inputEmail3" placeholder="Team Name">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
            <div class="col-sm-10">
                <input type="password" name="pass" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div >
                <button type="submit" class="btn sbtn">Sign in</button>
            </div>
        </div>
    </form>
</div>
</div>