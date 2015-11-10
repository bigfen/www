<div class="col-sm-9 col-md-10 main">

    <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
  </p>

  <h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
  </h1>

  <?php echo form_open('admin/processeurs') ;?>

  <div class="form-group">
    <div class = "row">
      <?php echo form_error('inputProcLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
      <label for="inputProcLib" class="control-label col-xs-2">Libellé</label>    
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputProcLib" placeholder="Libellé">            
      </div>
    </div>
  </div>    

  <div class="form-group">
     <div class = "row">
        <?php echo form_error('inputProcCoeff','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
        <label for="inputProcCoeff" class="control-label col-xs-2">Coefficient</label>
        <div class="col-xs-10">
          <input type="text" class="form-control" name="inputProcCoeff" placeholder="Coefficient">            
        </div>
    </div>
  </div>  

  <div class="form-group">
     <div class = "row">
        <?php echo form_error('inputProcCoeffJeu','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
        <label for="inputProcCoeffJeu" class="control-label col-xs-2">Coefficient jeu</label>
        <div class="col-xs-10">
          <input type="text" class="form-control" name="inputProcCoeffJeu" placeholder="Coefficient dans le jeu">            
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
          <th>Libellé</th>
          <th>Coefficent</th>        
          <th>Coefficent jeu</th>
          <th>Actions</th>            
        </tr>
      </thead>

      <tbody>
        <?php 
            if ($row != null) : 
                foreach ($row as $infoProcess): ?>
                    <tr>
                      <td><?php echo $infoProcess->processeur_id ; ?></td>
                      <td><?php echo $infoProcess->processeur_lib ; ?></td> 
                      <td><?php echo $infoProcess->processeur_coeff ; ?></td>                                                       
                      <td><?php echo $infoProcess->processeur_coeff_jeu ; ?></td>
                      <td>
                        
                        <a href="<?php echo site_url('admin/updateProcesseur/'.$infoProcess->processeur_id);?>">
                          <button type="button" class="btn btn-default btn-default">
                            <span class="glyphicon glyphicon-pencil"></span> Editer
                          </button>
                        </a>
                        
                         <a href="<?php echo site_url('admin/deleteProcesseur/'.$infoProcess->processeur_id);?>">
                          <button type="button" class="btn btn-default btn-default">
                            <span class="glyphicon glyphicon-remove"></span> Supprimer
                          </button>
                        </a>
                    
                    </td>  
                    </tr>
        <?php endforeach; endif;?>
        

      </tbody>
    </table>
  </div>
</div>