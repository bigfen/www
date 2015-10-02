<div class="container-fluid">
	<div class="row"><!--Row1-->
	<br><br>

	<?php if (isset($IPJ)) : ?>
		<?php echo form_open('compatibilitejeu/compatibiliteResultIpj'); ?>
		<div class="col-md-4 col-md-offset-2">
			<div class="panel panel-primary text-center">
				<div class="panel-heading">
					Indice de puissance
				</div>
				<div  class="panel-body text-center">
					<p id = "IPJ"><?php echo $IPJ ; ?></p>
					<input type = "hidden" value = "<?php echo $IPJ ; ?>" name = "inputipjConfigHidden">
					<canvas class="indicePuissance" width="130" height="130"></canvas>
				</div>
			</div>
		</div>

	<?php else : ?>
	<?php echo form_open('compatibilitejeu/compatibiliteResultPc'); ?>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					Marque 
				</div>

				<div class="panel-body text-center">
					<select id  = "marque" class="form-control" name = "inputPCMarque">
						<option selected="selected">Choisissez une marque</option>
					<?php if($rowMarque) : ?>
						<?php foreach($rowMarque as $marqueSelect) : ?>
						<option value = "<?php echo $marqueSelect->marque_id ; ?>"><?php echo $marqueSelect->marque_lib?></option>
					<?php endforeach ; endif ; ?>
					</select>  
				</div>
			</div>
		</div>

		<div id = "panelMarque" class="col-md-4">
			<div class=" panel panel-default">
				<div class="panel-heading text-center">
					Modèle
				</div>

				<div id = "modelesPc"class="panel-body">
					<select id = "selectPC" class="form-control" name = "inputPc">
						<!-- =========================SE REMPLIT PAR REQUETE AJAX =================================-->
					</select> 
				</div>
			</div>			
		</div>	

	<?php endif ; ?>

		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					Jeu
				</div>
				<div class="panel-body">
					<select class="form-control" name = "inputJeu">
						<option selected="selected">Choisissez un jeu</option>
					<?php if($rowJeu) : ?>
						<?php foreach($rowJeu as $jeuSelect) : ?>
						<option value = "<?php echo $jeuSelect->jeu_id ; ?>"><?php echo $jeuSelect->jeu_lib?></option>

					<?php endforeach ; endif ; ?>

					</select>   
				</div>
			</div>		
		</div> 

		
	</div><!--Row1-->
	

<?php if(isset($resolutionHaute, $resolutionBasse)) : ?>
	<div class="row"><!--Row2 -->
		<br>
		<div class="col-md-4 col-md-offset-2 text-center">
			<div class="panel panel-default">
				<div class="panel-heading text-center ">
					<p>Résolution Haute</p>
					<p>Graphismes elevés</p>
				</div>
				<div class="panel-body">
					<?php echo $resolutionHaute ;  ?>
				</div>
			</div>
		</div>	

		<div class="col-md-4 text-center">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<p>Résolution basse</p>	
					<p>Graphismes bas</p>
				</div>
				<div class="panel-body">
					<?php echo $resolutionBasse ;  ?>
				</div>
			</div>
		</div>	
	</div><!--Row2 -->

	<div class="row"><!--Row2 -->
		<br>
		<div class="col-md-8 col-md-offset-2">
			<h3 class = "text-center">Taux de compatibilité optimale obtenue</h3>
			<div class="progress">
			<?php if(isset($tauxCompatibilite)) : ?>
				<div class="progress-bar progress-bar-success" style="width:<?php  echo $tauxCompatibilite; ?>%">
					<span class = "text-center"><?php  echo $tauxCompatibilite; ?>%</span>
				</div>
			<?php endif ;  ?>				
			</div>
		</div>	
	</div><!--Row2 -->
<?php else : ?>
	<div class="row text-center">
		<br>
		<div class="col-md-12 ">
			<input class = "btn btn-primary" type = "submit" value ="Résultat" >
		</div>
	</div>
	
<?php endif ; ?>
<?php echo form_close();?>
</div><!-- container fluid-->


<script type="text/javascript">
var percentIPJ = parseInt($("#IPJ").text()) ; 
$(".indicePuissance").mambo({	
	label : percentIPJ,
	displayValue : false,						  
	circleColor : '#14294c',
	ringColor : "#3577be ",	
	drawShadow : true
});
</script>

<script type="text/javascript">
$(document).ready(function(){
	$("#marque").change(function()		
	{
		
		$.ajax({
			url : "<?php echo site_url(); ?>/compatibilitejeu/ajaxModeleByMarque",
			data : {marqueId: $(this).val()},
			type : "POST",
			success : function(data){				
				$("#selectPC").html(data) ; 
			}
		})
	}) ;
});
</script>