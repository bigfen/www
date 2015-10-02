<div class="container-fluid">
	<div class="row">	
		<br>
		<br>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">					
					<img class="img" src="<?php echo base_url();?>bootstrap/img/speed.png" alt="icone disque dur" width = "50px" height = "50px">
					Capacité disque dur								
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($disque))
					{
						echo $disque.' Go' ; 
					}
					?>
				</div>
			</div>
		</div>

	<?php if(isset($qteDD2)) :  ?>
		<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<img class="img" src="<?php echo base_url();?>bootstrap/img/iconeCarte.png" alt="icone carte graphique" width = "50px" height = "50px">
						Capacité disque dur 2
					</div>

					<div class="panel-body text-center">
						<?php echo $qteDD2.' Go' ; ?>
					</div>		
				</div>
			</div>
	<?php else : ?>
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/iconeCarte.png" alt="icone carte graphique" width = "50px" height = "50px">
					Carte graphique
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($carte))
					{
						echo $carte ; 
					}
					?>
				</div>		
			</div>
		</div>
	<?php endif ; ?>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/process.png" alt="icone disque dur" width = "50px" height = "50px">
					Processeur
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($processeur))
					{
						echo $processeur ; 
					}
					?>
				</div>		
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/ram.png" alt="icone ram" width = "50px" height = "50px">
					Type de ram
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($ram))
					{
						echo $ram ; 
					}
					?>
				</div>		
			</div>
		</div>


	</div><!--row -->

<!--------------------------------------2EME LIGNE DE PANELS---------------------------------->
	<div class="row">

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/dd.png" alt="icone disque dur" width = "50px" height = "50px">
					Vitesse du disque dur
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($vitesse))
					{
						echo $vitesse ; 
					}
					?>
				</div>		
			</div>
		</div>


<?php if(isset($vitesse2)) : ?>
	<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/dd.png" alt="icone disque dur" width = "50px" height = "50px">
					Vitesse du disque dur 2
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($vitesse2))
					{
						echo $vitesse2 ; 
					}
					?>
				</div>		
			</div>
		</div>

<?php else : ?>
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/euroSymbol.png" alt="icone euro" width = "50px" height = "50px">
					Prix saisi
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($prix))
					{
						echo $prix.' euros' ; 
					}
					?>
				</div>		
			</div>
		</div>
<?php endif ; ?>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/beat.png" alt="icone disque dur" width = "50px" height = "50px">
					Fréquence du processeur
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($Freq))
					{
						echo $Freq.' Ghz'; 
					}
					?>
				</div>		
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading ">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/ram.png" alt="icone ram" width = "50px" height = "50px">
					Quantité de ram
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($qteRam))
					{
						echo $qteRam.' Go' ; 
					}
					?>
				</div>		
			</div>
		</div>
	</div><!--row -->

	<!--------------------------------------3EME LIGNE DE PANELS---------------------------------->
<?php if(isset($qteDD2,$vitesse2)) : ?>
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/iconeCarte.png" alt="icone carte graphique" width = "50px" height = "50px">
					Carte graphique
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($carte))
					{
						echo $carte ; 
					}
					?>
				</div>		
			</div>
		</div>

		<!-- selection catégorie pc -->
		<div class="col-md-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/computer.png" alt="icone carte graphique" width = "50px" height = "50px">
					<label for="inputCatPc">Catégorie de PC * </label>
				</div>

				<div class="panel-body text-center">
			  		<?php echo $catPc ; ?>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/euroSymbol.png" alt="icone euro" width = "50px" height = "50px">
					Prix saisi
				</div>

				<div class="panel-body text-center">
					<?php
					if (isset($prix))
					{
						echo $prix.' euros' ; 
					}
					?>
				</div>		
			</div>
		</div>
	</div><!--.row-->

	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Indice de puissance</div>
				<div id = "IPJ" class="panel-body text-center">
					<p>
					<?php
					if (isset($ipj))
					{
						echo $ipj ; 
					}
					?>
					</p>
					<canvas class="indicePuissance" width="150" height="150"></canvas>					
				</div>		
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Ratio qualité/prix</div>
				<div id = "ratio" class="panel-body text-center">
					<p>
					<?php
					if (isset($score, $ratio))
					{
						
						echo $ratio ; 
					}
					?>
					</p>
					<canvas class = "ratioQualite" width="150" height="150"></canvas>					
				</div>		
			</div>
		</div>
	</div><!--row -->


<?php else : ?>
	
	<div class="row">
		<!-- selection catégorie pc -->
		<div class="col-md-4 col-md-offset-4">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/computer.png" alt="icone carte graphique" width = "50px" height = "50px">
					<label for="inputCatPc">Catégorie de PC * </label>
				</div>

				<div class="panel-body text-center">
			  		<?php echo $catPc ; ?>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-3 col-md-offset-3">
			<div class="panel panel-primary">
				<div class="panel-heading text">Indice de puissance</div>
				<div id = "IPJ" class="panel-body text-center">
					<p>
					<?php
					if (isset($ipj))
					{
						echo $ipj ; 
					}
					?>
					</p>
					<canvas class="indicePuissance" width="100" height="100"></canvas>
					
				</div>		
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">Ratio qualité/prix</div>
				<div id = "ratio" class="panel-body text-center">
					<p>
					<?php
					if (isset($score, $ratio))
					{						
						echo $ratio ; 
					}
					?>
					</p>
					<canvas class = "ratioQualite" width="100" height="100"></canvas>	
					<?php if(isset($commRatio)) : ?>
						<p><?php echo $commRatio ; ?> </p>				
					<?php endif; ?>
				</div>		
			</div>
		</div>
	</div><!--row -->
<?php endif ;  ?>

	<div class="row">
		<div class="col-md-6 col-md-offset-5">
			<a class = "btn btn-primary" href="<?php echo site_url().'/compatibilitejeu/'.$ipj ; ?>"> Compatibilité dans les jeux</a>
		</div>
	</div><!--row-->
</div><!--containerfluid-->

<script type="text/javascript">
var percentIPJ = parseFloat($("#IPJ").text()) ; 
var percentRatio = parseFloat($('#ratio').text()) ; 

	$(".indicePuissance").mambo({
	  percentage : percentIPJ,		  
	  label : percentIPJ.toPrecision(3),
	  displayValue : false,						  
	  circleColor : '#14294c',
	  ringColor : '#3577be',
	  ringStyle : 'full',
	  drawShadow : true
	});

	$(".ratioQualite").mambo({
	  percentage : percentRatio.toPrecision(3),
	  label : "",
	  displayValue : true,						  
	  circleColor : "<?php echo $circleColor ; ?>",
	  ringColor : "<?php echo $ringColor ; ?>",
	  ringStyle : "full",
	  drawShadow : true
	});
</script>


