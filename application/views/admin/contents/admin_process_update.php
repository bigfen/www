 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
</h1>
<?php echo form_open('admin/updateProcesseur/'.$rowUpdate->processeur_id) ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputProcLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputProcLib" class="control-label col-xs-2">Libellé</label>    
    <div class="col-xs-10">
      <input type="text" class="form-control" name="inputProcLib" value  = "<?php echo $procLib ; ?>">
    </div>
  </div>
</div>    

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputProcCoeff','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputProcCoeff" class="control-label col-xs-2">Coefficient</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputProcCoeff" value  = "<?php echo $procCoeff ; ?>">
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputProcCoeffJeu','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputProcCoeffJeu" class="control-label col-xs-2">Coefficient jeu</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputProcCoeffJeu" value  = "<?php echo $procCoeffJeu ; ?>">            
      </div>
  </div>
</div>

<div class="form-group">  
  <div class = "row">
    <div class="col-xs-4">
      <input type="submit" class="form-control" value = "Enregistrez">            
    </div>
  </div>  
</div>  

<?php echo form_close() ;?>
</div>