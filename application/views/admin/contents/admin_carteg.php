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
  <?php echo form_open('admin/cartesgraphique/') ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputCarteLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputCarteLib" class="control-label col-xs-2">Libellé</label>    
    <div class="col-xs-10">
      <input type="text" class="form-control" name="inputCarteLib" placeholder="Libellé">            
    </div>
  </div>
</div>    

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputCarteCoeff','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputCarteCoeff" class="control-label col-xs-2">Coefficient</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputCarteCoeff" placeholder="Coefficient">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputCarteCoeffJeu','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputCarteCoeffJeu" class="control-label col-xs-2">Coefficient dans le jeu</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputCarteCoeffJeu" placeholder="Coefficient dans le jeu">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputCartCoeffPrix','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputCartCoeffPrix" class="control-label col-xs-2">Coefficient Prix</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputCartCoeffPrix" placeholder="Coefficient du prix">            
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
  <table id = "tableCarte" class="display table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Libellé</th>
        <th>Coefficient</th>   
        <th>Coefficient dans le jeu</th>  
        <th>Actions</th>               
      </tr>
    </thead>

    <tbody>
      <?php 
          if ($row != null) : 
              foreach ($row as $infoCarte): ?>
                  <tr>
                    <td><?php echo $infoCarte->cartegraph_id ; ?></td>
                    <td><?php echo $infoCarte->cartegraph_lib ; ?></td>
                    <td><?php echo $infoCarte->cartegraph_coeff ; ?></td>
                    <td><?php echo $infoCarte->cartegraph_coeff_jeu ; ?></td>
                    <td>
                      <!-- <button type="button" class="btn btn-default btn-default"> -->
                           
                        <a class="btn btn-default btn-default" href="<?php echo site_url('admin/updateCarte/'.$infoCarte->cartegraph_id);?>">Editer <span class="glyphicon glyphicon-pencil"></span></a>
                      <!-- </button>
 -->
                      <!-- <button type="button" class="btn btn-default btn-default"> -->
                           
                           <a class="btn btn-default btn-default" href="<?php echo site_url('admin/deleteCarte/'.$infoCarte->cartegraph_id);?>">Supprimer <span class="glyphicon glyphicon-remove"></span></a>
                      <!-- </button> -->
                  </td>  
                  </tr>
      <?php endforeach; endif;?>
    </tbody>
  </table>
</div>


</div>