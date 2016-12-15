<script type="text/javascript">
    function ocultarform(){
        var contenedor = document.getElementById("registroPoliticas");
        contenedor.style.display = "none";
        return true;
    }
</script>
<style type="text/css">
    #fo3 > input {
  margin-top: 12px;
  width: 100%;
}
.button-close {
  text-align: right;
}
.button-close a {
  color: #fff; background: #000; padding: 3px;
}
</style>
<!-- inicio form registrarse-->

<div id="registroPoliticas" class="modal fade in" id="myModal" role="dialog" style="display: block; z-index: 999999999" aria-hidden="false"; ><div class="modal-backdrop fade in" style="height: 100%;"></div>
    <div class="modal-dialog" style="width: 58%; z-index: 99999999">
    <div class="button-close"><a href="#" onclick="ocultarform();">Cerrar</a></div>
      <!-- Modal content-->
      <div class="modal-content">
       <!-- <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          
        </div>-->
            <div class="modal-body">
            <div class="title" style="text-align: center;"><img src="http://encuentralopronto.com/uploads/logo_image/logo_3.png" width="40%"></div>
            <div class="title" style="text-align: center;"><h4> Registra tu comercio </h4></div>
                <form class="crea-cuenta" method="post" action="/action/enviocorreo.php"  id="fo3" name="fo3">
                    <input name="nombreContacto" placeholder="Nombre del Contacto" type="text" required><br>
                    <input name="nombreComercio" placeholder="Nombre del Comercio" type="text" required><br>
                    <input name="nit" placeholder="NIT" type="text" required><br>
                    <input name="telFijo" placeholder="Número telefónico fijo" type="text" required><br>
                    <input name="celular" placeholder="Número celular" type="text" required><br>
                    <input name="email" placeholder="Correo Electrónico " type="email" required><br>
                    <input name="productos" placeholder="Productos o Servicios ofrecidos por el Comercio" type="text" required><br>
                    <input name="ciudad" placeholder="Ciudad" type="text"><br>
                    <input type="checkbox" name="acepto" value="Acepto" style="width: 10%" required> <a href="http://encuentralopronto.com/index.php/home/page/politicas-de-privacidad">Acepto las políticas de privacidad</a>

                    <div class="button-send"><input value="Registrate"  type="submit"   name="mysubmit"> </div>

                </form>
              
            </div>
        <div id="result"></div>
        <div class="modal-footer footertext">
        <!--Una vez hayamos validado esta información nos pondremos en contacto para seguir con el proceso de creación de tu tienda-->
         <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div>
      
    </div>
  </div>


<!-- fin form registrarse-->
<!--=== home banner ===-->
<div class="container margin-bottom-20 margin-top-20">
	<?php
		$place = 'after_slider';
        $query = $this->db->get_where('banner',array('page'=>'home', 'place'=>$place, 'status' => 'ok'));
        $banners = $query->result_array();
        if($query->num_rows() > 0){
            $r = 12/$query->num_rows();
        }
        foreach($banners as $row){
    ?>
        <a href="<?php echo $row['link']; ?>" >
            <div class="col-md-<?php echo $r; ?> md-margin-bottom-30">
                <div class="overflow-h">
                    <div class="illustration-v1 illustration-img1">
                        <div class="illustration-bg banner_<?php echo $query->num_rows(); ?>" 
                            style="background:url('<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src') ?>') no-repeat center center; background-size: 100% auto;" >
                        </div>    
                    </div>
                </div>    
            </div>
        </a>
    <?php
        }
    ?>
</div>
<!--=== home banner ===-->


