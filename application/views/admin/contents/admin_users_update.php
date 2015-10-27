 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
</h1>

<?php echo form_open('admin/updateUtilisateurs/'.$rowUpdate->user_id) ;?>

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputUserLogin','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputUserLogin" class="control-label col-xs-2">Login</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="inputUserLogin" value = "<?php echo $userName ; ?>">
        </div>
      </div>        
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputUserMail','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputUserMail" class="control-label col-xs-2">E-Mail</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="inputUserMail" value = "<?php echo $userMail ; ?>">
        </div>
      </div>       
    </div>     

    <div class="form-group">  
      <div class = "row">
        <div class="col-xs-4">
          <input type="submit" class="form-control" value = "Modifiez">            
        </div>
      </div>  
    </div>  
<?php echo form_close();?>
</div>