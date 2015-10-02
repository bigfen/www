<div class = "container-fluid">
	<?php if(isset($pcLib, $pcImg, $ipjPc, $scorePc, $taille)) :  ?>
	<div class="panel-heading text-center" id="title_result">
		<h2><?php echo $pcLib ; ?></h2>
	</div>
	<div id = "container_result">
		<div class="row">		
		<br><br><br>

			<div class="col-md-4 text-center" id = "recap_pc_img">
				<div class="panel panel-default">

					<div class="panel-body"  id="panel_body_img">
						<div class="row">
							<img with = "300" height = "300" src="<?php echo base_url();?>/img/pc/<?php echo $pcImg ; ?>" alt="Image pc <?php echo $pcLib ; ?>">
						</div>
								         	
			         	 
			         	 <div class="row">
			         	 	<br>
			         	 	<div class="col-md-4 col-md-offset-4">
			         	 		<?php echo anchor_popup('comparepc/popupDetail/'.$pcId, 'Fiche technique', array('class'=>'btn btn-primary')) ?>
			         	 	</div>
			         	 </div>
					</div>
				</div>
			</div>

			<div class="col-md-4 rang_result" id="recap_pc_percent">			
				<div id="panel_body_percent">			

					<div class="panel-body">
						<div class="row">
							<p>Marque : <?php echo $marqueLib ; ?></p>
						

						<?php if(isset($prix)) : ?>
							<p>Votre prix : <?php echo $prix ; ?></p>					

						<?php else : ?>
							<?php echo form_open('comparepc/ratio/'.$pcId)?>
								<div class="form-group">
									<label for="inputPcPrix" class="col-md-4">Saisissez votre prix</label>  

									<div class="col-md-8">
										<?php echo form_error('inputPcPrix','<p><div class="alert alert-danger" role="alert">','</div></p>');?>            
										<input id = "prix" type="text" class="form-control" name="inputPcPrix" placeholder="Prix">            
									</div>
							    </div> 	

							    <div class="form-group">
							    	<div class="row">
							    		<div class="col-md-4 col-md-offset-5 text center">
							    			<input type = "submit" class="btn btn-primary" value = "Calculez">
							    		</div>				    		
							    	</div>
							    </div>
							    <?php echo form_close() ; ?>
						<?php endif; ?>

						<!--bouton comparaison 2PC, compatibilité dans les jeux-->
							<div class="btn_result">
								<div class="row">
									<div class="col-md-12 text-center">
										<a class = "btn btn-primary btn_result" href="<?php echo site_url().'/compatibilitejeu/'.$ipjPc ; ?>"> Compatibilité dans les jeux</a>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-12 text-center">
										<a class="btn btn-primary btn_result" href="<?php echo site_url().'/comparepc/compareTwoPc/'.$pcId ; ?>" role="button">Comparer à un autre pc</a>
									</div>
								</div>												
							</div><!-- row bouton compare-->
						</div>
					</div>
				</div>
			</div>

			<!--Progress bar-->
			<div class="col-md-4 rang_result">
				<div class="row">
					<div class="col-md-6 text-center">
						<div class="panel panel-default">
							<div class="panel-body"> 	
								<canvas class="indicePuissance" width="130" height="130"></canvas>
								<p>Indice de puissance dans les jeux</p>
							</div> 
						</div>				
					</div>
				</div>
				
				
		<?php if (isset($ratio)) :  ?>
			<div class="row">
				<div class="col-md-6 text-center">
					<div class="panel panel-default">
						<div class="panel-body"> 
							<div class="row">
								<canvas class = "ratioQualite" width="130" height="130"></canvas>
								<p>Rapport qualité prix </p>
							</div>	
						</div> 
					</div>				
				</div>		
			</div>	
		<?php endif; ?>			
			</div><!--Progress bar-->
		</div>	
	</div>
</div><!--row-->

	
<!-- fin du contenu/Script js pour faire fonctionner mambo.js-->	
	<script type="text/javascript">

		$(".indicePuissance").mambo({		 
		  label : <?php echo $ipjPc;  ?>,
		  displayValue : false,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be ",		 
		  drawShadow : true
		});
		
<?php if (isset($ratio)) :  ?>
		$(".ratioQualite").mambo({
		  percentage : <?php echo $ratio ;?>,
		  label : "Ratio",
		  displayValue : true,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be ",
		  ringStyle : "full",
		  drawShadow : true
		});
<?php endif; ?>	
	</script>
</div><!--container fluid-->
<?php endif ; ?>