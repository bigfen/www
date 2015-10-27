<div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
  </p>

  <h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
  </h1>


<?php echo form_open('admin/updateCategorie/'.$rowUpdate->categorie_id) ;?>
<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputCatLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputCatLib" class="control-label col-xs-2">Libellé</label>          
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputCatLib" value ="<?php echo $catLib ; ?>">            
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