<!--=== Category wise products ===-->
<div class="container" style="margin-bottom: -40px;">
<p></p>
    <div class="feature-products">
        <h2>Destacados</h2>
        <p></p>
    </div>
    
    <div class="illustration-v2 margin-bottom-60">
        <ul class="list-inline owl-slider-v2">
        <?php
            foreach($featured_data as $row1)
            {
                if($this->crud_model->is_publishable($row1['product_id'])){
        ?>
        	<li class="item custom_item">
                <div class="product-img">
                    <a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>">
                        <div class="shadow" 
                            style="background: url('<?php echo $this->crud_model->file_view('product',$row1['product_id'],'','','thumb','src','multi','one'); ?>') no-repeat center center; 
                                background-size: 100% auto;">
                        </div>
                    </a>
                    <a class="product-review various fancybox.ajax" data-fancybox-type="ajax" href="<?php echo $this->crud_model->product_link($row1['product_id'],'quick'); ?>"><?php echo 'Vista Rápida';?></a>
                   <!-- <a class="add-to-cart add_to_cart" data-type='text' data-pid='<?php echo $row1['product_id']; ?>' >
                        <i class="fa fa-shopping-cart"></i>
                        <?php if($this->crud_model->is_added_to_cart($row1['product_id'])){ ?>
                            <?php echo 'Agregado a la bolsa';?>
                        <?php } else { ?>
                            <?php echo 'Agregar a la bolsa';?>
                        <?php } ?>
                    </a>-->
					<?php
                        if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'current_stock') <= 0 && !$this->crud_model->is_digital($row1['product_id'])){
                    ?>
                    <div class="shop-rgba-red rgba-banner" style="border-top-right-radius: 4px !important;"><?php echo translate('out_of_stock');?></div>
                    <?php
                        } else {
                            if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ 
                    ?>
                        <div class="shop-bg-green rgba-banner" style="border-top-right-radius:4px !important;">
                            <?php 
                                if($row1['discount_type'] == 'percent'){
                                    echo $row1['discount'].'%';
                                } else if($row1['discount_type'] == 'amount'){
                                    echo currency().$row1['discount'];
                                }
                            ?>
                            <?php echo ' '.translate('off'); ?>
                        </div>
                    <?php 
                            } 
                        }
                    ?> 
                   
                  
                  
                                     
                </div>
                <div class="product-description product-description-brd">
                    <div class="overflow-h margin-bottom-5">
                        
                        <div class="col-md-12"> 
                            <div class="product-price">
								<?php if($this->crud_model->get_type_name_by_id('product',$row1['product_id'],'discount') > 0){ ?>
                                    <div class="col-md-6 title-price text-center"><?php echo currency().$this->crud_model->get_product_price($row1['product_id']); ?></div>
                                    <div class="col-md-6 title-price line-through text-center"><?php echo currency().$row1['sale_price']; ?></div>
                                <?php } else { ?>
                                    <div class="col-md-12 title-price text-center"><?php echo currency().$row1['sale_price']; ?></div>
                                <?php } ?>
                            </div>
                        </div>
                        <h4 class="title-price text-center"><a href="<?php echo $this->crud_model->product_link($row1['product_id']); ?>"><?php echo $row1['title'] ?></a></h4> 
                    </div>
                    <div class="col-md-12"> 

                        <!--<ul class="list-inline product-ratings col-md-12 col-sm-12 col-xs-12 tooltips text-center"
                            data-original-title="<?php echo $rating = $this->crud_model->rating($row1['product_id']); ?>"	
                                data-toggle="tooltip" data-placement="top" >
                            <?php
                                $rating = $this->crud_model->rating($row1['product_id']);
                                $r = $rating;
                                $i = 0;
                                while($i<5){
                                    $i++;
                            ?>
                            <li>
                                <i class="rating<?php if($i<=$rating){ echo '-selected'; } $r--; ?> fa fa-star<?php if($r < 1 && $r > 0){ echo '-half';} ?>"></i>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>-->
                    </div>

                    <div class="add-to-cart-item">
                        <a class="add-to-cart add_to_cart fijo" data-type='text' data-pid='<?php echo $row1['product_id']; ?>' >
                            
                            <?php if($this->crud_model->is_added_to_cart($row1['product_id'])){ ?>
                                <?php echo translate('AÑADIDO A LA BOSLA');?>
                            <?php } else { ?>
                                <?php echo translate('AÑADIR A LA BOLSA');?>
                            <?php } ?>
                        </a> 
                    </div>

                    <div class="col-md-12 text-center margin-bottom-5 gender" > 
                        <?php $tienda =  $this->crud_model->product_by($row1['product_id'],'with_link'); 
                        echo strtoupper($tienda);
                        ?>
                    </div>
                    
    
            </li>              
        <?php
                }
            }
        ?>
        </ul>
    </div>
