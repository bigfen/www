 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
</h1>
<div class="table-responsive">
  <?php echo form_open_multipart('admin/marques') ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputMarqueLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputMarqueLib" class="control-label col-xs-2">Marque libellé</label>          
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputMarqueLib" placeholder="Marque libellé">            
      </div>   
  </div>
</div>    

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputMarquePath','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputMarquePath" class="control-label col-xs-2">Image</label>
      <div class="col-xs-10">
        <input type="file" class="form-control" name="inputMarquePath" placeholder="Image">            
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
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Marques</th> 
                  <th>Chemin image</th>                 
                  <th>Actions</th>               
                </tr>
              </thead>

              <tbody>
                <?php 
                    if ($row != null) : 
                        foreach ($row as $infoMarques): ?>
                            <tr>
                              <td><?php echo $infoMarques->marque_id ; ?></td>
                              <td><?php echo $infoMarques->marque_lib ; ?></td>                              
                              <td><?php echo $infoMarques->marque_img_path ; ?></td>                              
                                                           
                              <td>
                                <!-- <button type="button" class="btn btn-default btn-default">
                                </button> -->
                                 
                                <a class="btn btn-default btn-default" href="<?php echo site_url('admin/updateMarque/'.$infoMarques->marque_id);?>">Editer <span class="glyphicon glyphicon-pencil"></span></a>

                                <!-- <button type="button" class="btn btn-default btn-default">
                                </button> -->
                                 
                                <a class="btn btn-default btn-default" href="<?php echo site_url('admin/deleteMarque/'.$infoMarques->marque_id);?>">Supprimer <span class="glyphicon glyphicon-remove"></span></a>
                            </td>  
                            </tr>
                <?php endforeach; endif;?>
                
  
              </tbody>
            </table>
          </div>

</div>