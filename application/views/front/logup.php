<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        	<center>
            	<a href="<?php echo base_url(); ?>">
                    <img id="logo-footer" class="footer-logo img-sm" width='100%'
                        src="<?php echo $this->crud_model->logo('home_bottom_logo'); ?>" alt="">
                </a>
            </center>
            <button aria-hidden="true" data-dismiss="modal" id="close_logup_modal" class="close" type="button">×</button>
            
        </div>
        <div class="modal-body">
            <!--Reg Block-->
            <div class="">
                <div class="reg-block-header">
                    <h2><?php echo translate('sign_up');?></h2>
                    <p style="font-weight:300 !important;">Ya estás inscrito? <span class="color-purple"style="cursor:pointer" data-dismiss="modal" onclick="signin()" >Has clic aquí para iniciar sesión</span></p>
                </div>
				<?php
                    echo form_open(base_url() . 'index.php/home/registration/add_info/', array(
                        'class' => 'log-reg-v3 sky-form',
                        'method' => 'post',
                        'style' => 'padding:30px !important;',
                        'id' => 'login_form'
                    ));
					$fb_login_set = $this->crud_model->get_type_name_by_id('general_settings','51','value');
					$g_login_set = $this->crud_model->get_type_name_by_id('general_settings','52','value');
                ?>                            
                    <section>
                        <label class="input login-input">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="email" placeholder="Email" name="email" class="form-control emails required" >
                            </div>
                    		<div id='email_note'></div>
                        </label>
                    </section> 
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" placeholder="Contraseña" name="password1" class="form-control pass1 required" >
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input type="password" placeholder="Confirmar contraseña" name="password2" class="form-control pass2 required" >
                            </div>    
                    		<div id='pass_note'></div> 
                        </label>
                    </section>   
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" placeholder="Nombres" name="username" class="form-control required" >
                            </div>    
                        </label>
                    </section>    
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" placeholder="Apellidos" name="surname" class="form-control required" >
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" placeholder="Teléfono" name="phone" class="form-control">
                            </div>
                        </label>
                    </section> 
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" placeholder="Dirección" name="address1" class="form-control required" >
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" placeholder="Otra dirección (Opcional)" name="address2" class="form-control">
                            </div>    
                        </label>
                    </section>
                    <section>
                        <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                <input type="text" placeholder="Ciudad" name="city" class="form-control required" >
                            </div>  
                        </label>
                    </section>
                    <section>
                      <!--  <label class="input login-input no-border-top">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                <input type="text" placeholder="<?php echo translate('ZIP'); ?>" name="zip" class="form-control">
                            </div> 
                        </label>-->
                    </section>
                    
                    <div class="row margin-bottom-5">
                        <div class="col-xs-8"></div>
                        <div class="col-xs-4 text-right">
                            <div class="btn-u btn-u-cust btn-block margin-bottom-20 reg_btn logup_btn" data-ing='Registrando' data-msg="" type="submit">
                            	Registrate
                            </div>
                        </div>
                    </div>
                    
                                        
            		<?php if($fb_login_set == 'ok' || $g_login_set == 'ok'){ ?>
                    <div class="border-wings">
                        <span>o</span>
                    </div>
                    
                    <div class="row columns-space-removes">
                    <?php if($fb_login_set == 'ok'){ ?>
                        <div class="col-lg-6 <?php if($g_login_set !== 'ok'){ ?>mr_log<?php } ?> margin-bottom-10">
                        <?php if (@$user): ?>
                            <a href="<?= $url ?>" >
                                <div class="fb-icon-bg"></div>
                                    <div class="fb-bg"></div>
                            </a>
                        <?php else: ?>
                            <a href="<?= $url ?>" >
                                <div class="fb-icon-bg"></div>
                                    <div class="fb-bg"></div>
                            </a>
                        <?php endif; ?>
                        </div>
                   		<?php } if($g_login_set == 'ok'){ ?>     
                        <div class="col-lg-6 <?php if($fb_login_set !== 'ok'){ ?>mr_log<?php } ?>">
                        <?php if (@$g_user): ?>
                            <a href="<?= $g_url ?>" >
                                <div class="g-icon-bg"></div>
                                    <div class="g-bg"></div>
                            </a>							
                        <?php else: ?>
                            <a href="<?= $g_url ?>">
                                <div class="g-icon-bg"></div>
                                    <div class="g-bg"></div>
                            </a>
                        <?php endif; ?>
                        </div>
                    	<?php } ?>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
	$(".pass2").blur(function(){
		var pass1 = $(".pass1").val();
		var pass2 = $(".pass2").val();
		if(pass1 !== pass2){
			$("#pass_note").html('Las contraseñas no coinciden');
			 $(".reg_btn").attr("disabled", "disabled");
		} else if(pass1 == pass2){
			$("#pass_note").html('');
			$(".reg_btn").removeAttr("disabled");
		}
	});
	
	$(".emails").blur(function(){
		var email = $(".emails").val();
		$.post("<?php echo base_url(); ?>index.php/home/exists",
		{
			<?php echo $this->security->get_csrf_token_name(); ?>: '<?php echo $this->security->get_csrf_hash(); ?>',
			email: email
		},
		function(data, status){
			if(data == 'yes'){
				$("#email_note").html('* El correo ya está registrado');
				 $(".reg_btn").attr("disabled", "disabled");
			} else if(data == 'no'){
				$("#email_note").html('');
				$(".reg_btn").removeAttr("disabled");
			}
		});
	});
</script>