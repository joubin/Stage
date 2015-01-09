
<?php
include 'head.php';
include 'nav.php';
require_once( 'getcurrentuser.php' );
?>

<div class="spacer"></div>


  <div class="container-fluid toTheBottom">
 
    <div class="col-md-7 toTheBottom band left minpadding">
<div data-src="holder.js/750x300" class="holder" id="holder" alt="750x300"  data-holder-rendered="true" title="Drag image to upload"> 
<img class="img-rounded fitinside" src="<?php getImage();?>"/>
</div>

            <p class="hidden" id="upload"><label>Drag & drop not supported, but
            you can still upload via this input field:<br>
            <input type="file"></label></p>

            <p id="filereader"></p>

            <p id="formdata"></p>

            <p id="progress"></p>
            <div class="spacer"></div>
          <progress class="fitinside" id="uploadprogress" max="100" value=
            "0" style="display:none;">0</progress>
            <script src="./js/fileupload.js"></script> 

<blockquote>
<?php  echo getUserName();?>
</blockquote>

<blockquote class="bio" id="div_1" title="click to edit">
	<?php
		echo getBio();
	?>
</blockquote>

    </div>
    <div class="col-md-4 toTheBottom fan right">
    <?php
    include 'addEvent.php';
    ?>
	<div class="spacer"></div>	
    <?php
    getEvents();
    ?>

</div> 
  </div> <!--- Container ----->


<?php
include 'foot.php';
?>
