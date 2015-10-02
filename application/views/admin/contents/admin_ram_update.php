 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
  </p>

  <h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
  </h1>


  <?php echo form_open('admin/updateRam/'.$rowUpdate->ram_id) ;?>

  <div class="form-group">
    <div class = "row">
      <?php echo form_error('inputRamLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
      <label for="inputRamLib" class="control-label col-xs-2">Type</label>    
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputRamLib" value="<?php echo $ramLib ; ?>">            
      </div>
    </div>
  </div>    

  <div class="form-group">
    <div class = "row">
      <?php echo form_error('inputRamCoeff','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputRamCoeff" class="control-label col-xs-2">Coefficient</label>
      <div class="col-xs-10">
       <input type="text" class="form-control" name="inputRamCoeff" value="<?php echo $ramCoeff ; ?>">            
      </div>
    </div>
  </div>  

  <div class="form-group">
   <div class = "row">
      <?php echo form_error('inputRamCoeffJeu','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputRamCoeffJeu" class="control-label col-xs-2">Coefficient jeu</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputRamCoeffJeu" value="<?php echo $ramCoeffJeu ; ?>">            
      </div>
  </div>
</div> 

  <div class="form-group">  
    <div class = "row">
      <div class="col-xs-4">
        <input type="submit" class="form-control" value = "Modifier">            
      </div>
    </div>  
  </div>  

  <?php echo form_close() ;?>
</div>
