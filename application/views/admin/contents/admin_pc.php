 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;  ?>   

</h1>

<?php echo form_open_multipart('admin/pc/') ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputPCLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputPCLib" class="control-label col-xs-2">Libellé</label>    
    <div class="col-xs-10">
      <input type="text" class="form-control" name="inputPCLib" placeholder="Libellé">            
    </div>
  </div>
</div>    

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputRamid','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputRamid" class="control-label col-xs-2">Ram</label>    
    <div class="col-xs-10">
      <select class="form-control" name = "inputRamid">
          <option selected="selected">Choisissez une Ram</option>
          <?php if($rowRam) : ?>
            <?php foreach($rowRam as $RamSelect) : ?>
              <option value = "<?php echo $RamSelect->ram_id ; ?>"><?php echo $RamSelect->ram_lib?></option>
          <?php endforeach ; endif ; ?>
      </select>                     
    </div>
  </div>
</div> 

<div class="form-group">
   <div class = "row">
      <?php echo form_error('InputPCCarte','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="InputPCCarte" class="control-label col-xs-2">Carte graphique</label>
      <div class="col-xs-10">
        <select class="form-control" name = "InputPCCarte">
          <option selected="selected">Choisissez une carte graphique</option>
          <?php if($rowCarte) : ?>
            <?php foreach($rowCarte as $carteSelect) : ?>
              <option value = "<?php echo $carteSelect->cartegraph_id ; ?>"><?php echo $carteSelect->cartegraph_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>                 
      </div>
  </div>
</div>

<div class="form-group">
   <div class = "row">
      <?php echo form_error('InputPCproc','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="InputPCproc" class="control-label col-xs-2">Processeur</label>
      <div class="col-xs-10">
        <select class="form-control" name = "InputPCproc">
          <option selected="selected">Choisissez un processeur</option>
          <?php if($rowproc) : ?>
            <?php foreach($rowproc as $procSelect) : ?>
              <option value = "<?php echo $procSelect->processeur_id ; ?>"><?php echo $procSelect->processeur_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>                 
      </div>
  </div>
</div>

<div class="form-group">
   <div class = "row">
      <?php echo form_error('InputPCrot','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="InputPCrot" class="control-label col-xs-2">Rotation</label>
      <div class="col-xs-10">
        <select class="form-control" name = "InputPCrot">
          <option selected="selected">Choisissez une rotation</option>
          <?php if($rowrot) : ?>
            <?php foreach($rowrot as $rotSelect) : ?>
              <option value = "<?php echo $rotSelect->rotation_id ; ?>"><?php echo $rotSelect->rotation_vitesse?></option>
          <?php endforeach ; endif ; ?>
        </select>                 
      </div>
  </div>
</div> 

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCDescript','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCDescript" class="control-label col-xs-2">Description</label>
      <div class="col-xs-10">
        <textarea rows = "3" class="form-control" name="inputPCDescript" placeholder="Description"></textarea>        
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCMarque','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCMarque" class="control-label col-xs-2">Marque</label>
      <div class="col-xs-10">
         <select class="form-control" name = "inputPCMarque">
          <option selected="selected">Choisissez une marque</option>
          <?php if($rowMarque) : ?>
            <?php foreach($rowMarque as $marqueSelect) : ?>
              <option value = "<?php echo $marqueSelect->marque_id ; ?>"><?php echo $marqueSelect->marque_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>               
      </div>
  </div>
</div>  

<!-- <div class="form-group">
   <div class = "row">
      <?php //echo form_error('inputPCScore','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCScore" class="control-label col-xs-2">Score</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPCScore" placeholder="Score qualité">            
      </div>
  </div>
</div>   -->

<!-- <div class="form-group">
   <div class = "row">
      <?php //echo form_error('inputPCIpj','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCIpj" class="control-label col-xs-2">IPJ</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPCIpj" placeholder="IPJ">            
      </div>
  </div>
</div> -->


<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCGamer','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCGamer" class="control-label col-xs-2">PC gamer</label>
      <div class="col-xs-10">
        <select class="form-control" name = "inputPCGamer">
          <option selected="selected">Sélection gamer</option>
          <option value ="1">1/Oui</option>
          <option value ="0">0/Non</option>         
        </select>                  
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('InputPCCat','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="InputPCCat" class="control-label col-xs-2">Catégories</label>
      <div class="col-xs-10">
        <select class="form-control" name = "InputPCCat">
          <option selected="selected">Choisissez une catégorie</option>
          <?php if($rowCateg) : ?>
            <?php foreach($rowCateg as $categSelect) : ?>
              <option value = "<?php echo $categSelect->categorie_id ; ?>"><?php echo $categSelect->categorie_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>                 
      </div>
  </div>
</div> 

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCTaille','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCTaille" class="control-label col-xs-2">Taille écran</label>
      <div class="col-xs-10">
         <select class="form-control" name = "inputPCTaille">
          <option selected="selected">Choisissez une taille d'écran</option>
           <?php if($rowTaille) : ?>
            <?php foreach($rowTaille as $tailleSelect) : ?>
              <option value = "<?php echo $tailleSelect->taille_id ; ?>"><?php echo $tailleSelect->taille_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>          
      </div>
  </div>
</div> 

<!-- <div class="form-group">
   <div class = "row">
      <?php// echo form_error('inputPcLien1','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien1" class="control-label col-xs-2">Lien 1</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien1" placeholder="NomRevendeur ; lien vers le site">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php// echo form_error('inputPcLien2','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien2" class="control-label col-xs-2">Lien 2</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien2" placeholder="NomRevendeur ; lien vers le site">            
      </div>
  </div>
</div>

<div class="form-group">
   <div class = "row">
      <?php// echo form_error('inputPcLien3','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien3" class="control-label col-xs-2">Lien 3</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien3" placeholder="NomRevendeur ; lien vers le site">            
      </div>
  </div>
</div>



<div class="form-group">
   <div class = "row">
      <?php// echo form_error('inputPcLien4','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien4" class="control-label col-xs-2">Lien 4</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien4" placeholder="NomRevendeur ; lien vers le site">            
      </div>
  </div>
</div>

<div class="form-group">
   <div class = "row">
      <?php //echo form_error('inputPcLien5','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien5" class="control-label col-xs-2">Lien 5</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien5" placeholder="NomRevendeur ; lien vers le site">            
      </div>
  </div>
</div> -->

<div class="form-group">


<div class="form-group">
  <div class = "row">
        <?php if(isset($error_upload)) : ?>
        <div class = "row"> 
          <div class="alert alert-danger " role="alert">
            <p><?php echo $error_upload ; ?></p>
          </div>
        </div>
      <?php endif; ?>
  </div> 
   <div class = "row">
      <?php echo form_error('inputPCPath','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCPath" class="control-label col-xs-2">Image</label>
      <div class="col-xs-10">
        <input type="file" class="form-control" name="inputPCPath" placeholder="Image">            
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
                  <th>Ram</th>
                  <th>Carte graphique</th>
                  <th>Processeur</th>
                  <th>Rotation</th>
                  <th>Catégorie</th>
                  <th>Libellé</th>
                  <th>Description</th>   
                  <th>Marque</th> 
                  <th>Score</th>
                  <th>Gamer</th>  
                  <th>taille ecran</th>
                 <!--  <th>Lien 1</th>             
                  <th>Lien 2</th>
                  <th>Lien 3</th>
                  <th>Lien 4</th>
                  <th>Lien 5</th> -->
                  <th>Image</th>  
                  <th>Actions</th>               
                </tr>
              </thead>

              <tbody>
                <?php 
                    if ($row) : 
                        foreach ($row as $infoPC): ?>                        
                            <tr>
                              <td><?php echo $infoPC->pc_id ; ?></td>
                              <td><?php echo $infoPC->ram_lib ; ?></td>
                              <td><?php echo $infoPC->cartegraph_lib ; ?></td>
                              <td><?php echo $infoPC->processeur_lib ; ?></td>
                              <td><?php echo $infoPC->rotation_vitesse ; ?></td>
                              <td><?php echo $infoPC->categorie_lib ; ?></td>
                              <td><?php echo $infoPC->pc_lib ; ?></td>
                              <td><?php echo word_limiter($infoPC->pc_descript,5) ;  ?></td>
                              <td><?php echo $infoPC->marque_lib ; ?></td>
                              <td><?php echo $infoPC->processeur_coeff_jeu * $infoPC->cartegraph_coeff_jeu * $infoPC->ram_coeff_jeu ; ?></td>                               
                              <!-- <td><?php //echo $infoPC->pc_ipj ; ?></td> -->
                              <!-- <td><?php //echo $infoPC->pc_score ; ?></td> -->
                              <td><?php echo $gamer=($infoPC->pc_gamer== 1)?'Oui': 'Non' ; ?></td>
                              <td><?php echo $infoPC->taille_lib ; ?></td>
                              <!-- <td><?php //if(!empty($infoPC->pc_lien1)) : echo $infoPC->pc_lien1 ; endif ;  ?></td>
                              <td><?php //if(!empty($infoPC->pc_lien2)) : echo $infoPC->pc_lien2 ; endif ; ?></td>
                              <td><?php //if(!empty($infoPC->pc_lien3)) : echo $infoPC->pc_lien3 ; endif ; ?></td>
                              <td><?php //if(!empty($infoPC->pc_lien4)) : echo $infoPC->pc_lien4 ; endif ; ?></td>
                              <td><?php// if(!empty($infoPC->pc_lien5)) : echo $infoPC->pc_lien5 ; endif ; ?></td>-->

                              <td><img height="42" width="42" src="<?php echo base_url().'bootstrap/img/pc/'.$infoPC->pc_img_path;?>" alt="<?php echo "$infoPC->pc_img_path";?>"></td> 
                              <td>
                                <!-- <button type="button" class="btn btn-default btn-default"> -->
                                 
                                  <a class="btn btn-default btn-default" href="<?php echo site_url('admin/updatePc/'.$infoPC->pc_id);?>">Editer <span class="glyphicon glyphicon-pencil"></span></a>
                                <!-- </button> -->

                                <!-- <button type="button" class="btn btn-default btn-default"> --> 
                                  <a class="btn btn-default btn-default" href="<?php echo site_url('admin/deletePc/'.$infoPC->pc_id);?>">Supprimer <span class="glyphicon glyphicon-remove"></span></a> 
                                <!-- </button> -->
                            </td>  
                          </tr>
                <?php endforeach; endif;?>  
              </tbody>
            </table>
          </div>
</div>
