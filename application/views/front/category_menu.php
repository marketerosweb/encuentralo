<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>template/front/assets/plugins/menu/amazonmenu.css">
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<script src="<?php echo base_url(); ?>template/front/assets/plugins/menu/amazonmenu.js"></script>

<div class="container" style="width:100%; padding:0px">
	<div class="col-md-10" style="width:100% !important; padding:0px;">
		<div class="row">
            <div class="col-lg-12" style="margin-top:0px;">
            <div class="content-search">
            
            	<div class="int-search">
                <div class="title-search">ENCUÉNTRA AQUÍ LO QUE BUSCAS </div>
                <?php
                    echo form_open(base_url() . 'index.php/home/text_search', array(
                        'method' => 'post',
                        'role' => 'search'
                    ));
                ?>    
                    <div class="input-group input-group-lg">
                        <span class="input-group-btn">
                            <!--<button type="button" class="btn btn-input_type dropdown-toggle custom ppy" data-toggle="dropdown">Producto 
                            <span class="caret"></span></button>-->
                            <div class="dropdown-menu pull-right" style="min-width:102px;">
                               <!-- <div class="btn custom srt" data-val="vendor" style="display:block;" ><a href="#">Tienda</a></div>-->
                                <!--<div class="btn custom srt" data-val="product" style="display:block;" ><a href="#">Producto</a></div>-->
                            </div>
                            <input type="hidden" id="tryp" name="type" value="product">
                            <script>
                                $('.srt').click(function(){
                                    var ty = $(this).data('val');
                                    var ny = $(this).html();
                                    $('#tryp').val(ty);
                                    $('.ppy').html(ny+' <span class="caret"></span>');
                                    if(ty == 'vendor'){
                                        $('.tryu').attr('placeholder','Buscar Tienda');
                                    } else if(ty == 'product'){
                                        $('.tryu').attr('placeholder','Buscar producto');
                                    }
                                });
                            </script>
                        </span>
                        <input type="text" name="query" class="form-control tryu">
                        <span class="input-group-btn">
                            <button class="btn btn-input_type custom" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
                </div></div>
            </div>
        </div>


    </div>
    
 


<script>

jQuery(function(){
	amazonmenu.init({
		menuid: 'mysidebarmenu'
	})
})

</script>
