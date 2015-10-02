<div class="container-fluid">
	<div class="row">
		<br><br><br>
		<div class="col-md-12">
			<div id = "accordion" class="panel-group">

<?php if(isset($row)) :  ?>
	<?php foreach($row as $unFaq) : ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class = "panel-title text-center" >
							 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $unFaq->faq_id ; ?>"><?php echo $unFaq->faq_quest ; ?> ?</a>
						</h4>
					</div>

					<div id = "collapse<?php echo $unFaq->faq_id ; ?>" class="panel-collapase collapse">
						<div class="panel-body text-center">
							<?php echo $unFaq->faq_rep ; ?>
						</div>
					</div>					
				</div>

<?php endforeach ; endif ;  ?>

			</div>
		</div>
	</div>
</div>