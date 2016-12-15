<div class="title-header page-checkout">
SERVICIOS PROFESIONALES</div>

<!-- PAGE -->
<section class="page-section all-vendors" style="margin-top:10px;">
    <div class="container">
        <div class="row">
        	<?php 
				$all_proffesional = $this->db->get_where('professional_service',array('status'=>'approved'))->result_array();
				foreach($all_proffesional as $row){
			?>
            <div class="col-md-4 col-sm-6 col-xs-12">
            	<div class="vendor-details" style="  border: 2px solid #f2f2f2; margin-bottom: 17px; padding-bottom: 20px; text-align: center;">
                	
                    <div class="vendor-photo">
                    <a href="/index.php/home/professional_item/<?php echo $row['id_proffesional']; ?>/">
                        <?php if(file_exists('uploads/professional/logo_'.$row['id_vendor'].'png')){?>
                        <img src="<?php echo base_url();?>uploads/professional/logo_<?php echo $row['id_vendor'];?>.png" width="100%" />
                        <?php }else{?>
                            <img src="<?php echo base_url();?>uploads/professional/logo_<?php echo $row['id_vendor'];?>.png" width="100%"/>
                        <?php }?>
                    </div>

                    <div class="vendor-profile">
                    	<h3 style="text-align: center;">
                            <?php echo $row['nombre'];?>
                        </h3>
                        <h3 style="color: #64c3e0;">  <?php echo $row['servicio_prestar'];?> </h3>
                       
                     </a>  <br />
                      <a class="perfil-professional" href="/index.php/home/professional_item/<?php echo $row['id_proffesional']; ?>"> VER PERFIL PROFESIONAL </a></span>
                    </div>
                   
                </div>
                
            </div>
        	<?php 
				}
			?>
        </div>
    </div>
</section>
<!-- /PAGE -->