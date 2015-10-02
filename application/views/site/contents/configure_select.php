<div class="container-fluid">
	<div class="row">

<?php echo form_open('configurerpc/configureResult/') ;?>
<br><br>
	<fieldset>
		<div class="row">
			<div class="col-md-offset-5">
				<P> * Champs obligatoires</P>
			</div>			
		</div>

		<!-- Première ligne de selection -->
		<div class="row">

			<!-- Select rotation 1 -->
			<div class="col-md-3">
				<div class=" panel panel-primary">
					<div class="panel-heading">
						<img class="img" src="<?php echo base_url();?>bootstrap/img/speed.png" alt="icone disque dur" width = "50px" height = "50px">
						<label for="inputConfigRot">Rotation * </label>
					</div>

					<div class="panel-body">
						<?php echo form_error('inputConfigRot','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
						<select id="inputConfigRot" name="inputConfigRot" class="form-control">
							<option value = "0" selected = "selected">Choisissez une vitesse de disque * </option>
							<?php 
			                    if ($rowRot != null) : 
			                        foreach ($rowRot as $infoRotation): ?>
										<option value="<?php echo $infoRotation->rotation_id ; ?>"><?php echo $infoRotation->rotation_vitesse ; ?></option>
							<?php endforeach; endif;?>
						</select>
					</div>

				</div>
			</div>

			<!-- selection rotation disque 2 -->
			<div class="col-md-3">
				<div class=" panel panel-primary">
					<div class="panel-heading">
						<img class="img" src="<?php echo base_url();?>bootstrap/img/speed.png" alt="icone disque dur" width = "50px" height = "50px">
						<label for="inputConfigRot2">Rotation du 2ème disque dur</label>
					</div>

					<div class="panel-body">
						<?php echo form_error('inputConfigRot2','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
						<select id="inputConfigRot2" name="inputConfigRot2" class="form-control">
							<option value = "0" selected = "selected">Aucun deuxième disque dur</option>
							<?php 
			                    if ($rowRot != null) : 
			                        foreach ($rowRot as $infoRotation): ?>
										<option value="<?php echo $infoRotation->rotation_id ; ?>"><?php echo $infoRotation->rotation_vitesse ; ?></option>
							<?php endforeach; endif;?>
						</select>
					</div>
				</div>
			</div>

			<!-- selection processeur -->
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<img class="img" src="<?php echo base_url();?>bootstrap/img/process.png" alt="icone processeur" width = "50px" height = "50px">
						<label for="inputConfigProc">Processeur * </label>
					</div>

					<div class="panel-body">
						<?php echo form_error('inputConfigProc','<p><div class="alert alert-danger " role="alert">','</div></p>');?>
						<select id="inputConfigProc" name="inputConfigProc" class="form-control">
							<option value = "0" selected = "selected">Choisissez un processeur * </option>
							<?php if ($rowProc != null) : 
		                        foreach ($rowProc as $infoProcess): ?>
									<option value="<?php echo $infoProcess->processeur_id ; ?>"><?php echo $infoProcess->processeur_lib ; ?></option>
							<?php endforeach; endif;?>
						</select>
					</div>
				</div>
			</div>

			<!-- selection type ram -->
			<div class="col-md-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<img class="img" src="<?php echo base_url();?>bootstrap/img/ram.png" alt="icone ram" width = "50px" height = "50px">
						<label class="control-label" for="inputConfigRam">Type de ram * </label>
					</div>

					<div class="panel-body">
						<?php echo form_error('inputConfigRam','<p><div class="alert alert-danger " role="alert">','</div></p>');?>
						<select id="inputConfigRam" name="inputConfigRam" class="form-control">
							<option value = "0" selected = "selected">Choisissez un type de ram * </option>
							<?php if ($rowRam != null) : 
		              			foreach ($rowRam as $infoRam): ?>
									<option value="<?php echo $infoRam->ram_id ; ?>"><?php echo $infoRam->ram_lib ; ?></option>
							<?php endforeach; endif;?>
						</select>
					</div>
				</div>
			</div>
	</div><!-- Première ligne de selection -->


	<!-- 2eme ligne de selection -->
	<div class="row">

		<!-- capacité disque 1 -->
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/dd.png" alt="icone disque dur" width = "50px" height = "50px">					
					<label for="inputConfigDD">Capacité du disque dur (Go) * </label> 					
				</div>

				<div class="panel-body">
	 		 		<?php echo form_error('inputConfigDD','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
			  		<input id="inputConfigDD" name="inputConfigDD" type="text" placeholder="Capacité du disque dur (Go) * " class="form-control input-md">
				</div>
			</div>
		</div>

		<!-- capacité disque 2 -->
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/dd.png" alt="icone disque dur" width = "50px" height = "50px">					
					<label for="inputConfigDD2">Capacité du 2ème disque dur (Go)</label> 
				</div>

				<div class="panel-body">
					<?php echo form_error('inputConfigDD2','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
			  		<input id="inputConfigDD2" name = "inputConfigDD2" type = "text" placeholder = "Capacité du 2ème disque dur (Go)" class="form-control input-md">
				</div>
			</div>
		</div>
	
		<!-- freq proc -->
		<div class="col-md-3">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/beat.png" alt="icone disque dur" width = "50px" height = "50px">
					<label for="inputConfigQteHz">Fréquence du processeur(Ghz) * </label> 
				</div>

				<div class="panel-body">
					<?php echo form_error('inputConfigQteHz','<p><div class="alert alert-danger " role="alert">','</div></p>');?>
			  		<input id="inputConfigQteHz" name="inputConfigQteHz" type="text" placeholder="Fréquence (Ghz) * " class="form-control input-md">
				</div>

			</div>
		</div>

		<!-- qté ram -->
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/ram.png" alt="icone ram" width = "50px" height = "50px">
					<label class="control-label" for="inputConfigQteRam">Quantité de rams (Go) * </label>  
				</div>

				<div class="panel-body">
			  		<?php echo form_error('inputConfigQteRam','<p><div class="alert alert-danger " role="alert">','</div></p>');?>
			 		<input id="inputConfigQteRam" name="inputConfigQteRam" type="text" placeholder="Quantité de rams (Go) *" class="form-control input-md">		
				</div>
			</div>
		</div>

	</div><!-- 2eme ligne de selection -->


	<!-- 3eme ligne de selection -->
	<div class="row">

		<!-- selection carte graphique -->
		<div class="col-md-3 col-md-offset-1">
			<div class=" panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/iconeCarte.png" alt="icone carte graphique" width = "50px" height = "50px">
					<label for="inputConfigCarte">Carte graphique * </label>
				</div>

				<div class="panel-body">
			  		<?php echo form_error('inputConfigCarte','<p><div class="alert alert-danger " role="alert">','</div></p>');?>
				    <select id="inputConfigCarte" name="inputConfigCarte" class="form-control">
				    	<option value = "0" selected = "selected">Choisissez une carte graphique * </option>
				    	<?php if ($rowCarte != null) : 
	                        foreach ($rowCarte as $infoCarte): ?>
				     			<option value="<?php echo $infoCarte->cartegraph_id ; ?>"><?php echo $infoCarte->cartegraph_lib ; ?></option>			
				      <?php endforeach; endif;?>      
				    </select>
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

				<div class="panel-body">
			  		<?php echo form_error('inputCatPc','<p><div class="alert alert-danger " role="alert">','</div></p>');?>
				    <select id="inputCatPc" name="inputCatPc" class="form-control">
				    	<option value = "0" selected = "selected">Choisissez une catégorie * </option>
				    	<option value = "1">PC de bureau </option>
				    	<option value = "2">PC portable </option>
				    </select>
				</div>
			</div>
		</div>

		<!-- saisie prix -->
		<div class="col-md-3">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<img class="img" src="<?php echo base_url();?>bootstrap/img/euroSymbol.png" alt="icone carte graphique" width = "50px" height = "50px">
					<label class="control-label" for="inputConfigPrix">Prix de votre pc * </label> 
				</div>

				<div class="panel-body">
			  		<?php echo form_error('inputConfigPrix','<p><div class="alert alert-danger " role="alert">','</div></p>');?>
			 		<input id="inputConfigPrix" name="inputConfigPrix" type="text" placeholder="Prix de votre pc * " class="form-control input-md">	
				</div>
			</div>
		</div>

	</div><!-- 3eme ligne de selection -->

	<!-- Button -->
	<div class="form-group">  
  		<div class = "row">
		    <div class="col-md-offset-5">
		      <input class = "btn btn-primary" type="submit" class="form-control" value = "Résultats de votre configuration">            
		    </div>
	  </div>  
</div>  

	</fieldset>
<?php echo form_close() ;?>

	</div><!--row principal-->
</div><!--container -->