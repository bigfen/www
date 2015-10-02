<div class = "container-fluid">
	<?php if(isset($pcLib, $pcImg, $ipjPc, $scorePc, $taille, $prix, $ratio)) :  ?>
	<div class="panel-heading text-center" id="title_result">
		<h2><?php echo $pcLib ; ?></h2>
	</div>
	<div id = "container_result">

		<div class="row">
			<div class="col-md-4 text-center" id = "recap_pc_img">
				<div class="panel panel-default">
					<div class="panel-body" id="panel_body_img">
						<div class="row">
							<img class = "img" width = "300" height = "300" src="<?php echo base_url();?>/img/pc/<?php echo $pcImg ; ?>" alt="Image <?php echo $pcLib ; ?>">
						</div>						
			         	
			         	 <div class="row">
			         	 	<div class="col-md-4 col-md-offset-3">
			         	 		</br>
			         	 		<?php echo anchor_popup('comparepc/popupDetail/'.$pcId, 'Fiche technique', array('class'=>'btn btn-primary')) ?>
			         	 	</div>
			         	 </div>
					</div>
				</div>
			</div>

			<div class="col-md-4 rang_result" id="recap_pc_percent">
				<div id="panel_body_percent">	
					<div class="row">
						<p>Votre PC : <?php echo $pcLib ; ?></p>						
						
						<p>Votre prix : <?php echo $prix ; ?> €</p>
						
						<!--bouton comparaison 2PC, compatibilité dans les jeux-->
						<div class="btn_result text-center">
							<p><a class = "btn btn-primary btn_result" href="<?php echo site_url().'/compatibilitejeu/'.$ipjPc ; ?>"> Compatibilité dans les jeux</a></p><br>
							<p><a class="btn btn-primary btn_result" href="<?php echo site_url().'/comparepc/compareTwoPc/'.$pcId ; ?>" role="button">Comparer à un autre pc</a></p>						
						</div><!-- row bouton compare-->
						
					</div>
				</div>
			</div>

			<div class="col-md-4 rang_result">
				<div class="row">
					<div class="col-md-12 text-center">
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<canvas class="indicePuissance" width="130" height="130"></canvas>
									<p>Indice de puissance dans les jeux</p>
								</div> 									
							</div> 
						</div>				
					</div>
				</div>
				
				
				<div class="row">
					<div class="col-md-12 text-center">
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
			</div><!--col-md-4 rang_result-->

		</div><!--row-->		
	</div>	<!--#container_result-->
</div><!--.containerfluid-->



	</div><!--container_result-->
<!-- fin du contenu/Script js pour faire fonctionner mambo.js-->	
	<script type="text/javascript">

		$(".indicePuissance").mambo({		 
		  label : <?php echo $ipjPc;  ?>,
		  displayValue : false,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be",		  
		  drawShadow : true
		});

		$(".ratioQualite").mambo({
		  percentage : <?php echo $ratio ;?>,
		  label : "",
		  displayValue : true,						  
		  circleColor : '#14294c',
		  ringColor : "#3577be",
		  ringStyle : "full",
		  drawShadow : true
		});
	</script>
<?php endif ; ?>