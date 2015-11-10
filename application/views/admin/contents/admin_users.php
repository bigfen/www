 <div class="col-sm-9 col-md-10 main">

  <!--toggle sidebar button-->
  <p class="visible-xs">
    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas"><i class="glyphicon glyphicon-chevron-left"></i></button>
</p>

<h1 class="page-header">
    <br>
    <?php if (isset($title)) echo $title;?>    
</h1>

<?php echo form_open('admin/utilisateurs') ;?>

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputUserLogin','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputUserLogin" class="control-label col-xs-2">Login</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="inputUserLogin" placeholder="Login">
        </div>
      </div>        
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputUserMail','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputUserMail" class="control-label col-xs-2">E-Mail</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="inputUserMail" placeholder="E-mail">
        </div>
      </div>       
    </div>  

    <div class="form-group">
      <div class = "row">
        <?php echo form_error('inputUserPass','<div class = "row"> <div class="alert alert-danger " role="alert">','</div></div>');?>
        <label for="inputUserPass" class="control-label col-xs-2">Mot de passe</label>    
        <div class="col-xs-10">
          <input type="password" class="form-control" name="inputUserPass" placeholder="Mot de passe">            
        </div>
      </div>
    </div>    

    <div class="form-group">  
      <div class = "row">
        <div class="col-xs-4">
          <input type="submit" class="form-control" value = "Enregistrez">            
        </div>
      </div>  
    </div>  
<?php echo form_close();?>

<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Login</th>
                  <th>Mail</th>   
                  <th>Actions</th>               
                </tr>
              </thead>

              <tbody>
                <?php 
                    if ($row != null) : 
                        foreach ($row as $infoUser): ?>
                            <tr>
                              <td><?php echo $infoUser->user_id ; ?></td>
                              <td><?php echo $infoUser->user_name ; ?></td>
                              <td><?php echo $infoUser->user_mail ; ?></td> 
                              <td>
                                
                                  <a href="<?php echo site_url('admin/updateUtilisateur/'.$infoUser->user_id);?>">
                                    <button type="button" class="btn btn-default btn-default">
                                      <span class="glyphicon glyphicon-pencil"></span> Editer
                                    </button>
                                   </a>
                              
                                   <a href="<?php echo site_url('admin/deleteUtilisateur/'.$infoUser->user_id);?>">
                                    <button type="button" class="btn btn-default btn-default">
                                      <span class="glyphicon glyphicon-remove"></span> Supprimer
                                    </button>
                                  </a>
                                
                            </td>  
                            </tr>
                <?php endforeach; endif;?>
                
  
              </tbody>
            </table>
          </div>

</div>