 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
</h1>

<?php echo form_open('admin/updateCarte/'.$rowUpdate->cartegraph_id) ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputCarteLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputCarteLib" class="control-label col-xs-2">Libellé</label>    
    <div class="col-xs-10">
      <input type="text" class="form-control" name="inputCarteLib" value="<?php  echo $carteLib ; ?>">            
    </div>
  </div>
</div>    

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputCarteCoeff','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputCarteCoeff" class="control-label col-xs-2">Coefficient</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputCarteCoeff" value = "<?php echo $carteCoeff; ?>">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputCarteCoeffJeu','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputCarteCoeffJeu" class="control-label col-xs-2">Coefficient dans le jeu</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputCarteCoeffJeu" value = "<?php echo $carteCoeffJeu; ?>">            
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
