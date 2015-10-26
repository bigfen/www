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
  <?php echo form_open('admin/rams') ;?>
<h2>Ajouter une</h2>
<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputRamLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputRamLib" class="control-label col-xs-2">Type</label>    
    <div class="col-xs-10">
      <input type="text" class="form-control" name="inputRamLib" placeholder="Type">            
    </div>
  </div>
</div>    

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputRamCoeff','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputRamCoeff" class="control-label col-xs-2">Coefficient</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputRamCoeff" placeholder="Coefficient">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputRamCoeffJeu','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputRamCoeffJeu" class="control-label col-xs-2">Coefficient jeu</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputRamCoeffJeu" placeholder="Coefficient dans le jeu">            
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
        <th>Type</th>
        <th>Coefficient</th>   
        <th>Coefficient jeu</th>
        <th>Actions</th>               
      </tr>
    </thead>

    <tbody>
      <?php 
          if ($row != null) : 
              foreach ($row as $infoRam): ?>
                  <tr>
                    <td><?php echo $infoRam->ram_id ; ?></td>
                    <td><?php echo $infoRam->ram_lib ; ?></td>
                    <td><?php echo $infoRam->ram_coeff ; ?></td> 
                    <td><?php echo $infoRam->ram_coeff_jeu ; ?></td> 
                    <td>
                      <!-- <button type="button" class="btn btn-default btn-default"> -->
                           
                          <a class="btn btn-default btn-default" href="<?php echo site_url('admin/updateRam/'.$infoRam->ram_id);?>">Editer <span class="glyphicon glyphicon-pencil"></span></a>
                      <!-- </button> -->

                      <!-- <button type="button" class="btn btn-default btn-default"> -->
                           
                           <a class="btn btn-default btn-default" href="<?php echo site_url('admin/deleteRam/'.$infoRam->ram_id);?>">Supprimer <span class="glyphicon glyphicon-remove"></span></a>
                      <!-- </button> -->
                  </td>  
                  </tr>
      <?php endforeach; endif;?>
      

    </tbody>
  </table>
</div>


</div>
