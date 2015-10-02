<div class="container text-center" id="compare_select">
  <div class = "row">

    <?php echo form_open('comparepc/resultPC') ; ?>

    <div class="col-md-6 text-center " id="pc1">
      <div class="col-md-12" >
        <img class="img" src="<?php echo base_url();?>bootstrap/img/computer.png" alt="Generic placeholder image">
        <h3>Ordinateur 1</h3>

      <div class="form-group">
        <p>
          <?php echo form_error('inputPCMarque','<p><div class="alert alert-danger" role="alert">','</div></p>');?>              
          <select id = "marque" name = "inputPCMarque" class="form-control">
            <option value = "0" selected ="selected">Choisissez une marque</option>
          <?php if($row) : ?>
            <?php foreach($rowMarque as $marqueSelect) : ?>
            <option value = "<?php echo $marqueSelect->marque_id ; ?>"><?php echo $marqueSelect->marque_lib?></option>
            <?php endforeach ; endif ; ?>
          </select>
        </p>
      </div>

      <div class="form-group">
        <p>
          <?php echo form_error('InputPCMod','<p"><div class="alert alert-danger" role="alert">','</div></p>');?>           
          <?php echo form_error('hiddenPc','<p"><div class="alert alert-danger" role="alert">','</div></p>');?>
          <select id = "selectPC" class="form-control" name = "InputPCMod">
            <option value = "0" selected="selected">Choisissez un modèle</option>
            <!--=================FILL BY AJAX REQUEST==============================================-->
          </select>
        </p>
      </div>

      <div class="form-group">
        <p>
          <label class="control-label">Comparez les offres et trouver le meilleur prix sur : </label>
         
          <a href="http://www.i-comparateur.com" target="_blank"><img src="http://www.i-comparateur.com/images/pubs/s234x60_01.gif" alt="Acheter moins cher avec i-Comparateur" border="0" /></a>
        </p>
      </div>

      <div class="form-group">
        <p>
          <label for="inputPcPrix" class="control-label">Saisissez votre prix : </label>
          <?php echo form_error('inputPcPrix','<p><div class="alert alert-danger" role="alert">','</div></p>');?>            
          <?php echo form_error('hiddenPrix','<p><div class="alert alert-danger" role="alert">','</div></p>');?>            
          <input id = "prix" type="text" class ="form-control" name ="inputPcPrix" placeholder ="Prix">            
        </p>
      </div>

      <div class="form-group">  
        <div class = "row">          
          <div class="col-md-12 text-center">
            <input name = "inpResultat" class="btn btn-primary" type="submit" class="form-control" value = "Résultats">            
          </div>
        </div>  
      </div> 

    </div><!-- /.col-md-12r --> 
  </div><!-- /.col-md-6 text-center -->
<?php echo form_close(); ?> 



  <!--=======================2eme pc à comparer =========================================-->
 <?php echo form_open('comparepc/comparePc') ; ?>

  <div class = "col-md-6 text-center" id="pc2">
    <div class="col-md-12" >
      <img class="img" src="<?php echo base_url();?>bootstrap/img/computer.png" alt="Generic placeholder image">
      <h3>Ordinateur 2</h3>

      <div class="form-group">
        <p>
          <?php echo form_error('inputPCMarque2','<p><div class="alert alert-danger" role="alert">','</div></p>');?>              
          <select id = "marque2" name = "inputPCMarque2" class="form-control">
            <option value = "0" selected="selected">Choisissez une marque</option>
          <?php if($row) : ?>
            <?php foreach($rowMarque as $marqueSelect) : ?>
            <option value = "<?php echo $marqueSelect->marque_id ; ?>"><?php echo $marqueSelect->marque_lib?></option>
          <?php endforeach ; endif ; ?>
        </select>
      </p>
    </div>

    <div class="form-group">
      <p>
        <?php echo form_error('InputPCMod2','<p><div class="alert alert-danger" role="alert">','</div></p>');?>           
        <select id = "selectPc2" class="form-control" name = "InputPCMod2">
          <option value = "0" selected="selected">Choisissez un modèle</option>
          <!--=================FILL BY AJAX REQUEST==============================================-->
        </select>
      </p>
    </div>

    <div class="form-group">
        <p>
          <label class="control-label">Comparez les offres et trouver le meilleur prix sur : </label>
          <a href="http://www.i-comparateur.com" target="_blank"><img src="http://www.i-comparateur.com/images/pubs/s234x60_01.gif" alt="Acheter moins cher avec i-Comparateur" border="0" /></a>
        </p>
      </div> 

    <input id = "inpHiddenPc" type = "hidden" value = "" name = "hiddenPc">
    <input id = "inpHiddenPrix" type = "hidden" value = "" name = "hiddenPrix" >

     <div class="form-group">
        <p>
          <label for="inputPcPrix2" class="control-label">Saisissez le prix : </label>
          <?php echo form_error('inputPcPrix2','<p><div class="alert alert-danger" role="alert">','</div></p>');?>            
          <input id = "prix" type="text" class ="form-control" name ="inputPcPrix2" placeholder ="Prix">            
        </p>
      </div>

    <div class="form-group">  
      <div class = "row">
        <div class="col-md-12 text-center">
          <input type = "submit" name ="inpCompare" class="btn btn-primary" value = "Comparer"/>            
        </div>
      </div>  
    </div>  


    <?php echo form_close(); ?>  
      </div><!-- /.col-md-12 -->
    </div><!-- /.col-md-6 -->
  </div><!-- /.row -->
</div><!-- /.container fluid -->


<!-- La fin de la <div class="container "> est dans le footer -->
<script type="text/javascript">
$(document).ready(function(){
  $("#marque").change(function()    
  {
    $.ajax({
      url : "<?php echo site_url(); ?>/comparepc/ajaxModeleByMarque",
      data : {marqueId: $(this).val()},
      type : "POST",
      success : function(data){       
        $("#selectPC").html(data) ; 
      }
    })
  }) ;
});
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#marque2").change(function()    
  {
    $.ajax({
      url : "<?php echo site_url(); ?>/comparepc/ajaxModeleByMarque",
      data : {marqueId: $(this).val()},
      type : "POST",
      success : function(data){       
        $("#selectPc2").html(data) ; 
      }
    })
  }) ;
});
</script>



<script type="text/javascript">
$(document).ready(function(){
  $("#selectPC").change(function()    
  {
    $("#selectPC option:selected").each(function(){
      var pcId = $(this).val() ; 
      $("#inpHiddenPc").attr('value', pcId) ; 
      //alert($("#inpHiddenPc").val()) ;
    })   
  }) ;  
});
</script>

<script type="text/javascript">
$(document).ready(function(){        
  $("#prix").change(function(){
    var prix = $("#prix").val() ; 
    $("#inpHiddenPrix").attr('value', prix) ; 
    //alert($("#inpHiddenPrix").val()) ; 
  }) ;        
});
</script>