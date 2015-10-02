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
  <?php echo form_open_multipart('admin/jeux') ;?>

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuLib" class="control-label col-xs-2">Libellé</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" name="inputJeuLib" placeholder="Libellé">
        </div>
      </div>        
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuBas','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuBas" class="control-label col-xs-2">IPPR BAS</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" name="inputJeuBas" placeholder="IPPR BAS">
        </div>
      </div>       
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuHaut','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuHaut" class="control-label col-xs-2">IPPR HAUT</label>    
        <div class="col-xs-10">
          <input type="text" class="form-control" name="inputJeuHaut" placeholder="IPPR HAUT">            
        </div>
      </div>
    </div>    

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputJeuUltra','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputJeuUltra" class="control-label col-xs-2">IPPR ULTRA</label>    
        <div class="col-xs-10">
          <input type="text" class="form-control" name="inputJeuUltra" placeholder="IPPR ULTRA">            
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
          <input type="submit" class="form-control" value = "Enregistrez">            
        </div>
      </div>  
    </div>  

    
<?php echo form_close();?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Libellé</th>                  
                  <th>IPPR BAS </th>
                  <th>IPPR HAUT</th>
                  <th>IPPR ULTRA </th>   
                  <th>Image</th>               
                  <th>Actions</th>               
                </tr>
              </thead>

              <tbody>
                <?php 
                    if ($row != null) : 
                        foreach ($row as $infoJeu): ?>
                            <tr>
                              <td><?php echo $infoJeu->jeu_id ; ?></td>
                              <td><?php echo $infoJeu->jeu_lib ; ?></td>
                              <td><?php echo $infoJeu->ipprBas ; ?></td>
                              <td><?php echo $infoJeu->ipprHaut ; ?></td>
                              <td><?php echo $infoJeu->ipprUltra ; ?></td>                              
                              <td><?php echo $infoJeu->jeu_img_path ; ?></td>
                              <td>
                                <button type="button" class="btn btn-default btn-default">
                                    <span class="glyphicon glyphicon-pencil"></span> 
                                    <a href="<?php echo site_url('admin/updateJeu/'.$infoJeu->jeu_id);?>">Editer</a>
                                </button>

                                <button type="button" class="btn btn-default btn-default">
                                    <span class="glyphicon glyphicon-remove"></span> 
                                     <a href="<?php echo site_url('admin/deleteJeu/'.$infoJeu->jeu_id);?>">Supprimer</a>
                                </button>
                            </td>  
                            </tr>
                <?php endforeach; endif;?>
                
  
              </tbody>
            </table>
          </div>


</div>
