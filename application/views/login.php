<?php
$this->load->view('includes/initheader');
?>

 <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
		
			
			<div class="login-panelLogo" align='center'>
					<img src="<?php echo base_url();?>img/logo_login.png" width="100%">
			</div>
                <div class="login-panel panel panel-default">
				
				
				
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" id="formLogin">
						
							<fieldset>
								<div class="form-group jqLoginStatus">&nbsp;</div>
							</fieldset>
							
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User name or email" name="user_name" type="email" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="user_password" type="password" value="">
                                </div>
                            
								<!-- Change this to a button or input when using this as a form -->
                                <a href="javascript:void(0);" class="btn btn-lg btn-success btn-block btnLoggedIn">Login</a>
								<a href="<?php echo base_url();?>user/forgotPassword" class="pull-right">Forgot Password</a>
							
							</fieldset>
                        </form>
						
						  <div class="row marginTop20">
							  <div class="col-md-12">
							  <p>
									<a href="<?php echo base_url();?>ApplyPDS/verifyAuthenication"><i class="fa fa-files-o" style="font-size:30px;"></i> Appy Online PDS</a>
									<p class="f12"><i>If you already have an account login or applied for online PDS, please login instead to update your information.</i></p>
							  </p>		
							  </div>		
						  </div>
						
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<?php
$this->load->view('includes/footer');
?>