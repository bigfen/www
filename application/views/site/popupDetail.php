<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Fiche technique</title>
        <link href = "<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <link rel="author" href="humans.txt">
    </head>
    <body>
    	<div class="row">
    		<div class="col-md-12 text-center">
    			<div class = "row"><img id="logo_navbar" src="<?php echo base_url() ; ?>bootstrap/img/logo_small.png" alt="Logo Compare-pc"></>
    		</div>
    	</div><br>
    		<div class="row">
    			
    			<div class="panel panel-primary text-center">
    				<div class="panel-heading">
    					Fiche technique

    				</div>

    				<div class="panel-body">
                        <p>
                            <?php 
                                if (isset($pcDescript))
                                {
                                    echo $pcDescript ; 
                                }
                            ?>
                        </p>						
    				</div>
    			</div>
    		</div>

    </body>
</html>


