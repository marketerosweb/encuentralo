<body class="header-fixed">

<div class="wrapper">
<div class="header-movil">
	<a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/">
         <img id="logo-header" src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Encuentralo pronto" class="img-responsive" style="width:290px;">
	</a>
 </div>
    <div class="header-<?php echo $theme_color; ?> header-sticky header-fixed">
        
        <script type="text/javascript">
            $(document).ready(function(){
                $('.set_langs').on('click',function(){
                    var lang_url = $(this).data('href');                                    
                    $.ajax({url: lang_url, success: function(result){
                        location.reload();
                    }});
                });
            });
        </script>
        <!-- Navbar -->
        <div class="navbar navbar-default mega-menu" role="navigation">
            <div class="container" style="width:100%; padding:0 0px !important">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>
                
                
                
                    
                <div class="collapse navbar-collapse navbar-responsive-collapse">
                <div class="menu-left">
                <ul>
                		<li class="item-menu-left">
                        	<a class="dropdown-toggle" style="color:#fff">Encuentra todo lo que buscas aquí  </a>
                             <ul>
                             	<li> <a href="http://encuentralopronto.com/index.php/home/all_vendor/">Tiendas</a>    </li>
                                <li> <a href="http://encuentralopronto.com/index.php/home/professional_services">Servicios profesionales</a>    </li>    
                                <li>  <a href="http://encuentralopronto.com/index.php/home/category/13/0/10/1000000000">Usados</a>    </li>  
                             </ul>
                        </li>
                  </ul>
                </div>
                
                <div class="logo">
                <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/home/">
                        <img id="logo-header" src="<?php echo $this->crud_model->logo('home_top_logo'); ?>" alt="Encuentralo pronto" class="img-responsive" style="width:290px;">
                    </a>
                </div>
                    <div class="menu-right">
                    <ul class="nav navbar-nav">
                        <!-- Home -->
                        <!--<li>
                            <a href="<?php echo base_url(); ?>index.php/home/" class="dropdown-toggle" >
                                <?php echo 'Home'; ?>
                            </a>
                        </li>-->
                        <!-- End Home -->
                        

                  
						<?php
                        	$pages = $this->db->get_where('page',array('status'=>'ok'))->result_array();
							foreach($pages as $row1){
						?>
                        <!-- Home -->
                        <li class="dropdown">
                            <a href="<?php echo base_url(); ?>index.php/home/page/<?php echo $row1['parmalink']; ?>" class="dropdown-toggle <?php echo $row1['parmalink']; ?>" >
                                <?php echo translate($row1['page_name']); ?>
                            </a>
                        </li>
                        <!-- End Home -->
                        
                        
                        <?php
                        	}
						?>
                        <li class="dropdown">
                        	<a class="dropdown-toggle">Mi cuenta </a>
                            <ul class="dropdown-menu" id="loginsets">
                       		</ul>
                            <!-- <ul class="dropdown-menu">
                             	<li> <a data-toggle="modal" data-target="#v_registration" class="point">Tiendas</a>    </li>
                                <li> <a data-toggle="modal" data-target="#login" class="point">Clientes</a>    </li>    
                                <li>  <a data-toggle="modal" data-target="#registration" class="point">Registro Clientes</a>    </li>  
                             </ul>-->
                        </li>
                    </ul>
                    </div>
                    <div class="cart-added">
                    <ul class="list-inline shop-badge badge-lists badge-icons pull-right" id="added_list">
                    </ul>
                  </div>
                </div><!--/navbar-collapse-->
            </div>    
        </div>            
        <!-- End Navbar -->
    </div>
    <!--=== End Header style1 ===-->
<style>

div.shadow {
    max-height:300px;
    min-height:300px;
    overflow:hidden;
	-webkit-transition: all .4s ease;
	-moz-transition: all .4s ease;
	-o-transition: all .4s ease;
	-ms-transition: all .4s ease;
	transition: all .4s ease;
}
.shadow:hover {
	background-size: 110% auto !important;
}

.custom_item{
    border: 1px solid #ccc;
    border-radius: 4px !important;
    transition: all .2s ease-in-out;
    margin-top:10px !important;	
}
.custom_item:hover{
    webkit-transform: translate3d(0, -5px, 0);
    -moz-transform: translate3d(0, -5px, 0);
    -o-transform: translate3d(0, -5px, 0);
    -ms-transform: translate3d(0, -5px, 0);
    transform: translate3d(0, -5px, 0);
    border:1px solid #AB00FF;
}
.tab_hov{
    transition: all .5s ease-in-out;	
}
.tab_hov:hover{
    opacity:0.7;
    transition: all .5s ease-in-out;
}
.tab_hov:active{
    opacity:0.7;
}
.ppy a{
    color: white;
}
</style>