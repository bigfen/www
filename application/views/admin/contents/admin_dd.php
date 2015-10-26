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
  <?php echo form_open('admin/rotations') ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputRotation','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputRotation" class="control-label col-xs-2">Rotation</label>          
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputRotation" placeholder="Rotation">            
      </div>   
  </div>
</div>    

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputRotationCoeff','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputRotationCoeff" class="control-label col-xs-2">Coefficient</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputRotationCoeff" placeholder="Coefficient">            
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
                  <th>Vitesse (T/min)</th>
                  <th>Coefficient</th>   
                  <th>Actions</th>               
                </tr>
              </thead>

              <tbody>
                <?php 
                    if ($row != null) : 
                        foreach ($row as $infoRotation): ?>
                            <tr>
                              <td><?php echo $infoRotation->rotation_id ; ?></td>                              
                              <td><?php echo $infoRotation->rotation_vitesse ; ?></td>                              
                              <td><?php echo $infoRotation->rotation_coeff ; ?></td>                              
                              <td>
                                  
                                  <a class="btn btn-default btn-default" href="<?php echo site_url('admin/updateRotation/'.$infoRotation->rotation_id);?>">Editer <span class="glyphicon glyphicon-pencil"></span> </a>
                               <!--  <button type="button" class="btn btn-default btn-default">
                                </button>

                                <button type="button" class="btn btn-default btn-default">
                                </button> -->
                                   
                                  <a class="btn btn-default btn-default" href="<?php echo site_url('admin/deleteRotation/'.$infoRotation->rotation_id);?>">Supprimer <span class="glyphicon glyphicon-remove"></span></a>
                            </td>  
                            </tr>
                <?php endforeach; endif;?>
                
  
              </tbody>
            </table>
          </div>

</div>