<div class="col-sm-9 col-md-10 ">

	<!--toggle sidebar button-->
	<p class="visible-xs">
		<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
	</p>

	<h1 class="page-header">
		<br>
		<?php if (isset($title)) echo $title;?>    
	</h1>

	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>	
					<th>#</th>
					<th>Coeff Lib</th>                    
					<th>Coeff.</th>      
					<th>Actions</th>               
				</tr>
			</thead>

			<tbody>
				<?php 
				if ($row != null) : 
					foreach ($row as $infoCoeff): ?>
				<tr>
					<td><?php echo $infoCoeff->coeff_id ; ?></td>                              
					<td><?php echo $infoCoeff->coeff_nom ; ?></td>
					<td><?php echo $infoCoeff->coeff_val ; ?></td>

					<td>						
						<a href="<?php echo site_url('admin/updateCoeff/'.$infoCoeff->coeff_id);?>">
							<button type="button" class="btn btn-default btn-default">
								<span class="glyphicon glyphicon-pencil"></span> 
								Editer
							</button>
						</a>
						                     
					</td>  
				</tr>
			<?php endforeach; endif;?>
			</tbody>
		</table>
	</div>
</div>