</div>

<!--=== home banner ===-->
<div class="container margin-bottom-30">
	<?php
		$place = 'after_featured';
        $query = $this->db->get_where('banner',array('page'=>'home', 'place'=>$place, 'status' => 'ok'));
        $banners = $query->result_array();
        if($query->num_rows() > 0){
            $r = 12/$query->num_rows();
        }
        foreach($banners as $row){
    ?>
        <a href="<?php echo $row['link']; ?>" >
            <div class="col-md-<?php echo $r; ?> md-margin-bottom-30">
                <div class="overflow-h">
                    <div class="illustration-v1 illustration-img1">
                        <div class="illustration-bg banner_<?php echo $query->num_rows(); ?>" 
                            style="background:url('<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src') ?>') no-repeat center center; background-size: 100% auto;" >
                            
                        </div>    
                    </div>
                </div>    
            </div>
        </a>
    <?php
        }
    ?>
</div>


<div class="parallax-team parallaxBg">
    <div class="container content">
        <div class="row">
            <?php
                echo form_open(base_url() . 'index.php/home/home_search/text', array(
                    'class' => 'sky-form',
                    'method' => 'post',
                    'enctype' => 'multipart/form-data',
                    'style' => 'border:none !important;'
                ));
            ?>
                <div class="col-md-3 col-sm-6" style="z-index:99">
                    
		
                    <label class="category_drop">
                        <select name='category' id='category' class="drops cd-select">
                            <option value="0"   class=""><?php echo translate('choose_category');?></option>
                            <?php
                            	$categories = $this->db->get('category')->result_array();
								foreach($categories as $row){
							?>
                            	<option value="<?php echo $row['category_id']; ?>"  class=""><?php echo ucfirst($row['category_name']); ?></option>
                            <?php
								}
							?>
                        </select>
                        <i></i>
                    </label>
                </div>
                
                <div class="col-md-3 col-sm-6" style="z-index:99">
                    <label class="sub_category_drop">
                        <select name='sub_category' onchange='get_pricerange(this.value)' class="dropss cd-select"  id='sub_category'>
                            <option value="0"><?php echo translate('choose_sub_category');?></option>
                        </select>
                        <i></i>
                    </label>
                </div>
                
                <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>template/front/assets/plugins/range/jquery.nstSlider.css">
                 <!-- 4. Add nstSlider.js after jQuery -->
				<script src="<?php echo base_url(); ?>template/front/assets/plugins/range/jquery.nstSlider.min.js"></script>
        
                
                
                <div class="col-md-4 col-sm-6" id="range" style="margin-top: 18px;">
                    <div class="col-md-12 col-sm-12">
                        <div class="leftLabel pull-left"></div>
                        <div class="rightLabel pull-right"></div>
                    </div>
                    <?php 
						$min = round($this->crud_model->get_range_lvl("product_id !=", "", "min"));
						$max = round($this->crud_model->get_range_lvl("product_id !=", "", "max"));
					?>
                    <div class="col-md-12 col-sm-12" id="ranog">
                        <div class="nstSlider" 
                        		data-range_min="<?php echo $min; ?>" data-range_max="<?php echo $max; ?>"   
                            	data-cur_min="<?php echo $min; ?>"  data-cur_max="<?php echo $max; ?>">
                            <div class="highlightPanel"></div> 
                            <div class="bar"></div>                  
                            <div class="leftGrip"></div> 
                            <div class="rightGrip"></div> 
                        </div>
                    </div>
                </div>
                <input type="hidden" id="take_range" value="" name="range" />
                <script>
					function take_range(xmin,xmax){
						$('.nstSlider').nstSlider({
							"crossable_handles": false,
							"left_grip_selector": ".leftGrip",
							"right_grip_selector": ".rightGrip",
							"value_bar_selector": ".bar",
							"highlight": {
								"grip_class": "gripHighlighted",
								"panel_selector": ".highlightPanel"
							},
							"value_changed_callback": function(cause, leftValue, rightValue) {
								$('.leftLabel').text('<?php echo currency(); ?>'+leftValue);
								$('.rightLabel').text('<?php echo currency(); ?>'+rightValue);
								$('#take_range').val(leftValue+';'+rightValue);
							},
						});
						//$('.nstSlider').nstSlider("set_range", xmin, xmax);
						//$('.nstSlider').nstSlider("set_position", xmin, xmax);
					}
					$( document ).ready(function() {
						take_range(0,100000000);
					});
                </script>
                <div class="col-md-2 col-sm-6">
                    <button type="submit" class="btn-u btn-u-cust btn-block btn-labeled fa fa-search" value="" style="margin-top:34px;"><?php echo translate('search_product');?></button>
                </div>
            </form>
            
        </div>
    </div>
