 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
</h1>


<?php echo form_open_multipart('admin/updatePc/'.$rowUpdate->pc_id) ;?>

<div class="form-group">
  <div class = "row">
    <?php echo form_error('inputPCLib','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
    <label for="inputPCLib" class="control-label col-xs-2">Libellé</label>    
    <div class="col-xs-10">
      <input type="text" class="form-control" name="inputPCLib" value="<?php echo $pcLib ; ?>">            
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
        <textarea rows = "3" class="form-control" name="inputPCDescript"><?php echo $pcDescript ; ?></textarea>           
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
              <option value = "<?php echo $marqueSelect->marque_id ; ?>" <?php echo ($rowUpdate->pc_marque_id==$marqueSelect->marque_id)?'selected="selected"':''; ?> ><?php echo $marqueSelect->marque_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>               
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCScore','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCScore" class="control-label col-xs-2">Score</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPCScore" value="<?php echo $pcScore ; ?>">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCIpj','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCIpj" class="control-label col-xs-2">IPJ</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPCIpj" value="<?php echo $pcIPJ ; ?>">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCGamer','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCGamer" class="control-label col-xs-2">PC gamer</label>
      <div class="col-xs-10">
        <select class="form-control" name = "inputPCGamer">
          <option selected="selected">Sélection gamer</option>
          <option value = "1" <?php echo ($rowUpdate->pc_gamer==1)?'selected="selected"':''; ?> >1/Oui</option>
          <option value = "0" <?php echo ($rowUpdate->pc_gamer==0)?'selected="selected"':''; ?> >0/Non</option>      
        </select>                  
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php echo form_error('InputPCCat','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="InputPCCat" class="control-label col-xs-2">Catégories</label>
      <div class="col-xs-10">
        <select class="form-control" name ="InputPCCat">         
          <option>Sélectionner une catégorie</option> 
          <?php if($rowCateg) : ?>
            <?php foreach($rowCateg as $categSelect) : ?>
                <option value = "<?php echo $categSelect->categorie_id ; ?>" <?php echo ($rowUpdate->pc_categorie==$categSelect->categorie_id)?'selected="selected"':''; ?> ><?php echo $categSelect->categorie_lib?></option>                        
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
         <option selected="selected">Choisissez une taille d'écran</option>
           <?php if($rowTaille) : ?>
            <?php foreach($rowTaille as $tailleSelect) : ?>
              <option value = "<?php echo $tailleSelect->taille_id ; ?>" <?php echo ($rowUpdate->pc_taille_ecran==$tailleSelect->taille_id)?'selected="selected"':''; ?> ><?php echo $tailleSelect->taille_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>          
      </div>
  </div>
</div> 

<!-- <div class="form-group">
   <div class = "row">
      <?php //echo form_error('inputPcLien1','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien1" class="control-label col-xs-2">Lien</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien1" value ="<?php //echo $pcLienF ; ?>">            
      </div>
  </div>
</div>  

<div class="form-group">
   <div class = "row">
      <?php //echo form_error('inputPcLien3','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien3" class="control-label col-xs-2">Lien</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien3" value ="<?php //echo $pcLienA ; ?>">            
      </div>
  </div>
</div>

<div class="form-group">
   <div class = "row">
      <?php //echo form_error('inputPcLien2','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPcLien2" class="control-label col-xs-2">Lien</label>
      <div class="col-xs-10">
        <input type="text" class="form-control" name="inputPcLien2" value ="<?php //echo $pcLienM ; ?>">            
      </div>
  </div>
</div>  -->

<div class="form-group">
   <div class = "row">
      <?php echo form_error('inputPCPath','<div class = "row"><div class="alert alert-danger" role="alert">','</div></div>');?>
      <label for="inputPCPath" class="control-label col-xs-2">Image</label>
      <div class="col-xs-10">
        <input type="file" class="form-control" name="inputPCPath" >            
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


</div>