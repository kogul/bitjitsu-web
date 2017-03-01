<div class="col-md-offset-1 col-md-10 contarea lformc">
    <h1 class="animated flipInX">Select Submission</h1>
    <hr class="animated zoomIn"/>
    <form class="form-horizontal lform col-md-offset-2 col-md-8" method="post" action="/user/fetchreplay/">
       <div class="col-md-6">
           <lable>Submission No:</lable>
           <select name="sub_num" id="platform">
             <?php for($i = $max; $i>0; $i--)
               echo "<option value='".$i."'>".$i."</option>";
             ?>
         </select>
       </div>
        <div class="col-md-6">
            <button type="submit" class="btn sbtn">Submit</button>
        </div>
    </form>
</div>