<div class="container-fluid">
	<div class="row">
		<br>
		<div class="col-md-4 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading text-center">
					Indice de puissance
				</div>
				<div id = "IPJ" class="panel-body text-center">
					<p><?php echo $IPJ ; ?></p>
					<input type = "hidden" value = "<?php echo $IPJ ; ?>" name = "inputipjConfigHidden">
					<canvas class="indicePuissance" width="130" height="130"></canvas>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="panel panel-default text-center">
				<div class="panel-heading text-center">
					Le jeu séléctionné
				</div>
				<div class="panel-body">
 					<p><?php  echo $jeu_lib ; ?></p> 
 					<img src="<?php echo base_url();?>img/games/<?php echo $imgPath; ?>"  width="130" height="130">
				</div>
			</div>		
		</div> 
	</div><!--ROW-->


	<div class="row"><!--Row2 -->
		
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
					<p>Resolution basse</p>	
					<p>Graphismes bas</p>	
				</div>
				<div class="panel-body">
					<?php echo $resolutionBasse ;  ?>
				</div>
			</div>
		</div>	
	</div><!--Row2 -->


<?php if(isset($tauxCompatibilite)) : ?>
<?php 
	$progressAttribut = 'progress-bar-danger' ; 
	if ($tauxCompatibilite < 40)
	{
		$progressAttribut = 'progress-bar-danger' ; 
	}
	else
	{
		if ($tauxCompatibilite < 80)
		{
			$progressAttribut = 'progress-bar-warning' ;
		}
		else
		{
			if ($tauxCompatibilite < 90)
			{
				$progressAttribut = 'progress-bar-success' ;
			}
			else
			{
				if ($tauxCompatibilite > 100) ; 
				{
					$progressAttribut = '' ;
				}
			}				
		}	
	}
?>
	<div class="row"><!--Row2 -->

		<div class="col-md-8 col-md-offset-2">
			<h3 class = "text-center">Taux de compatibilité en réglage ultra</h3>
			<h2 class = "text-center"><?php echo number_format($tauxCompatibilite, 2, ',', ' ') .' %' ; ?></h2>		

			<div class="progress">			
				<div class="progress-bar <?php echo $progressAttribut ; ?>" role="progressbar" data-transitiongoal="<?php echo $tauxCompatibilite ; ?>"></div>		
			</div>			
		</div>	
	</div><!--Row2 -->
<?php endif ;  ?>			

</div>

<script type="text/javascript">
var percentIPJ = parseFloat($("#IPJ").text()) ; 
$(".indicePuissance").mambo({
	displayValue : false, 	
	label : percentIPJ,							  
	circleColor : '#14294c',
	ringColor : "#3577be ",	
	drawShadow : true
});
</script>

<script type = "text/javascript">
$(document).ready(function() {
    $('.progress .progress-bar').progressbar({display_text: 'fill'});
});
</script>