</div>    



<div class="container margin-top-20">
	<?php
		$place = 'after_search';
        $query = $this->db->get_where('banner',array('page'=>'home', 'place'=>$place, 'status' => 'ok'));
        $banners = $query->result_array();
        if($query->num_rows() > 0){
            $r = 12/$query->num_rows();
        }
        foreach($banners as $row){
    ?>
        <a href="<?php echo $row['link']; ?>" >
            <div class="col-md-<?php echo $r; ?> md-margin-bottom-30">
                <div class="overflow-h margin-top-5">
                    <div class="illustration-v1 illustration-img1">
                        <div class="illustration-bg banner_<?php echo $query->num_rows(); ?>" 
                            style="background:url('<?php echo $this->crud_model->file_view('banner',$row['banner_id'],'','','no','src') ?>') no-repeat center center; background-size: 100% auto;" >
                            
                        </div>    
                    </div>
                </div>    
            </div>
        </a>
    <?php
        }
    ?>
</div>  






             
<script>
	$(document).ready(function() {
		$('.drops').dropdown();
		$('.dropss').dropdown();
	});

	$('body').on('click','.category_drop .cd-dropdown li', function(){
		var category = $(this).data('value');
		var list1 = $('.sub_category_drop');
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/others/get_sub_by_cat/'+category,
			beforeSend: function() {
				list1.html('');
			},
			success: function(data) {
				var res = ""
					+" <select name='sub_category' onchange='get_pricerange(this.value)' class='dropss cd-select'  id='sub_category'>"
					+" 	<option value='0'><?php echo translate('choose_sub_category');?></option>"
					+ data
					+" </select>"
				list1.html(res);
				$('body .dropss').dropdown();
			},
			error: function(e) {
				console.log(e)
			}
		});
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/others/get_home_range_by_cat/'+category,
			beforeSend: function() {
			},
			success: function(data) {
				var myarr = data.split("-");
				var res = 	''
							+'<div class="nstSlider" '
							+'	data-range_min="'+myarr[0]+'" data-range_max="'+myarr[1]+'" '  
							+'	data-cur_min="'+myarr[0]+'"  data-cur_max="'+myarr[1]+'">'
							+'<div class="highlightPanel"></div> '
							+'<div class="bar"></div>   '               
							+'<div class="leftGrip"></div> '
							+'<div class="rightGrip"></div>' 
							+'</div>';
				$('.nstSlider').remove();
				$('#ranog').html(res);
				take_range(myarr[0],myarr[1]);
			},
			error: function(e) {
				console.log(e)
			}
		});
	});
	$('body').on('click','.sub_category_drop .cd-dropdown li', function(){
		var sub_category = $(this).data('value');
		var list2 = $('#range');
		$.ajax({
			url: '<?php echo base_url(); ?>index.php/home/others/get_home_range_by_sub/'+sub_category,
			beforeSend: function() {
			},
			success: function(data) {
				var myarr = data.split("-");
				var res = 	''
							+'<div class="nstSlider" '
							+'	data-range_min="'+myarr[0]+'" data-range_max="'+myarr[1]+'" '  
							+'	data-cur_min="'+myarr[0]+'"  data-cur_max="'+myarr[1]+'">'
							+'<div class="highlightPanel"></div> '
							+'<div class="bar"></div>   '               
							+'<div class="leftGrip"></div> '
							+'<div class="rightGrip"></div>' 
							+'</div>';
				$('.nstSlider').remove();
				$('#ranog').html(res);
				take_range(myarr[0],myarr[1]);
			},
			error: function(e) {
				console.log(e)
			}
		});
	});
	function filter(){}
</script>
