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
  <?php echo form_open('admin/categories') ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputCatLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputCatLib" class="control-label col-xs-2">Libellé</label>          
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputCatLib" placeholder="Libellé">            
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
                  <th>Libellé</th>                    
                  <th>Actions</th>               
                </tr>
              </thead>

              <tbody>
                <?php 
                    if ($row != null) : 
                        foreach ($row as $infoCat): ?>
                            <tr>
                              <td><?php echo $infoCat->categorie_id ; ?></td>                              
                              <td><?php echo $infoCat->categorie_lib ; ?></td>                              
                                                          
                              <td>
                                <button type="button" class="btn btn-default btn-default">
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                    <a href="<?php echo site_url('admin/updateCategorie/'.$infoCat->categorie_id);?>">Editer</a>
                                </button>

                                <button type="button" class="btn btn-default btn-default">
                                    <span class="glyphicon glyphicon-remove"></span> 
                                     <a href="<?php echo site_url('admin/deleteCategorie/'.$infoCat->categorie_id);?>">Supprimer</a>
                                </button>
                            </td>  
                            </tr>
                <?php endforeach; endif;?>
                
  
              </tbody>
            </table>
          </div>

</div>