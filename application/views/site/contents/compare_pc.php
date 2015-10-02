<div class = "container-fluid">
<?php if(isset($prix)) : ?>
	<div class="row">

		<!--Premier PC-->
		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<h2><?php echo $pcLib ; ?></h2>
				</div>
				<div class="panel-body compare_pc">
					
						<div class="col-md-4 compare_pc">
							<img class="img compare_pc" width = "200" height = "260" src="<?php echo base_url();?>img/pc/<?php echo $pcImg ; ?>" alt="image <?php echo $pcLib ; ?>">
						</div>

						<div class="col-md-4 compare_pc">
							<ul class = "nav">
								<li>Marque : <?php echo $marqueLib1 ; ?></li>								
							</ul><br>

							<p>Votre prix : <?php echo $prix ; ?> €</p>
							
							<p>
								<?php echo anchor_popup('comparepc/popupDetail/'.$pcId1, 'Fiche technique', array('class'=>'btn btn-primary')) ?>
							</p>
						</div><!--Fiche tech-->


							<!--Liens partenaires-->
							<!-- <div class="col-md-4 compare_pc">		
								<span>Acheter ce Pc sur : </span> <br> <br>				
								<p><a class="btn btn-primary btn_plateformes" href="<?php echo $lienF ; ?>" role="button">Fnac</a></p>

								<p><a class="btn btn-primary btn_plateformes" href="<?php echo $lienA ; ?>" role="button">Amazon</a></p>

								<p><a class="btn btn-primary btn_plateformes" href="<?php echo $lienM ; ?>" role="button">Matériel</a></p>	

							</div><!--Liens partenaires-->			
		
				</div><!--panel-body-->
			</div>	<!--panel-->		 

			<!--Indice-->
			<div class="row">
				<div class="col-md-6 text-center">
					<div class="panel panel-default">
						<div class="panel-body">
						   <canvas class="indicePuissance" width="130" height="130"></canvas>
							<p>Indice de puissance dans les jeux</p>
					  	</div>
					</div>
				</div>

				<div class="col-md-6 text-center">
					<div class="panel panel-default">
						<div class="panel-body"> 	
							<canvas class = "ratioQualite" width="130" height="130"></canvas>
							<p>Rapport qualité prix</p>
						</div> 
					</div>	
				</div>
			</div><!--Indice-->

			<div class="row text-center">
				<p><a class="btn btn-primary btn-lg" href="<?php echo site_url().'/compatibilitejeu/'.$ipjPc ; ?>" role="button">Compatibilité dans les jeux</a></p> 
			</div>
		</div><!--col md 6 1er pc-->


		<!--2ème pc à comparer-->

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<h2><?php echo $pcLib2 ; ?></h2>
				</div>
				<div class="panel-body compare_pc">
								
					<div class="col-md-4 compare_pc">
						<img class="img compare_pc" width = "200" height = "260" src="<?php echo base_url();?>img/pc/<?php echo $pcImg2 ;  ?>" alt="image <?php echo $pcLib2 ?>">         	
					</div>

					<div class="col-md-4 compare_pc">
						
						<ul class = "nav">
							<li>Marque : <?php echo $marqueLib2 ; ?></li>								
						</ul><br>

						<p>Votre prix : <?php echo $prix2 ; ?> €</p>
					
						<p>
							<?php echo anchor_popup('comparepc/popupDetail/'.$pcId2, 'Fiche technique', array('class'=>'btn btn-primary')) ?>
						</p>	
					</div><!--Fiche tech-->			
				


						<!--Liens partenaires-->
						<!-- <div class="col-md-4 compare_pc">		
							<span>Acheter ce Pc sur : </span><br> <br>					
							<p><a class="btn btn-primary btn_plateformes" href="<?php echo $lienF2 ; ?>" role="button">Fnac</a></p>

							<p><a class="btn btn-primary btn_plateformes" href="<?php echo $lienA2 ; ?>" role="button">Amazon</a></p>

							<p><a class="btn btn-primary btn_plateformes" href="<?php echo $lienM2 ; ?>" role="button">Matériel</a></p>	

						</div> --><!--Liens partenaires-->						
				
				</div><!--panel-body-->
			</div>	<!--panel-->		 

			<!--Indice-->
			<div class="row">
				<div class="col-md-6 text-center">
					<div class="panel panel-default">
						<div class="panel-body">
						   <canvas class="indicePuissance2" width="130" height="130"></canvas>
							<p>Indice de puissance dans les jeux</p>
					  	</div>
					</div>
				</div>

				<div class="col-md-6 text-center">
					<div class="panel panel-default">
						<div class="panel-body"> 	
							<canvas class = "ratioQualite2" width="130" height="130"></canvas>
							<p>Rapport qualité prix</p>
						</div> 
					</div>	
				</div>
			</div><!--Indice-->

			<div class="row text-center">
				<p><a class="btn btn-primary btn-lg" href="<?php echo site_url().'/compatibilitejeu/'.$ipjPc2 ; ?>" role="button">Compatibilité dans les jeux</a></p> 
			</div>
		</div><!--col md 6 2e-->

	</div>


	<script type="text/javascript">

		$(".indicePuissance").mambo({		  
		  label : <?php echo $ipjPc ;  ?>,
		  displayValue : false,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be",		 
		  drawShadow : true
		});

		$(".ratioQualite").mambo({
		  percentage : <?php echo $ratio ; ?>,
		  label : "",
		  displayValue : true,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be",
		  ringStyle : "full",
		  drawShadow : true
		});

		$(".indicePuissance2").mambo({		  
		  label : <?php echo $ipjPc2 ; ?>,
		  displayValue : false,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be",		  
		  drawShadow : true
		});

		$(".ratioQualite2").mambo({
		  percentage : <?php echo $ratio2 ; ?>,
		  label : "",
		  displayValue : true,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be",
		  ringStyle : "full",
		  drawShadow : true
		});
	</script>
<?php endif ; ?>
</div><!--container fluid-->