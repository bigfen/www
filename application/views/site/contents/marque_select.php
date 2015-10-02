<div class="container-fluid">
	<div class="row">
		<br><br>
<?php echo form_open('marquespc/marqueResult');?>

		<!--choix marque-->
		<div class="col-md-4 text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					Choix de la marque
				</div>

				<div class="panel-body">
					<div class="form-group">
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
		</div><!--choix marque-->

		<!--choix catégorie-->
		<div class="col-md-4 text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					Choix de la catégorie
				</div>

				<div class="panel-body">
					<div class="form-group">
						<select id  = "categorie" class="form-control" name = "inputCat">
							<option selected="selected">Choisissez une catégorie</option>
						<?php if($rowCat) : ?>
							<?php foreach($rowCat as $catSelect) : ?>
							<option value = "<?php echo $catSelect->categorie_id ; ?>"><?php echo $catSelect->categorie_lib?></option>
						<?php endforeach ; endif ; ?>
						</select>
					</div>					
				</div>
			</div>
		</div><!--choix catégorie-->

		<!--choix taille ecran-->
		<div class="col-md-4 text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					Choix de la taille d'écran
				</div>

				<div class="panel-body">
					<div class="form-group">
						<select id  = "taille" class="form-control" name = "inputTaille">
							<option selected="selected">Choisissez une taille</option>
						<?php if($rowTaille) : ?>
							<?php foreach($rowTaille as $tailleSelect) : ?>
							<option value = "<?php echo $tailleSelect->taille_id ; ?>"><?php echo $tailleSelect->taille_lib ; ?></option>
						<?php endforeach ; endif ; ?>
						</select>
					</div>					
				</div>
			</div>
		</div><!--choix taille ecran-->
	</div><!--row des select-->
<?php form_close(); ?>

<div class="row">
	<div class="form-group">
		<div class="col-md-4 col-md-offset-5">
			<input type = "submit" class = "btn btn-primary" value = "Chercher">
		</div>		
	</div>
</div>

<?php if (isset($nbrPc)) :  ?>
<?php echo $nbrPc ; ?>
<?php endif ;  ?>

<?php if(isset($nbrRows) && $nbrPc > 0) :  ?>
	<div class="row">				
	<?php foreach ($rowPc as $unPc) : ?>				
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					<?php echo $unPc->pc_lib ; ?>
				</div>

				<div class="panel-body">
					<div class="col-md-6">
						<img src="<?php echo base_url();?>img/pc/<?php echo $unPc->pc_img_path ; ?>"  width="130" height="130" alt="image <?php echo $unPc->pc_lib ; ?>">
						<br>
						<?php echo anchor_popup('comparepc/popupDetail/'.$unPc->pc_id, 'Fiche technique', array('class'=>'btn btn-primary')) ?>					
					</div>

					<div class="col-md-6">						
	<!-- 					<div class="row">Indice de puissance : <?php echo $unPc->pc_ipj ; ?></div>
						<div class="row">Score qualité : <?php echo $unPc->pc_score ; ?></div> -->

						<div class="row"><a class = "btn btn-primary" href="<?php echo site_url().'/comparepc/ratio/'.$unPc->pc_id ; ?>">Obtenir le ratio qualité/prix</a></div>
						<br/>
						<div class="row"><a class = "btn btn-primary" href="<?php echo site_url().'/compatibilitejeu/'.$unPc->pc_ipj ; ?>"> Compatibilité dans les jeux</a></div>
						<br/>
						<div class="row"><a role = "button" class="btn btn-primary" href="<?php echo site_url().'/comparepc/compareTwoPc/'.$unPc->pc_id ; ?>">Comparer à un autre pc</a></div>							
					</div>					
				</div>
			</div>
		</div>
	<?php endforeach ;  ?>
	</div>
<?php endif ; ?>
</div>


