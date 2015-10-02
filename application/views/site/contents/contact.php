<div class="container">
	<div class="row">
		<br><br><br><br><br><br>
		<div class="col-md-6 col-md-offset-3">
		
			
			<?php if(isset($error)) : ?>
			<div class="alert alert-danger">
				<strong><span class="glyphicon glyphicon-send">
				</span><?php echo $error ; ?></strong>
			</div>
 		<?php endif ; ?>
		</div>

		<?php echo form_open('contact');?>
			<div class="col-md-6 col-md-offset-3">
				<div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i>Champs requis</strong></div>

				<div class="form-group">
					<label for="InputName">nom</label>
					<div class="input-group">						
						<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Nom">
						<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
					</div>
					<?php echo form_error('InputName','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
				</div>

				<div class="form-group">
					<label for="InputEmail">e-mail</label>
					<div class="input-group">						
						<input type="text" class="form-control" id="InputEmail" name="InputEmail" placeholder="e-mail">
						<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
					</div>
					<?php echo form_error('InputEmail','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
				</div>

				<div class="form-group">
					<label for="InputSubject">Sujet</label>
					<div class="input-group">						
						<input type="text" class="form-control" id="InputSubject" name="InputSubject" placeholder="Sujet">
						<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
					</div>
					<?php echo form_error('InputSubject','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
				</div>

				<div class="form-group">
					<label for="InputMessage">Message</label>
					<div class="input-group">						
						<textarea name="InputMessage" id="InputMessage" class="form-control" rows="5"></textarea>
						<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
					</div>
					<?php echo form_error('InputMessage','<p> <div class="alert alert-danger " role="alert">','</div></p>');?>
				</div>				
			</div>

			<div class="form-group">  
			
					<div class="col-md-6 col-md-offset-3 text-center">
						<input type="submit" name="submit" id="submit" value="Submit" class="btn">
					</div>
			
			</div>  

	<?php echo form_close();?>
	</div>
</div>

