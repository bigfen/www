 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title; ?>    
</h1>

<?php echo form_open_multipart('admin/updateJeu/'.$rowUpdate->jeu_id) ;?>

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuLib" class="control-label col-xs-2">Libellé</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" name="inputJeuLib" value = "<?php  echo $jeuLib; ?>">
        </div>
      </div>        
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuBas','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuBas" class="control-label col-xs-2">IPPR BAS</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" name="inputJeuBas" value = "<?php  echo $ipprBas; ?>">
        </div>
      </div>       
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuHaut','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuHaut" class="control-label col-xs-2">IPPR HAUT</label>    
        <div class="col-xs-10">
          <input type="text" class="form-control" name="inputJeuHaut" value = "<?php  echo $ipprHaut ; ?>">            
        </div>
      </div>
    </div>    

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuUltra','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuUltra" class="control-label col-xs-2">IPPR ULTRA</label>    
        <div class="col-xs-10">
          <input type="text" class="form-control" name="inputJeuUltra" value = "<?php  echo $ipprUltra; ?>">            
        </div>
      </div>
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php if(isset($error_upload)) : ?>
        <div class = "row"> 
          <div class="alert alert-danger " role="alert">
            <p><?php echo $error_upload ; ?></p>
          </div>
        </div>
      <?php endif; ?>


        <label for="inputJeuPath" class="control-label col-xs-2">Image</label>    
        <div class="col-xs-10">
          <input type="file" class="form-control" name="inputJeuPath" placeholder="Image">            
        </div>
      </div>
    </div>  


    <div class="form-group">  
      <div class = "row">
        <div class="col-xs-4">
          <input type="submit" class="form-control" value = "Modifiez">            
        </div>
      </div>  
    </div>  

    
<?php echo form_close();?>
</div>
