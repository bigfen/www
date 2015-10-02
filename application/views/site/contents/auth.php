<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.css" rel="stylesheet">      
  </head>
  <body>

    <div class="container">
        <title class = "text-center">Identifiez-vous</title>        

<?php echo form_open('admin');?>
      
        <h2 class="form-signin-heading">Identifiez-vous</h2>
            <div class="form-group">
                <div class = "row">
                    <?php echo form_error('inputLogin','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
                    <label for="inputLogin" class="control-label col-xs-2">Login</label>    
                    <div class="col-xs-10">
                        <input type="text" class="form-control" name="inputLogin" placeholder="Login">            
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class = "row">
                    <?php echo form_error('inputPasswd','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
                    <label for="inputPasswd" class="control-label col-xs-2">Mot de passe</label>    
                    <div class="col-xs-10">
                        <input type="password" class="form-control" name="inputPasswd" placeholder="Password">            
                    </div>
                </div>
            </div>  
            
                    <?php if(isset($error)) : ?>
                    
                    <div class = "row"> 
                        <div class="alert alert-danger " role="alert">
                        <?php echo $error ; ?>
                        </div>   
                         </div>                      
                    <?php endif; ?>
            <input type = "submit" value = "Enregistrez" />
    </div>         
        
<?php echo form_close(); ?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>