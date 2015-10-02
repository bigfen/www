<div class = "container-fluid" id = "compare_select">
  <div class = "row">

    <?php echo form_open('comparepc/compareTwoPc/'.$pcId) ; ?>

    <div class = "col-md-6 text-center " id = "pc1">
      <div class = "col-md-12">
        <img class="img" src="<?php echo base_url();?>bootstrap/img/computer.png" alt="Generic pc">
        <h3>Ordinateur 1</h3>

        <div class="form-group">
          <div class = "row">
            <div class="col-md-2">
              <label for="inputPCMarque" class="control-label">Marque</label>     
            </div> 
            <div class="col-md-10">              
              <input id = "Pc1" class = "form-control" value = "<?php echo $marqueLib ; ?>" readonly> 
            </div>  
          </div>
        </div>

        <div class="form-group">
          <div class="row">
            <div class = "col-md-2">    
              <label for="InputPCMod" class="control-label">Modèle</label> 
            </div> 
            <div class="col-md-10">            
              <input name = "InputPCMod" class = "form-control" value = "<?php echo $pcLib ; ?>" readonly>
            </div>    
          </div>            
        </div>  

      <div class="form-group">
        <p>   
          <label for="inputPcPrix" class="control-label">Saisissez votre prix</label> 
          <?php echo form_error('inputPcPrix','<p><div class="alert alert-danger" role="alert">','</div></p>');?>            
          <?php echo form_error('hiddenPrix','<p"><div class="alert alert-danger" role="alert">','</div></p>');?>
          <input id = "prix" type="text" class="form-control" name="inputPcPrix" placeholder="Prix"> 
        </p>  
      </div>  

    </div><!-- /.col-md-12r --> 
  </div><!-- /.col-md-6 text-center -->

  <!--====================================2ème pc ===================================================-->

  <div class = "col-md-6 text-center"  id = "pc2">
    <div class = "col-md-12">
      <img class="img" src="<?php echo base_url();?>bootstrap/img/computer.png" alt="Generic pc">
      <h3>Ordinateur 2</h3>

      <div class="form-group">
        <p>
          <?php echo form_error('inputPCMarque2','<p><div class="alert alert-danger" role="alert">','</div></p>');?>              
          <select id = "marque2" name = "inputPCMarque2" class="form-control">
            <option value = "0" selected="selected">Choisissez une marque</option>
          <?php if($rowMarque) : ?>
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

    <input id = "inpHiddenPc" type = "hidden" value = "" name = "hiddenPc">
    <input id = "inpHiddenPrix" type = "hidden" value = "" name = "hiddenPrix" >

     <div class="form-group">
        <p>
          <label for="inputPcPrix2" class="control-label">Saisissez le prix : </label>
          <?php echo form_error('inputPcPrix2','<p><div class="alert alert-danger" role="alert">','</div></p>');?>            
          <input id = "prix" type="text" class ="form-control" name ="inputPcPrix2" placeholder ="Prix">            
        </p>
      </div>

    </div><!-- /.col-md-12r --> 
  </div><!-- /.col-md-6 text-center -->

</div><!-- /.row --> 

  <div class="form-group">  
    <div class = "row">
      <div class="col-md-12 text-center">
        <input type = "submit" name ="inpCompare" class="btn btn-primary" value = "Comparer"/>            
      </div>
    </div>  
  </div>  
 </div><!--row-->
</div><!-- /.container -->
<?php echo form_close() ; ?>


<!-- La fin de la <div class="container "> est dans le footer -->
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
	var pcId = <?php echo $this->uri->segment(3)?> ; 
  	$("#inpHiddenPc").attr('value', pcId) ; 
  	// alert(pcId) ; 
});
</script>

<script type="text/javascript">
  $(document).ready(function(){        
      $("#prix").keyup(function(){
        var prix = $("#prix").val() ; 
        $("#inpHiddenPrix").attr('value', prix) ; 
        //alert($("#inpHiddenPrix").val()) ; 
        //alert(prix) ; 
      }) ;        
  });
</script>





