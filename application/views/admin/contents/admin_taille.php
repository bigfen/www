 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
</h1>

<?php echo form_open('admin/tailles') ;?>
<h2>Ajouter une taille</h2>
<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputTailleLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputTailleLib" class="control-label col-xs-2">Type</label>    
    <div class="col-xs-10">
      <input type="text" class="form-control" name="inputTailleLib" placeholder="Taille d'écran">            
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

<div class="table-responsive">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Taille</th>
        <th>Actions</th>               
      </tr>
    </thead>

    <tbody>
      <?php 
          if ($row != null) : 
              foreach ($row as $infoTaille): ?>
                  <tr>
                    <td><?php echo $infoTaille->taille_id ; ?></td>
                    <td><?php echo $infoTaille->taille_lib ; ?></td>
                    <td>
                     
                          <a href="<?php echo site_url('admin/updateTaille/'.$infoTaille->taille_id);?>">
                            <button type="button" class="btn btn-default btn-default">
                              <span class="glyphicon glyphicon-pencil"></span>Editer
                            </button>
                          </a>
                          
                          <a href="<?php echo site_url('admin/deleteTaille/'.$infoTaille->taille_id);?>">
                            <button type="button" class="btn btn-default btn-default">
                              <span class="glyphicon glyphicon-remove"></span>Supprimer
                           </button>
                          </a>
                     
                  </td>  
                  </tr>
      <?php endforeach; endif;?>
      

    </tbody>
  </table>
</div>


</div>
