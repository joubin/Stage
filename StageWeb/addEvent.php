<!-- Button trigger modal -->
<button type="button" style="min-width:100%;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Create an Event
</button>
<?php
require_once( 'getcurrentuser.php' );
?>    

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" onload="initialize()">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create an Event</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="getcurrentuser.php" method="POST">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Event Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="eventname" id="eventname" placeholder="Event Name">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Event Location</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="autocomplete" 
              onFocus="geolocate()"  placeholder="Event Location">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Bands</label>
            <div class="col-sm-10">
              <!-- ASDASD -->
              <div class="form-group">

                <p>

                <select multiple="" name="e9[]" id="e9" style="min-width: 100%;" class="populate" tabindex="-1">
                   <?php
                   $bands = getAllBands();
                   foreach ($bands as $band) {
                     echo "<option value='".$band->getObjectId()."'>";
                     echo $band->get("BandName");
                     echo "</option>";
                   }
                   ?>

                 </select>
               </p>
             </div>
             <!-- ASDASDA -->
           </div>
           <div class="form-group">
            <div class='input-group date' id='datetimepicker1'>
              <label for="eventdate" class="col-sm-2 control-label">Date</label>
              <input type='text' class="form-control" id="eventdate" name="eventdate" />
              <span class="input-group-addon" for="eventdate"><span class="glyphicon glyphicon-calendar"></span>
            </span>
          </div>
        </div>

      </div>        
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <input hidden value="" name="lat" id="lat" />
          <input hidden value="" name="lon" id="lon" />
          <input hidden value="yes" name="addevent" id="addevent" />
          <input hidden value="" name="timezone" id="timezone" />
          <button type="submit" style="min-width:100%;" class="btn btn-default">Create Event</button>
        </div>
      </div>
    </form>
  </div>
  <div class="modal-footer">
    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
  </div>
</div>
</div>
</div>